<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth;
use App\Plan;
use App\PlanActivity;
use Carbon\Carbon;

class PlanningActivityController extends Controller
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

    public function listactivities($planid) //list view for planning
    {   
        $plan = Plan::all()->where('id',$planid);
        $planlist = Plan::all()->where('id',$planid);
        $activitylist = PlanActivity::all()->where('planid',$planid);

  
        return view('planactivities.list',compact('plan','activitylist','planlist'));
     }

     public function editactivities( $planid) //show view for planning
     {   
        $id = PlanActivity::where('id',$planid)->value('planid');
        //dd($id);
        $plan = Plan::all()->where('id',$id);
         $planactivity = PlanActivity::all()->where('id',$planid);

         return view('planactivities.edit',compact('plan','planactivity'));
        }

     public function storeactivities(Request $request, $planid) //store planning
    {   
        //dd($request->all());
            
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'status' => 'required',

        ]);

        DB::table('planactivities')->insert([
            'name' => $request->name,
            'activitiesdate' => $request->date,
            'status' => "Incompleted",
            'planid' => $planid,
            'description' => $request->description,
        ]);

        return back()->withSuccess( 'Activity successfully stored.');
    }

     public function updateactivities(Request $request, $plan) //update planning
    {   
       //dd($plan, $request->all());

        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
  
        PlanActivity::where('id', $plan)
        ->update([
            'name' => $request->name,
            'activitiesdate' => $request->date,
            'description' => $request->description,
            'status' => $request->status,
        ]);


        $id = PlanActivity::where('id',$plan)->value('planid');

  
        return redirect()->route('listactivities', ['id' => $id])->withSuccess( 'Plan successfully updated.');
     }

     public function deleteactivities($id) //delete plan activies
    {   
        //dd($id);
        PlanActivity::where('id', $id)->delete();

        return back()->withSuccess( 'Activity successfully deleted.');
     }
}