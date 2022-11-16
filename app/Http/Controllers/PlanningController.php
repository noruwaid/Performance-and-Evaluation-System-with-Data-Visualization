<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth;
use App\Plan;
use App\PlanActivity;
use Carbon\Carbon;

class PlanningController extends Controller
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

    public function listplanning() //list view for planning
    {   
        $planlist = Plan::all()->where('userid',Auth::user()->id);
        $directorplanview = Plan::with('user')->get();
        return view('planning.list',compact('planlist','directorplanview'));
     }

     public function editplanning(Plan $plan, $planid) //show view for planning
     {   
         $planlist = Plan::all()->where('id',$planid);
         $directorplanview = PlanActivity::all()->where('id',$planid);

         return view('planning.edit',compact('planlist','directorplanview'));
        }

     public function storeplanning(Request $request) //store planning
    {   
        //dd($request->all());
            
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);

        DB::table('plans')->insert([
            'name' => $request->name,
            'plandate' => $request->date,
            'status' => "Incompleted",
            'userid' => Auth::user()->id,
            'suggestion' => null,
        ]);

        return back()->withSuccess( 'Plan successfully stored.');
    }

     public function updateplanning(Request $request, $plan) //update planning
    {   
        //dd($request->all());

        if(Auth::User()->role =="sales")
        {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);
  
        if ($request->status =="Completed")
        {
        Plan::where('id', $plan)
        ->update([
            'name' => $request->name,
            'plandate' => $request->date,
            'status' => $request->status,
        ]);

        PlanActivity::where('planid', $plan)
        ->update([
            'status' => "Completed",
        ]);
        }
        else
        {
            Plan::where('id', $plan)
            ->update([
                'name' => $request->name,
                'plandate' => $request->date,
                'status' => $request->status,
            ]);
        }
    }
    else
    {
        $request->validate([
            'suggestion' => 'required',
        ]);
  
        Plan::where('id', $plan)
        ->update([
            'suggestion' => $request->suggestion,
        ]);

    }



  
        return redirect()->route('listplanning')->withSuccess( 'Plan successfully updated.');
     }

     public function deleteplanning($id) //delete plan 
    {           
        PlanActivity::where('planid', $id)->delete();
        Plan::where('id', $id)->delete();

        return back()->withSuccess( 'Plan successfully deleted.');
     }
}