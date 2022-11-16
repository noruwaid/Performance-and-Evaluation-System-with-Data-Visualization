<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth;
use App\Sale;
use Carbon\Carbon;

class AttendanceController extends Controller
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

     public function listattendance() // VIEW SALES DETAILS
     {
       if(Auth::User()->role == "director")
       {
         $attendance = DB::table('attendances')->distinct("attendancedate")
         ->orderBy('attendancedate', 'DESC')->get();
       }
       else
       {
         $attendance = DB::table('attendances')
                     ->join('userattendance','attendances.id','=','userattendance.attendanceid')
                     ->join('users','users.id','=','userattendance.userid')
                     ->select('users.name as name', 'attendances.attendancedate as date', 'userattendance.status'
                            ,'attendances.id as id')
                     ->where('users.id',Auth::User()->id)
                     ->orderBy('attendancedate', 'DESC')->get();
                    }

        return view('attendance.list',compact('attendance'));
        
     }

     public function show($attendanceid) // VIEW SALES DETAILS
     {
      if(Auth::User()->role == "director")
       {
         $attendance = DB::table('attendances')
         ->join('userattendance','attendances.id','=','userattendance.attendanceid')
         ->join('users','users.id','=','userattendance.userid')
         ->select('users.name as name', 'attendances.attendancedate as date', 'userattendance.status'
         , 'attendances.id as id')
         ->where('attendances.id',$attendanceid)
         ->get();
       }
       else
       {

         $attendance = DB::table('attendances')
         ->join('userattendance','attendances.id','=','userattendance.attendanceid')
         ->join('users','users.id','=','userattendance.userid')
         ->select('users.name as name', 'attendances.attendancedate as date', 'userattendance.status'
         , 'attendances.id as id')
         ->where('users.id',Auth::User()->id)
         ->where('attendances.id',$attendanceid)
         ->get();
       }
       

        return view('attendance.show',compact('attendance'));
        
     }

     public function store(Request $request) //STORE PROPERTIES IN DATABASE
     {           

         $request->validate([
             'attendancedate' => 'required | unique:attendances',
          ]);

          $attendanceid = DB::table('attendances')->insertGetID([
            'attendancedate' => $request->attendancedate,]);
        
         $employee =  DB::table('users')
         ->where('role','!=', 'director')
         ->pluck('id');
        
         //dd($employee);
        
        foreach ($employee as $users)
        {
             DB::table('userattendance')->insert([
                'userid' => $users,
                'attendanceid' => $attendanceid,
                'status' => 'Absent',]);
        }
        return redirect()->route('listattendance')
        ->withSuccess( 'Attendance successfully created.');
     }

     public function update($attendance) //update attendance for administrator
    {   
        $now = Carbon::now();
        $todaydate = Carbon::parse(DB::table('attendances')
        ->where('attendancedate',$attendance)
        ->value('attendancedate'));


        if (Carbon::now()->gte($todaydate->setTime(8,30,0)))
        {
        DB::table('userattendance')
        ->where('userid',Auth::User()->id)
        ->where('attendanceid',$attendance)
        ->update([
                'status' => 'Attend',
                'timestatus' => 'Late',
        ]);
        }
        else
        {
        DB::table('userattendance')
        ->where('userid',Auth::User()->id)
        ->where('attendanceid',$attendance)
        ->update([
                'status' => 'Attend',
                'timestatus' => 'Early',
        ]);
        }

             return back()->withSuccess( 'Attendance successfully updated.');
     }
}