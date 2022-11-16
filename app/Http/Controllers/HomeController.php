<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth;
use App\User;
use Carbon\Carbon;
class HomeController extends Controller
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
    public function index()
    {
        if(Auth::User()->role == "director")
        {
        //FOR TASK VISUALIZATION!!!!!!!!!!!!!!
        //indicator 
        $completedtask = DB::table('tasks')
        ->where('status', 'Completed')
        ->get();

        $incompleted = DB::table('tasks')
        ->where('status', 'Assigned')
        ->get();

        $inprogress = DB::table('tasks')
        ->where('status', 'In-Progress')
        ->get();

        $total = DB::table('tasks')
        ->get();

        //task visualization

        //piechart
        $assigned = DB::table('tasks')
        ->where('status', 'Assigned')
        ->get();

        $completed = DB::table('tasks')
        ->where('status', 'Completed')
        ->get();

        $progress = DB::table('tasks')
        ->where('status', 'In-Progress')
        ->get();
        
        
        $assigned_count = count($assigned);   
        $completed_count = count($completed);  
        $progress_count = count($progress);  

        //barchart
        $adminassigned = [];
        $admincompleted= [];
        $adminprogress = [];
        $administrator = [];

        $user = DB::table('users')->where('role', 'administrator')->get('id');

        foreach ($user as $users)
        {
        $name =  DB::table('users')->where('id', $users->id)->pluck('name');
        $adminassigned[] = DB::table('tasks')
                            ->join('taskrole','tasks.id','=','taskrole.taskid')
                            ->join('roles','roles.id','=','taskrole.roleid')
                            ->join('users','users.id','=','roles.userid')
                            ->where('users.id', $users->id)
                            ->where('tasks.status', 'Assigned')
                            ->count();

        $admincompleted[]  = DB::table('tasks')
                            ->join('taskrole','tasks.id','=','taskrole.taskid')
                            ->join('roles','roles.id','=','taskrole.roleid')
                            ->join('users','users.id','=','roles.userid')
                            ->where('users.id', $users->id)
                            ->where('tasks.status', 'Completed')
                            ->count();

        $adminprogress[] = DB::table('tasks')
                            ->join('taskrole','tasks.id','=','taskrole.taskid')
                            ->join('roles','roles.id','=','taskrole.roleid')
                            ->join('users','users.id','=','roles.userid')
                            ->where('users.id', $users->id)
                            ->where('tasks.status', 'In-Progress')
                            ->count();

        $administrator[] = ($name);       
        }
        $administrator= json_decode( json_encode($administrator), true);
        $administratorname = call_user_func_array('array_merge', $administrator);

        //to get tasks by month - line chart
        $period = now()->subMonths(11)->monthsUntil(now()); //to get 12 months from noww
        $data = [];
        $completiondata = [];
        $assigneddata = [];

        
        foreach ($period as $date) //to get tasks by month
        {
            $data[] = [
                $date->format('F') ,
            ];
            $completiondata[] = DB::table('tasks')
            ->whereMonth('tasks.submitted','=', Carbon::parse($date->format('F'))->month        )
            ->where('tasks.status', 'Completed')
            ->count();

            $assigneddata[] = DB::table('tasks')
            ->whereMonth('tasks.created','=', Carbon::parse($date->format('F'))->month        )
            ->where('tasks.status', 'Assigned')
            ->count();
        }

        //dd($assigneddata);
        $data= json_decode( json_encode($data), true); //convert from collection to array
        $MonthName = call_user_func_array('array_merge', $data);//merger into one array

        //FOR SALES VISUALIZATION
        $salesmonth = [];
        $sales = [];

        for ($m=1; $m<=12; $m++) //to get sales of the month
        {
            $salesmonth[] = date('F', mktime(0,0,0,$m, 1, date('Y')));

            $sales[] = DB::table('sales')
            ->whereMonth('createdat','=', Carbon::parse(date('F', mktime(0,0,0,$m, 1, date('Y'))))->month        )
            ->sum('commissionprice');
        }

        //to get sales employee how many sales they made
        $salesemployee = DB::table('users')->where('role', 'sales')->get();
        $salesname = [];
        $sumofsales = [];
        foreach ($salesemployee as $users)
        {
        $name =  DB::table('users')->where('id', $users->id)->pluck('name');
        $sumofsales[] = DB::table('sales')
                            ->join('users','users.id','=','sales.userid')
                            ->where('users.id', $users->id)
                            ->sum('commissionprice');

        $salesname[] = ($name);       
        }
        $salesname= json_decode( json_encode($salesname), true);
        $salesname = call_user_func_array('array_merge', $salesname);

       //dd($sumofsales, $salesname)
        //dd($salesmonth,$sales,$property);
        //dd($administratorname, $MonthName,$administratorid, $completiondata);
        return view('home',compact('assigned_count','completed_count','progress_count','adminassigned','admincompleted','adminprogress','administratorname'
                    ,'completedtask','incompleted','inprogress','total','MonthName','completiondata','assigneddata','salesmonth','sales'
                    ,'sumofsales','salesname'));


        }

         else if(Auth::User()->role == "administrator") //admin view
            {
                $completedtask = DB::table('tasks')
                ->join('taskrole','tasks.id','=','taskrole.taskid')
                ->join('roles','roles.id','=','taskrole.roleid')
                ->join('users','users.id','=','roles.userid')
                ->where('users.id', Auth::User()->id)
                ->where('tasks.status', 'Completed')
                ->get();

                $incompleted = DB::table('tasks')
                ->join('taskrole','tasks.id','=','taskrole.taskid')
                ->join('roles','roles.id','=','taskrole.roleid')
                ->join('users','users.id','=','roles.userid')
                ->where('users.id', Auth::User()->id)
                ->where('tasks.status', 'Assigned')
                ->get();

                $inprogress = DB::table('tasks')
                ->join('taskrole','tasks.id','=','taskrole.taskid')
                ->join('roles','roles.id','=','taskrole.roleid')
                ->join('users','users.id','=','roles.userid')
                ->where('users.id', Auth::User()->id)
                ->where('tasks.status', 'In-Progress')
                ->get();

                $total = DB::table('tasks')
                ->join('taskrole','tasks.id','=','taskrole.taskid')
                ->join('roles','roles.id','=','taskrole.roleid')
                ->join('users','users.id','=','roles.userid')
                ->where('users.id', Auth::User()->id)
                ->get();

                //to get tasks by month
                $period = now()->subMonths(11)->monthsUntil(now());
                $data = [];
                $completiondata = [];
                $ontime = [];
                $late = [];

            foreach ($period as $date) //to get tasks by month BY AUTH ID
                {
            $data[] = [
                $date->format('F') ,
            ];
            $completiondata[] = DB::table('tasks')
            ->join('taskrole','tasks.id','=','taskrole.taskid')
            ->join('roles','roles.id','=','taskrole.roleid')
            ->join('users','users.id','=','roles.userid')
            ->where('users.id', Auth::User()->id)
            ->whereMonth('tasks.submitted','=', Carbon::parse($date->format('F'))->month        )
            ->where('tasks.status', 'Completed')
            ->count();

            $ontime[] = DB::table('tasks')
            ->join('taskrole','tasks.id','=','taskrole.taskid')
            ->join('roles','roles.id','=','taskrole.roleid')
            ->join('users','users.id','=','roles.userid')
            ->where('users.id', Auth::User()->id)
            ->whereMonth('tasks.submitted','=', Carbon::parse($date->format('F'))->month        )
            ->where('taskrole.status', 'On-Time')
            ->count();

            $late[] = DB::table('tasks')
            ->join('taskrole','tasks.id','=','taskrole.taskid')
            ->join('roles','roles.id','=','taskrole.roleid')
            ->join('users','users.id','=','roles.userid')
            ->where('users.id', Auth::User()->id)
            ->whereMonth('tasks.submitted','=', Carbon::parse($date->format('F'))->month        )
            ->where('taskrole.status', 'Late')
            ->count();
        }

        $salesmonth = [];
        $sales = [];

        for ($m=1; $m<=12; $m++) //to get sales of the month
        {
            $salesmonth[] = date('F', mktime(0,0,0,$m, 1, date('Y')));

            $sales[] = DB::table('sales')
            ->whereMonth('createdat','=', Carbon::parse(date('F', mktime(0,0,0,$m, 1, date('Y'))))->month        )
            ->sum('commissionprice');
        }

        $data= json_decode( json_encode($data), true); //convert from collection to array
        $MonthName = call_user_func_array('array_merge', $data);//merger into one array
        

                return view('home',compact('completedtask','incompleted','inprogress','total',
                                            'MonthName','completiondata','ontime','late','salesmonth','sales'));
            }

        else //sales view
            {
        $allsalesmonth = [];
        $allsales = [];

        for ($m=1; $m<=12; $m++) //to get sales of the month by AUTH ID
        {
            $allsalesmonth[] = date('F', mktime(0,0,0,$m, 1, date('Y')));

            $allsales[] = DB::table('sales')
            ->join('users','users.id','=','sales.userid')
            ->where('users.id', Auth::User()->id)
            ->whereMonth('createdat','=', Carbon::parse(date('F', mktime(0,0,0,$m, 1, date('Y'))))->month        )
            ->sum('commissionprice');
        }

        $salesmonth = [];
        $sales = [];

        for ($m=1; $m<=12; $m++) //to get sales of the month
        {
            $salesmonth[] = date('F', mktime(0,0,0,$m, 1, date('Y')));

            $sales[] = DB::table('sales')
            ->whereMonth('createdat','=', Carbon::parse(date('F', mktime(0,0,0,$m, 1, date('Y'))))->month        )
            ->sum('commissionprice');
        }

        //dd($salesmonth,$sales);
                return view('home',compact('salesmonth','sales','allsalesmonth','allsales'));
            }
        
    }
}