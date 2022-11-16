<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use PDF,DB;
use Carbon\Carbon;

  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $role = DB::table('userperformance')
            ->join('users','users.id','=','userperformance.userid')
            ->where('userperformance.id', $id)
            ->value('users.role');

            $userid = DB::table('userperformance')
            ->join('users','users.id','=','userperformance.userid')
            ->where('userperformance.id', $id)
            ->value('users.id');

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
                            'evaluation.id as id','evaluation.totalrating as totalrating','users.name as name',
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
                            'evaluation.id as id','evaluation.totalrating as totalrating','users.name as name',
                            'evaluation.evaluationdate as evaluationdate')
                            ->geT();

        $pdf = PDF::loadView('pdf', compact('adminevaluation','salesevaluation', 'role','totaltask','ontimetask','latesubmissiontask','dependability',
        'totalattendance','attendattendance','absentattendance','adminremarks'
        ,'dependabilityontime','admininitiative','role','id','employeeownteamwork',
        'lateattendance','earlyattendance',
        'employeerateteamwork','totalsales','employeeowncommunication','employeeratecommunication',
        'totalplan','totalplanactivity','statusplan','salesinitiative'));
    
    
        return $pdf->download('RMCSB_evaluation_details.pdf');
    }
}