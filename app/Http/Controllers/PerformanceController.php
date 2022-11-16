<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth;
use App\User;
use App\UserPerformance;
use Carbon\Carbon;

class PerformanceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function listperformance() //delete plan activies
    {   
        $administrator = DB::table('userperformance')
        ->join('users','users.id','=','userperformance.userid')
        ->join('teamworkperformance','userperformance.id','=','teamworkperformance.userperformanceid')
        ->where('userperformance.performancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
        ->where('users.id','<>',Auth::User()->id)
        ->where('teamworkperformance.evaluatedby',Auth::User()->id)
        ->wherenull('teamworkperformance.rating')
        ->select('users.name as name','userperformance.id as teamworkid')
        ->get();

        $sales = DB::table('userperformance')
        ->join('users','users.id','=','userperformance.userid')
        ->join('salesperformance','userperformance.id','=','salesperformance.userperformanceid')
        ->join('communicationperformance','salesperformance.id','=','communicationperformance.salesperformanceid')
        ->where('userperformance.performancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
        ->where('users.id','<>',Auth::User()->id)
        ->where('communicationperformance.evaluatedby',Auth::User()->id)
        ->wherenull('communicationperformance.rating')
        ->select('users.name as name','communicationperformance.id as id')
        ->get();
        //dd($administrator->user);
        return view('performance.list',compact('administrator','sales'));
     }

     public function form() //show performance form
    {   
       
        $norecordform = UserPerformance::all();

        if(!$norecordform->isEmpty())
        {

        $count =  DB::table('userperformance')->join('users','userperformance.userid','=','users.id')
                  ->where('users.id',Auth::User()->id)->count();

        if($count != 0)
        {
        $norecordform = UserPerformance::all();

        $latestdate = UserPerformance::latest('performancedate')
                    ->wherehas('user',function($query)
                    {
                        $query->where('id',Auth::User()->id);
                    })->first();
        $administratorname = User::where('id',Auth::User()->id)->get();
                    //dd($administratorname);
        $sales = User::where('id',Auth::User()->id)->get();
        $salesteam = User::all()->where('role','sales')->where('id','<>',Auth::User()->id);
                    
        $openform = Carbon::parse($latestdate->performancedate)->addmonths(4);
        //dd($openform);
        }
        else
        {
            $norecordform = UserPerformance::all();

        $latestdate = UserPerformance::latest('performancedate')
                    ->wherehas('user',function($query)
                    {
                        $query->where('id',Auth::User()->id);
                    })->first();
        $administratorname = User::where('id',Auth::User()->id)->get();
                    //dd($administratorname);
        $sales = User::where('id',Auth::User()->id)->get();
        $salesteam = User::all()->where('role','sales')->where('id','<>',Auth::User()->id);
                    
        $openform = Carbon::yesterday();
        }
        return view('performance.form',compact( 'sales','salesteam','administratorname','openform','norecordform'));

        }
        else{
        $norecordform = UserPerformance::all();
        $administratorname = User::where('id',Auth::User()->id)->get();
        //dd($administratorname);
        $sales = User::where('id',Auth::User()->id)->get();
        $salesteam = User::all()->where('role','sales')->where('id','<>',Auth::User()->id);
        $openform = Carbon::yesterday();
        return view('performance.form',compact( 'sales','salesteam','administratorname','norecordform','openform'));
        }

     }

     public function edit($id) //show plan activities
    {   
        if(Auth::User()->role =="administrator")
        {
        $administrator = DB::table('userperformance')
        ->join('users','users.id','=','userperformance.userid')
        ->join('teamworkperformance','userperformance.id','=','teamworkperformance.userperformanceid')
        ->where('userperformance.performancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
        ->where('userperformance.id',$id)
        ->where('teamworkperformance.evaluatedby',Auth::User()->id)
        ->wherenull('teamworkperformance.rating')
        ->select('users.name as name','teamworkperformance.id as id')
        ->get();

        return view('performance.edit',compact('administrator'));

        }
        elseif(Auth::User()->role =="sales")
        {

        $sales = DB::table('userperformance')
            ->join('users','users.id','=','userperformance.userid')
            ->where('userperformance.performancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
            ->where('users.id','<>',Auth::User()->id)
            ->where('userperformance.id',$id)
            ->select('users.name as name','userperformance.id as id')
            ->get();
        
        return view('performance.edit',compact('sales'));

        }
     }

     public function store(Request $request) //show plan activities
    {   


        if(Auth::User()->role == "administrator")
        {
        $request->validate([
            'qualityofwork' => 'required',
            'quantityofwork' => 'required',
            'teamwork' => 'required',
            'dependability' => 'required',
            'initiative' => 'required',
            'attendance' => 'required',
            'remarks' => 'required',
        ]);

        $today = Carbon::today();
        $user = User::where('role','administrator')->where('id','<>',Auth::User()->id)->pluck('id');
        //dd($user);
        $administrator = DB::table('userperformance')->insertGetId([
            'performancedate' => $today,
            'quantityofworkrating' => $request->quantityofwork,
            'teamworkrating' => $request->teamwork,
            'initiativerating' => $request->initiative,
            'attendancerating' => $request->attendance,
            'remarks' => $request->remarks,
            'userid' => Auth::User()->id,
        ]);

        $adminperformance = DB::table('adminperformance')->insertGetId([
                'qualityofwork' => $request->quantityofwork,
                'dependability' => $request->dependability,
                'userperformanceid' => $administrator,
        ]);

        foreach ($user as $value => $admin)
            {
                DB::table('teamworkperformance')->insert([
                    'rating' => null,
                    'userperformanceid' => $administrator,
                    'evaluatedby' => $user[$value],
                    ]);
            }
        
        }
        else  if(Auth::User()->role == "sales")
        {
            $admin = User::where('role','administrator')->where('id','<>',Auth::User()->id)->pluck('id');
            $salesuser = User::where('role','sales')->where('id','<>',Auth::User()->id)->pluck('id');

            $request->validate([
                'communication' => 'required',
                'quantityofwork' => 'required',
                'teamwork' => 'required',
                'planning' => 'required',
                'initiative' => 'required',
                'attendance' => 'required',
                'remarks' => 'required',
            ]);
    
            $today = Carbon::today();
      
            $sales = DB::table('userperformance')->insertGetId([
                'performancedate' => $today,
                'quantityofworkrating' => $request->quantityofwork,
                'teamworkrating' => $request->teamwork,
                'initiativerating' => $request->initiative,
                'attendancerating' => $request->attendance,
                'remarks' => $request->remarks,
                'userid' => Auth::User()->id,
            ]);
    
            $salesperformance = DB::table('salesperformance')->insertGetId([
                    'planning' => $request->planning,
                    'communication' => $request->communication,
                    'userperformanceid' => $sales,
            ]);

            foreach ($admin as $value => $administrator)
            {
                DB::table('teamworkperformance')->insert([
                    'userperformanceid' => $sales,
                    'evaluatedby' => $admin[$value],
                    ]);
            }
        
            foreach ($salesuser as $value => $users)
            {
                DB::table('teamworkperformance')->insert([
                    'rating' => null,
                    'userperformanceid' => $sales,
                    'evaluatedby' => $salesuser[$value],
                    ]);

                DB::table('communicationperformance')->insert([
                        'rating' => null,
                        'salesperformanceid' => $salesperformance,
                    'evaluatedby' => $salesuser[$value],
                        ]);
            }
        
    
        }

        return redirect()->route("home")->withSuccess( 'Performance successfully stored.');
     }


     public function update(Request $request,$id) //show plan activities
    {   


        if(Auth::User()->role == "administrator")
        {
        $request->validate([
            'teamwork' => 'required',
        ]);

        //dd($user);
        DB::table('teamworkperformance')->where('id',$id)->update([
            'rating' => $request->teamwork,

        ]);
        
        }
        else  if(Auth::User()->role == "sales")
        {
            $request->validate([
            'teamwork' => 'required',
        ]);

        $communication = DB::table('salesperformance')->where('userperformanceid',$id)->pluck('id');

        //dd($request->teamwork,$request->communication,$communication);

        //dd($id);
         DB::table('teamworkperformance')->where('userperformanceid',$id)
         ->where('evaluatedby',Auth::User()->id)
         ->update([
            'rating' => $request->teamwork,
        ]);

        DB::table('communicationperformance')->where('salesperformanceid',$communication)->update([
            'rating' => $request->communication,
        ]);
        
    
        }

        return redirect()->route("listperformance")->withSuccess( 'You have successfully evaluated your colleague.');
     }


     

}