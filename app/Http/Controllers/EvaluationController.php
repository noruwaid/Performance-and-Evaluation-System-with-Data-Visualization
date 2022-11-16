<?php

namespace App\Http\Controllers;
use App\User;
use DB,Auth;
use App\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function listEvaluation() // VIEW CREATE FORM
    {
        if(Auth::User()->role == "director")
        {
        
            $evaluation = DB::table('userperformance')
            //->join('evaluation', 'evaluation.performanceid', '=', 'evaluation.id')
            ->join('users', 'userperformance.userid', '=', 'users.id')
            ->where('userperformance.status','Not Yet Evaluated')
            ->select('userperformance.performancedate as recordeddate','users.name as name',
            'userperformance.status as status','userperformance.id as id')
            ->get();

            $evaluatedevaluation = DB::table('userperformance')
            ->join('users', 'userperformance.userid', '=', 'users.id')
            ->join('evaluation', 'evaluation.performanceid', '=', 'userperformance.id')
            ->where('userperformance.status','Evaluated')
            ->select('userperformance.performancedate as recordeddate','users.name as name',
            'userperformance.status as status','userperformance.id as id')
            ->get();

            //dd($evaluatedevaluation);
        }
        else if(Auth::User()->role == "administrator")
        {
            $evaluation = DB::table('userperformance')
            //->join('evaluation', 'evaluation.performanceid', '=', 'evaluation.id')
            ->join('users', 'userperformance.userid', '=', 'users.id')
            ->select('userperformance.performancedate as recordeddate','users.name as name')
            ->where('userperformance.status','Evaluated')
            ->where('users.id',Auth::User()->id)
            ->get();

            $evaluatedevaluation = DB::table('userperformance')
            ->join('evaluation', 'evaluation.performanceid', '=', 'userperformance.id')
            ->join('users', 'userperformance.userid', '=', 'users.id')
            ->select('userperformance.performancedate as recordeddate','users.name as name','userperformance.id as id',
            'userperformance.status as status')
            ->where('users.id',Auth::User()->id)
            ->get();
        }
        else if(Auth::User()->role == "sales")
        {
            $evaluation = DB::table('userperformance')
            //->join('evaluation', 'evaluation.performanceid', '=', 'evaluation.id')
            ->join('users', 'userperformance.userid', '=', 'users.id')
            ->select('userperformance.performancedate as recordeddate','users.name as name')
            ->where('users.id',Auth::User()->id)
            ->get();

            $evaluatedevaluation = DB::table('userperformance')
            ->join('evaluation', 'evaluation.performanceid', '=', 'userperformance.id')
            ->join('users', 'userperformance.userid', '=', 'users.id')
            ->select('userperformance.performancedate as recordeddate','users.name as name','userperformance.id as id',
            'userperformance.status as status')
            ->where('userperformance.status','Evaluated')
            ->where('users.id',Auth::User()->id)
            ->get();
        }
        return view('evaluation.listevaluation',compact('evaluation','evaluatedevaluation'));
    }

    public function editEvaluation($id) // VIEW edit FORM
    {
        $role = DB::table('userperformance')
            ->join('users','users.id','=','userperformance.userid')
            ->where('userperformance.id', $id)
            ->value('users.role');

            //DD($role);
            $totalplan =   DB::table('plans')
                            ->where('plandate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();
            
            $totalplanactivity =   DB::table('plans')
                            ->join('planactivities','plans.id','=','planactivities.planid')
                            ->where('plandate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $statusplan =  DB::table('plans')
                        ->where('plandate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                        ->where('status','Completed')
                        ->count();

            $salesinitiative = DB::table('plans')
                            ->where('plandate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->wherenotnull('suggestion')
                            ->count();

            $adminremarks =   DB::table('userperformance')
                                ->value('remarks');

            $employeeownteamwork =  DB::table('userperformance')
                                 ->where('id', $id)
                                    ->value('teamworkrating');

            $employeeowncommunication =  DB::table('salesperformance')
                                    ->where('userperformanceid', $id)
                                    ->value('communication');
            
            $employeeratecommunication = DB::table('salesperformance')
                            ->join('communicationperformance','salesperformance.id','=','communicationperformance.salesperformanceid')
                            ->where('userperformanceid', $id)
                            ->select('communicationperformance.rating as rating')
                            ->geT();

            $employeerateteamwork = DB::table('teamworkperformance')
                            ->join('userperformance','userperformance.id','=','teamworkperformance.userperformanceid')
                            ->where('userperformanceid', $id)
                            ->select('teamworkperformance.rating as rating')
                            ->geT();

            $totalsales =   DB::table('sales')
                            ->join('users', 'sales.userid', '=', 'users.id')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('userperformance.id', $id)
                            ->where('sales.createdat', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->sum('commissionprice');

            $totaltask =   DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.status','Completed')
                            ->where('userperformance.id', $id)
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $ontimetask = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->where('taskrole.status','On-Time')
                            ->where('userperformance.id', $id)
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $latesubmissiontask = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->where('taskrole.status','Late')
                            ->where('userperformance.id', $id)
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $dependability = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.boolhelpstatus',true)
                            ->where('userperformance.id', $id)
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $dependabilityontime = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.boolhelpstatus',true)
                            ->where('taskrole.status','On-Time')
                            ->where('userperformance.id', $id)
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $totalattendance = DB::table('attendances')
                                ->where('attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                                ->get()->count();

            $attendattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.status','Attend')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $lateattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.timestatus','Late')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $earlyattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.timestatus','Early')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();
            
            $absentattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.status','Absent')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

                $admininitiative = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->where('userperformance.id', $id)
                            ->where('tasks.status','Completed')
                            ->wherenotnull('tasks.suggestion')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

                $admincheckbox = DB::table('evaluation')
                            ->join('adminevaluation','evaluation.id','=','adminevaluation.evaluationid')
                            ->where('evaluation.performanceid', $id)
                            ->select('evaluation.quantityofworkrating as quantityofwork','evaluation.initiativerating as initiative'
                            , 'evaluation.attendancerating as attendance','evaluation.teamworkrating as teamwork',
                            'adminevaluation.dependability as dependability',
                            'adminevaluation.qualityofwork as qualityofwork','evaluation.remarks as remarks',
                            'evaluation.id as id')
                            ->geT();
                
                $salescheckbox = DB::table('evaluation')
                            ->join('salesevaluation','evaluation.id','=','salesevaluation.evaluationid')
                            ->where('evaluation.performanceid', $id)
                            ->select('evaluation.quantityofworkrating as quantityofwork','evaluation.initiativerating as initiative'
                            , 'evaluation.attendancerating as attendance','evaluation.teamworkrating as teamwork',
                            'salesevaluation.communication as communication',
                            'salesevaluation.planning as planning','evaluation.remarks as remarks','evaluation.id as id')
                            ->geT();
    
    
        return view('evaluation.editevaluation',
        compact('totaltask','ontimetask','latesubmissiontask','dependability',
        'totalattendance','attendattendance','absentattendance','adminremarks'
        ,'dependabilityontime','admininitiative','role','id',
        'employeeownteamwork','lateattendance','earlyattendance',
        'employeerateteamwork','totalsales','employeeowncommunication','employeeratecommunication',
        'totalplan','totalplanactivity','statusplan','salesinitiative','admincheckbox','salescheckbox'));
            
        
        }

    public function createEvaluation($id) // VIEW CREATE FORM
    {
            $role = DB::table('userperformance')
            ->join('users','users.id','=','userperformance.userid')
            ->where('userperformance.id', $id)
            ->value('users.role');

            $userid = DB::table('userperformance')
            ->join('users','users.id','=','userperformance.userid')
            ->where('userperformance.id', $id)
            ->value('users.id');

            $totalplan =   DB::table('plans')
                            ->join('users','plans.userid','=','users.id')
                            ->join('userperformance','users.id','=','userperformance.userid')
                            ->where('userperformance.id', $id)
                            ->where('plans.userid', $userid)
                            ->where('plans.plandate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();
            
            $totalplanactivity =   DB::table('plans')
                            ->join('planactivities','plans.id','=','planactivities.planid')
                            ->join('users','plans.userid','=','users.id')
                            ->join('userperformance','users.id','=','userperformance.userid')
                            ->where('userperformance.id', $id)
                            ->where('plans.userid', $userid)
                            ->where('plans.plandate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $statusplan =  DB::table('plans')
                            ->join('users','plans.userid','=','users.id')
                            ->join('userperformance','users.id','=','userperformance.userid')
                            ->where('userperformance.id', $id)
                            ->where('plans.userid', $userid)
                        ->where('plans.plandate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                        ->where('plans.status','Completed')
                        ->count();

            $salesinitiative = DB::table('plans')
                            ->join('users','plans.userid','=','users.id')
                            ->join('userperformance','users.id','=','userperformance.userid')
                            ->where('userperformance.id', $id)
                            ->where('plans.userid', $userid)
                            ->where('plandate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->wherenotnull('suggestion')
                            ->count();

            $adminremarks =   DB::table('userperformance')
                                ->value('remarks');

            $employeeownteamwork =  DB::table('userperformance')
                                 ->where('id', $id)
                                    ->value('teamworkrating');

            $employeeowncommunication =  DB::table('salesperformance')
                                    ->where('userperformanceid', $id)
                                    ->value('communication');
            
            $employeeratecommunication = DB::table('salesperformance')
                            ->join('communicationperformance','salesperformance.id','=','communicationperformance.salesperformanceid')
                            ->where('userperformanceid', $id)
                            ->select('communicationperformance.rating as rating')
                            ->geT();

            $employeerateteamwork = DB::table('teamworkperformance')
                            ->join('userperformance','userperformance.id','=','teamworkperformance.userperformanceid')
                            ->where('userperformanceid', $id)
                            ->select('teamworkperformance.rating as rating')
                            ->geT();

            $totalsales =   DB::table('sales')
                            ->join('users', 'sales.userid', '=', 'users.id')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('userperformance.id', $id)
                            ->where('sales.createdat', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->sum('commissionprice');

            $totaltask =   DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.status','Completed')
                            ->where('userperformance.id', $id)
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $ontimetask = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->where('taskrole.status','On-Time')
                            ->where('userperformance.id', $id)
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $latesubmissiontask = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->where('taskrole.status','Late')
                            ->where('userperformance.id', $id)
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $dependability = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.boolhelpstatus',true)
                            ->where('userperformance.id', $id)
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $dependabilityontime = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.boolhelpstatus',true)
                            ->where('taskrole.status','On-Time')
                            ->where('userperformance.id', $id)
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $totalattendance = DB::table('attendances')
                                ->where('attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                                ->get()->count();

            $attendattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.status','Attend')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();
            
            $absentattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.status','Absent')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $lateattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.timestatus','Late')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $earlyattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.timestatus','Early')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

                $admininitiative = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->where('userperformance.id', $id)
                            ->where('tasks.status','Completed')
                            ->wherenotnull('tasks.suggestion')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            //dd($totaltask,$totalsubmitted);

        

        return view('evaluation.createevaluation',
        compact('totaltask','ontimetask','latesubmissiontask','dependability',
        'totalattendance','attendattendance','absentattendance','adminremarks'
        ,'dependabilityontime','admininitiative','role','id','employeeownteamwork'
        ,'lateattendance','earlyattendance',
        'employeerateteamwork','totalsales','employeeowncommunication','employeeratecommunication',
        'totalplan','totalplanactivity','statusplan','salesinitiative'));
            
        
    }

    public function showEvaluation($id) // VIEW CREATE FORM
    {   
        $role = DB::table('userperformance')
            ->join('users','users.id','=','userperformance.userid')
            ->where('userperformance.id', $id)
            ->value('users.role');

            $userid = DB::table('userperformance')
            ->join('users','users.id','=','userperformance.userid')
            ->where('userperformance.id', $id)
            ->value('users.id');

            $totalplan =   DB::table('plans')
                            ->join('users','plans.userid','=','users.id')
                            ->join('userperformance','users.id','=','userperformance.userid')
                            ->where('userperformance.id', $id)
                            ->where('plans.userid', $userid)
                            ->where('plans.plandate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();
            
            $totalplanactivity =   DB::table('plans')
                            ->join('planactivities','plans.id','=','planactivities.planid')
                            ->join('users','plans.userid','=','users.id')
                            ->join('userperformance','users.id','=','userperformance.userid')
                            ->where('userperformance.id', $id)
                            ->where('plans.userid', $userid)
                            ->where('plans.plandate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $statusplan =  DB::table('plans')
                            ->join('users','plans.userid','=','users.id')
                            ->join('userperformance','users.id','=','userperformance.userid')
                            ->where('userperformance.id', $id)
                            ->where('plans.userid', $userid)
                        ->where('plans.plandate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                        ->where('plans.status','Completed')
                        ->count();

            $salesinitiative = DB::table('plans')
                            ->join('users','plans.userid','=','users.id')
                            ->join('userperformance','users.id','=','userperformance.userid')
                            ->where('userperformance.id', $id)
                            ->where('plans.userid', $userid)
                            ->where('plandate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->wherenotnull('suggestion')
                            ->count();

            $adminremarks =   DB::table('userperformance')
                                ->value('remarks');

            $employeeownteamwork =  DB::table('userperformance')
                                 ->where('id', $id)
                                    ->value('teamworkrating');

            $employeeowncommunication =  DB::table('salesperformance')
                                    ->where('userperformanceid', $id)
                                    ->value('communication');
            
            $employeeratecommunication = DB::table('salesperformance')
                            ->join('communicationperformance','salesperformance.id','=','communicationperformance.salesperformanceid')
                            ->where('userperformanceid', $id)
                            ->select('communicationperformance.rating as rating')
                            ->geT();

            $employeerateteamwork = DB::table('teamworkperformance')
                            ->join('userperformance','userperformance.id','=','teamworkperformance.userperformanceid')
                            ->where('userperformanceid', $id)
                            ->select('teamworkperformance.rating as rating')
                            ->geT();

            $totalsales =   DB::table('sales')
                            ->join('users', 'sales.userid', '=', 'users.id')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('userperformance.id', $id)
                            ->where('sales.createdat', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->sum('commissionprice');

            $totaltask =   DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.status','Completed')
                            ->where('userperformance.id', $id)
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $ontimetask = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->where('taskrole.status','On-Time')
                            ->where('userperformance.id', $id)
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $latesubmissiontask = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->where('taskrole.status','Late')
                            ->where('userperformance.id', $id)
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $dependability = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.boolhelpstatus',true)
                            ->where('userperformance.id', $id)
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();
                            $lateattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.timestatus','Late')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $earlyattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.timestatus','Early')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $dependabilityontime = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.boolhelpstatus',true)
                            ->where('taskrole.status','On-Time')
                            ->where('userperformance.id', $id)
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $totalattendance = DB::table('attendances')
                                ->where('attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                                ->get()->count();

            $attendattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.status','Attend')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();
            
            $absentattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.status','Absent')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

                $admininitiative = DB::table('taskrole')
                            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->join('users', 'roles.userid', '=', 'users.id')
                            ->where('userperformance.id', $id)
                            ->where('tasks.status','Completed')
                            ->wherenotnull('tasks.suggestion')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->where('tasks.created', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

        $adminevaluation = DB::table('evaluation')
                            ->join('adminevaluation','evaluation.id','=','adminevaluation.evaluationid')
                            ->join('userperformance','userperformance.id','=','evaluation.performanceid')
                            ->join('users', 'userperformance.userid', '=', 'users.id')
                            ->where('evaluation.performanceid', $id)
                            ->select('evaluation.quantityofworkrating as quantityofwork','evaluation.initiativerating as initiative'
                            , 'evaluation.attendancerating as attendance','evaluation.teamworkrating as teamwork',
                            'adminevaluation.dependability as dependability',
                            'adminevaluation.qualityofwork as qualityofwork','evaluation.remarks as remarks',
                            'userperformance.id as id','evaluation.totalrating as totalrating','users.name as name',
                            'evaluation.evaluationdate')
                            ->geT();
        

            $salesevaluation = DB::table('evaluation')
                            ->join('salesevaluation','evaluation.id','=','salesevaluation.evaluationid')
                            ->join('userperformance','userperformance.id','=','evaluation.performanceid')
                            ->join('users', 'userperformance.userid', '=', 'users.id')
                            ->where('evaluation.performanceid', $id)
                            ->select('evaluation.quantityofworkrating as quantityofwork','evaluation.initiativerating as initiative'
                            , 'evaluation.attendancerating as attendance','evaluation.teamworkrating as teamwork',
                            'salesevaluation.communication as communication',
                            'salesevaluation.planning as planning','evaluation.remarks as remarks',
                            'userperformance.id as id','evaluation.totalrating as totalrating','users.name as name',
                            'evaluation.evaluationdate as evaluationdate')
                            ->geT();
        
                            $lateattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.timestatus','Late')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();

            $earlyattendance = DB::table('users')
                            ->join('userperformance','userperformance.userid','=','users.id')
                            ->join('userattendance','users.id','=','userattendance.userid')
                            ->join('attendances','attendances.id','=','userattendance.attendanceid')
                            ->where('userattendance.timestatus','Early')
                            ->where('userperformance.id', $id)
                            ->where('attendances.attendancedate', '>=', Carbon::now()->startOfMonth()->subMonth(4)->toDateString())
                            ->count();


        return view('evaluation.viewevaluation',compact('adminevaluation','salesevaluation', 'role','totaltask','ontimetask','latesubmissiontask','dependability',
        'totalattendance','attendattendance','absentattendance','adminremarks'
        ,'dependabilityontime','admininitiative','role','id','employeeownteamwork',
        'lateattendance','earlyattendance',
        'employeerateteamwork','totalsales','employeeowncommunication','employeeratecommunication',
        'totalplan','totalplanactivity','statusplan','salesinitiative'));
        
    }

    public function Rubric() // VIEW CREATE FORM
    {
        return view('evaluation.evaluationrubric');
    }

    public function store(Request $request) // VIEW CREATE FORM
    {   
        if($request->role =="administrator")
        {
        $request->validate([
            'qualityofwork' => 'required',
            'quantityofwork' => 'required',
            'teamwork' => 'required',
            'dependability' => 'required',
            'initiative' => 'required',
            'attendance' => 'required',
            'remarks' => 'required',
            'userperformanceid' => 'required',
        ]);
        //dd($request->all());
        $totalrating = 
        (
            ((($request->qualityofwork/5)*0.15)+
            (($request->quantityofwork/5)*0.5)+
            (($request->teamwork/5)*0.05)+
            (($request->dependability/5)*0.1)+
            (($request->initiative/5)*0.05)+
            (($request->attendance/5)*0.15))*100
        );
        $today = Carbon::today();
        $administrator = DB::table('evaluation')->insertGetId([
            'evaluationdate' => $today,
            'quantityofworkrating' => $request->quantityofwork,
            'teamworkrating' => $request->teamwork,
            'initiativerating' => $request->initiative,
            'attendancerating' => $request->attendance,
            'remarks' => $request->remarks,
            'performanceid' => $request->userperformanceid,
            'totalrating' => $totalrating,
        ]);

        //dd('huhu');

        DB::table('adminevaluation')->insert([
            'dependability' => $request->dependability,
            'qualityofwork' => $request->qualityofwork,
            'evaluationid' => $administrator,
        ]);

        DB::table('userperformance')->where('id',$request->userperformanceid)->update([
            'status' => "Evaluated",
        ]);
        }

        elseif($request->role =="sales")
        {
        $request->validate([
            'planning' => 'required',
            'quantityofwork' => 'required',
            'teamwork' => 'required',
            'communication' => 'required',
            'initiative' => 'required',
            'attendance' => 'required',
            'remarks' => 'required',
            'userperformanceid' => 'required',
        ]);
        //dd($request->all());
        $totalrating = 
        (
            ((($request->planning/5)*0.15)+
            (($request->quantityofwork/5)*0.5)+
            (($request->teamwork/5)*0.05)+
            (($request->communication/5)*0.1)+
            (($request->initiative/5)*0.05)+
            (($request->attendance/5)*0.15))*100
        );
        $today = Carbon::today();
        $administrator = DB::table('evaluation')->insertGetId([
            'evaluationdate' => $today,
            'quantityofworkrating' => $request->quantityofwork,
            'teamworkrating' => $request->teamwork,
            'initiativerating' => $request->initiative,
            'attendancerating' => $request->attendance,
            'remarks' => $request->remarks,
            'performanceid' => $request->userperformanceid,
            'totalrating' => $totalrating,

        ]);

        //dd('huhu');

        DB::table('salesevaluation')->insert([
            'planning' => $request->planning,
            'communication' => $request->communication,
            'evaluationid' => $administrator,
        ]);

        DB::table('userperformance')->where('id',$request->userperformanceid)->update([
            'status' => "Evaluated",
        ]);
        }
        //dd('kk');

        return redirect()->route('listevaluation')->withSuccess( 'Evaluation successfully updated.');;

    }

    public function update(Request $request, $id) // VIEW CREATE FORM
    {   
        if($request->role =="administrator")
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
        //dd($request->all());
        $totalrating = 
        (
            ((($request->qualityofwork/5)*0.15)+
            (($request->quantityofwork/5)*0.5)+
            (($request->teamwork/5)*0.05)+
            (($request->dependability/5)*0.1)+
            (($request->initiative/5)*0.05)+
            (($request->attendance/5)*0.15))*100
        );
        $administrator = DB::table('evaluation')
            ->where('id',$id)
            ->update([
            'quantityofworkrating' => $request->quantityofwork,
            'teamworkrating' => $request->teamwork,
            'initiativerating' => $request->initiative,
            'attendancerating' => $request->attendance,
            'remarks' => $request->remarks,
            'totalrating' => $totalrating,
        ]);

        //dd('huhu');

        DB::table('adminevaluation')
        ->where('evaluationid',$id)
        ->update([
            'dependability' => $request->dependability,
            'qualityofwork' => $request->qualityofwork,
        ]);

        }

        elseif($request->role =="sales")
        {
        $request->validate([
            'planning' => 'required',
            'quantityofwork' => 'required',
            'teamwork' => 'required',
            'communication' => 'required',
            'initiative' => 'required',
            'attendance' => 'required',
            'remarks' => 'required',
        ]);
        //dd($request->all());
        $totalrating = 
        (
            ((($request->planning/5)*0.15)+
            (($request->quantityofwork/5)*0.5)+
            (($request->teamwork/5)*0.05)+
            (($request->communication/5)*0.1)+
            (($request->initiative/5)*0.05)+
            (($request->attendance/5)*0.15))*100
        );
        $administrator = DB::table('evaluation')
        ->where('id',$id)
        ->update([
            'quantityofworkrating' => $request->quantityofwork,
            'teamworkrating' => $request->teamwork,
            'initiativerating' => $request->initiative,
            'attendancerating' => $request->attendance,
            'remarks' => $request->remarks,
            'totalrating' => $totalrating,

        ]);

        //dd('huhu');

        DB::table('salesevaluation')
        ->where('evaluationid',$id)
        ->update([
            'planning' => $request->planning,
            'communication' => $request->communication,
        ]);

    
        }
                return redirect()->route('listevaluation')->withSuccess( 'Evaluation successfully updated.');;
    }
}
