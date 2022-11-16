<?php

namespace App\Http\Controllers;
use App\Property;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator,Redirect,Response,File,Auth;
use Carbon\Carbon;


class PropertyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //to get information about the tasks
    public function viewProperty() // VIEW ALL PROEPRTIES
    {
        $property = Property::all();

        return view('property.viewproperty',compact('property'));
    }

    public function viewCreateProperty() // VIEW CREATE FORM
    {
        return view('property.createproperty');
    }

    public function storeproperty(Request $request) //STORE PROPERTIES IN DATABASE
    {                    
        $request->validate([
            'name' => 'required| unique:properties',
         ]);

        DB::table('properties')->insert([
            'name' => $request->name,]);

        return $this->viewProperty();
    }

    public function viewedit(Property $property) // VIEW EDIT FORM
    {
        return view('property.editproperty', compact('property'));
    }

    public function update(Request $request, Property $property) //UPDATE IN THE DATABASE
    {
    $request->validate([
        'id' => 'required',
        'name' => 'required',
    ]);

    DB::table('properties')->where('id',$request->id)->update([
        'name' => $request->name,
    ]);

    return redirect()->route('property')
                    ->withSuccess('Property updated successfully');
}
}
