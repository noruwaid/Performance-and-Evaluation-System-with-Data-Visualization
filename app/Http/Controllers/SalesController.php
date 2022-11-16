<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth;
use App\Sale;
use App\Plan;
use Carbon\Carbon;

class SalesController extends Controller
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

     public function viewSales($property) // VIEW SALES DETAILS
     {
        $name = DB::table('properties')
        ->select('properties.name as name')
        ->where('properties.id',$property)
        ->get();
        
        $sales = DB::table('properties')
        ->join('sales','sales.propertyid', '=', 'properties.id')
        ->join('users', 'sales.userid', '=', 'users.id')
        ->join('plans', 'sales.planid', '=', 'plans.id')
        ->select('sales.unitname as unit','sales.purchasername as purchasername', 'sales.commissionprice as price','sales.id as id', 'sales.remarksdate as remarksdate', 'users.name as name','plans.id as planid','plans.name as planname')
        ->where('properties.id',$property)
        ->get();

        $agentsales =  DB::table('properties')
        ->join('sales','sales.propertyid', '=', 'properties.id')
        ->join('users', 'sales.userid', '=', 'users.id')
        ->join('plans', 'sales.planid', '=', 'plans.id')
        ->select('sales.unitname as unit','sales.purchasername as purchasername', 'sales.commissionprice as price','sales.id as id', 'sales.remarksdate as remarksdate', 'users.name as name','plans.id as planid','plans.name as planname')
        ->where('properties.id',$property)
        ->where('users.id',Auth::user()->id)
        ->get();
        
        return view('sales.viewsalesproperty', compact('name', 'sales','agentsales'));
        
     }

     public function createsales() // VIEW CREATE SALES
     {
        $property = DB::table('properties')
        ->get();
        $plan = Plan::all();
        
        return view('sales.createsales', compact('property','plan'));
     }

     public function storeSales(Request $request) //STORE SALES
     { 
      $now = Carbon::now();
        $request->validate([
            'unit' => 'required',
            'finalselling' => 'required',
            'netselling' => 'required',
            'propertyid' => 'required',
            'purchasername' => 'required',
            'commission' => 'required',
            'planid' => 'required',


         ]);
         $price = (($request->commission)/100) *($request->netselling);

         DB::table('sales')->insert([
            'unitname' => $request->unit,
            'purchasername' => $request->purchasername,
            'finalselling' => $request->finalselling,
            'netprice' => $request->netselling,
            'dateofloanapproved' => $request->loanapproved,
            'purchasername' => $request->purchasername,
            'propertyid' => $request->propertyid,
            'remarksdate' => null,
            'userid' => Auth::User()->id,
            'commissionprice' => $price,
            'commissionpercent' => $request->commission,
            'createdat' => $now,
            'planid' => $request->planid,
         ]);

        
        return redirect()->route('salesview', ['property' => $request->propertyid])->withSuccess( 'Sales successfully created.');;


     }

     public function editsales($sales) //SHOW EDIT SALES
     {
        $property = DB::table('properties')
                    ->select('id','name')
                    ->get();

      $details = DB::table('sales')
      ->join('users','sales.userid','=','users.id')
      ->join('properties','sales.propertyid','=','properties.id')
      ->where('sales.id', $sales)
      ->select('sales.unitname as unit','sales.purchasername as purchasername', 'sales.dateofloanapproved as loanapproved'
      , 'sales.finalselling as finalselling', 'sales.netprice as netselling', 'properties.name as propertyname',
      'sales.commissionprice as commissionprice', 'sales.commissionpercent as commission', 'sales.remarksdate as remarksdate'
      , 'users.name as username' , 'sales.id as id','properties.id as propertyid')->get();

      return view('sales.updatepropertiessales', compact('details','property'));


     }

     public function destroy($sales) { //DELETE SALES
    

        DB::table('sales')->where('id', $sales)->delete();

        return back()->withSuccess( 'Sales successfully deleted.');
         }

         public function show($sales) { //SHOW SALES
        
            $details = DB::table('sales')
                     ->join('users','sales.userid','=','users.id')
                     ->join('properties','sales.propertyid','=','properties.id')
                     ->where('sales.id', $sales)
                     ->select('sales.unitname as unit','sales.purchasername as purchasername', 'sales.dateofloanapproved as loanapproved'
                     , 'sales.finalselling as finalselling', 'sales.netprice as netselling', 'properties.name as propertyname',
                     'sales.commissionprice as commissionprice', 'sales.commissionpercent as commission', 'sales.remarksdate as remarksdate'
                     , 'users.name as username', 'sales.id as salesid'
                     , 'sales.remarksdate as remarksdate')->get();

              return view('sales.propertiessalesdetail', compact('details'));
               }

   public function update(Request $request, Sale $sales) //UPDATE SALES
    {
    $request->validate([
        'id' => 'required',
        'unit' => 'required',
        'property' => 'required',
        'finalselling' => 'required',
        'netselling' => 'required',
        'purchasername' => 'required',
        'commission' => 'required',
        'remarksdate' => 'required',
        'loanapproved' => 'required',
    ]);

    $price = (($request->commission)/100) *($request->netselling);

    DB::table('sales')->where('id',$request->id)->update([
        'commissionpercent' => $request->commission,
        'commissionprice' => $price,
        'remarksdate' => $request->remarksdate,
        'unitname' => $request->unit,
        'purchasername' => $request->purchasername,
        'finalselling' => $request->finalselling,
        'netprice' => $request->netselling,
        'dateofloanapproved' => $request->loanapproved,

    ]);

    return redirect()->route('salesdetails',['sales' => $request->id])
                    ->withSuccess('Sales updated successfully');
}
}