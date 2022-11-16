<?php

namespace App\Http\Controllers;
use App\Task;
use App\User;
use App\Role;
use App\TaskRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator,Redirect,Response,File,Auth;
use Carbon\Carbon;


class TaskController extends Controller
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
    public function view(Request $request)
    {  
       
       $assign = DB::table('tasks')
        ->where('tasks.status', 'Assigned')
        ->get();

        $progress = DB::table('tasks')
        ->where('tasks.status', 'In-Progress')
        ->get();

        $completed =  DB::table('taskrole')
        ->join('tasks','taskrole.taskid', '=', 'tasks.id')
        ->join('roles', 'taskrole.roleid', '=', 'roles.id')
        ->join('users', 'roles.userid', '=', 'users.id')
        ->select('tasks.name as name', 'taskrole.status as submissionstatus', 'tasks.startdate as startdate' , 'tasks.enddate as enddate', 'tasks.id as id', 'tasks.submitted as submitted')
        ->where('tasks.status', 'Completed')->distinct()
        ->get();

        $directorhelp =  DB::table('tasks')
        ->where('tasks.helpstatus', 'Require Help')
        ->get();

        //for admin view
                    $adminassign = DB::table('taskrole')
                    ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                    ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                    ->join('users', 'roles.userid', '=', 'users.id')
                    ->select('tasks.name as name', 'tasks.status as status', 'tasks.startdate as startdate' , 'tasks.enddate as enddate', 'tasks.id as id', 'tasks.created as created')
                    ->where('users.id', Auth::user()->id)
                    ->where('tasks.status', 'Assigned')
                    ->get();

                    $adminprogress = DB::table('taskrole')
                    ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                    ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                    ->join('users', 'roles.userid', '=', 'users.id')
                    ->select('tasks.name as name', 'tasks.status as status', 'tasks.startdate as startdate' , 'tasks.enddate as enddate', 'tasks.id as id', 'tasks.created as created')
                    ->where('users.id', Auth::user()->id)
                    ->where('tasks.status', 'In-Progress')
                    ->get();

                    $admincompleted = DB::table('taskrole')
                    ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                    ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                    ->join('users', 'roles.userid', '=', 'users.id')
                    ->select('tasks.name as name', 'taskrole.status as submissionstatus', 'tasks.startdate as startdate' , 'tasks.enddate as enddate', 'tasks.id as id', 'tasks.submitted as submitted')
                    ->where('users.id', Auth::user()->id)
                    ->where('tasks.status', 'Completed')
                    ->get();

                    $adminhelp =  DB::table('taskrole')
                    ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                    ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                    ->join('users', 'roles.userid', '=', 'users.id')
                    ->select('tasks.name as name', 'tasks.status as status', 'tasks.startdate as startdate' , 'tasks.enddate as enddate', 'tasks.id as id', 'tasks.created as created')
                    ->where('users.id', Auth::user()->id)
                    ->where('tasks.helpstatus', 'Require Help')
                    ->get();

        
    return view('task.task',compact('assign','completed','adminassign','admincompleted','progress','adminprogress','directorhelp','adminhelp'));
    }

    //to get administratore employee to be displayed in form
    public function viewcreatetask()
    {  
        $users = DB::select('select * from users where role="administrator"');
        return view('task.createtask',['users'=>$users]);
    }

    //create task for director (done at 13 April 2022)
    public function store(Request $request)
    {        
        $now = Carbon::now();

        $request->validate([
            'name' => 'required',
            'enddate' => 'required',
            'userid' => 'required',
            'description' => 'required',
         ]);

         if($request->hasFile('file')){
                $file = $request->file('file') ;
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path().'/files' ;
                $file->move($destinationPath,$fileName);

                $data = DB::table('tasks')->insertGetId([
                    'name' => $request->name,
                    'description' => $request->description,
                    'startdate' => $now,
                    'enddate' => $request->enddate,
                    'content' => $request->content,
                    'status' => 'Assigned',
                    'filepath' => $fileName,
                    'created' => $now,
                    'helpstatus' => 'Does Not Require Help',
                ]);
         }
            
        $data = DB::table('tasks')->insertGetId([
            'name' => $request->name,
            'description' => $request->description,
            'startdate' => $now,
            'enddate' => $request->enddate,
            'content' => $request->content,
            'status' => 'Assigned',
            'created' => $now,
            'helpstatus' => 'Does Not Require Help',

        ]);
        
        if (count($request->userid) == 1)
        {
            foreach ($request->userid as $value => $task)
        {
            $role = DB::table('roles')->insertGetId([
                'userid' =>  $request->userid[$value],
                'name' => "Submitter",

    
            ]);

            DB::table('taskrole')->insert([
                'taskid' => $data,
                'roleid' =>  $role,
            ]);
        }
            
        }
        else if (count($request->userid) > 1)
        {  
            foreach ($request->userid as $value => $task)
            {
            $role = DB::table('roles')->insertGetId([
                'userid' =>  $request->userid[$value],
            ]);

            DB::table('taskrole')->insert([
                'taskid' => $data,
                'roleid' =>  $role,
            ]);
        }
        }
        
        /*if (count($request->userid) > 0){
            
          //  foreach ($request->userid as $task => $t{
                $data = new  TaskUser;
                $data->taskid => $task->id,
                $data->userid =>  $request->userid[$task],                
                $data->save();
            }
        }
        */
        // User::create($request->all());
   
        return redirect()->route('task')
        ->withSuccess( 'Task successfully created.');

    }

    //to delete task for director (done at 13 April 2022)
    public function destroy($assign) {
        
        $data = DB::table('taskrole')
        ->join('roles','taskrole.roleid','=','roles.id')
        ->where('taskrole.taskid','=', $assign)
        ->pluck('roles.id');

        DB::table('roles')->where('id', $data)->delete();
        DB::table('tasks')->where('id', $assign)->delete();
        DB::table('taskrole')->where('taskid', $assign)->delete();


        return redirect()->route('task')->withSuccess( 'Task successfully deleted.');
         }

    public function show( $assign)
    {
        $task = Task::where('id', $assign)->get();
                $db = DB::table('taskrole')
                ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                ->join('users', 'roles.userid', '=', 'users.id')
                ->select('users.name as username', 'users.id as id','roles.name as rolename')
                ->where('tasks.id',$assign)
                ->get();
        return view('task.taskdetails',['db'=>$db],['task'=>$task]);
     }

     public function edit( $assign)
    {

        if(Auth::User()->role == "administrator") //TO GET THE VIEW OF TASK IN EDIT FORM WITH AUTH
        {
        $task = DB::table('taskrole')
                ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                ->join('users', 'roles.userid', '=', 'users.id')
                ->select('tasks.name as name', 'tasks.enddate as enddate',
                'tasks.description as description','tasks.filepath as filepath',
                'tasks.content as content','roles.name as roleid','tasks.id as taskid'
                ,'tasks.helpstatus as helpstatus', 'tasks.suggestion as suggestion')
                ->where('tasks.id', $assign)
                ->where('users.id', Auth::user()->id)
                ->take(1)->get();

                return view('task.edittask',compact('task'));
        }
        elseif(Auth::User()->role == "director") //TO GET THE VIEW OF TASK IN EDIT FORM WITHOUT AUTH
        {
        $task = DB::table('taskrole')
                ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                ->join('users', 'roles.userid', '=', 'users.id')
                ->select('tasks.name as name', 'tasks.enddate as enddate',
                'tasks.description as description','tasks.filepath as filepath',
                'tasks.content as content','roles.name as roleid','tasks.id as taskid','users.id as userid'
                ,'tasks.helpstatus as helpstatus' , 'tasks.suggestion as suggestion')
                ->where('tasks.id', $assign)
                ->take(1)->get();

            $users = DB::select('select * from users where role="administrator"'); //TO CALL USERS TO BE USED IN DIRECTOR EDIT FORM
            $db = DB::table('taskrole')
            ->join('tasks','taskrole.taskid', '=', 'tasks.id')
            ->join('roles', 'taskrole.roleid', '=', 'roles.id')
            ->join('users', 'roles.userid', '=', 'users.id')
            ->select('users.name as username', 'users.id as id')
            ->where('tasks.id',$assign)
            ->get();

            return view('task.edittask',compact('task','db','users'));
        }
                //dd($users,$db);

     }

     //update task
     public function update(Request $request)
     {
        $now = Carbon::now(); //GET CURRENT TIME

        $enddate = Carbon::parse($request->enddate); //GET TIME OF ENDDATE

         if (Auth::user()->role == "administrator") //ADMIN UPDATE
         {
                    //IF HAS FILE ONLY
                    if($request->hasFile('file')){
                        $file = $request->file('file') ;
                        $fileName = $file->getClientOriginalName() ;
                        $destinationPath = public_path().'/files' ;
                        $file->move($destinationPath,$fileName);

                        if($now->lessThan($enddate))
                        $submissionstatus = "On-Time";
                        else
                        $submissionstatus = "Late";

                        DB::table('tasks')->where('id',$request->id)->update([
                            'filepath' => $fileName,
                            'status' => "Completed",
                            'submitted' => $now,
                            'helpstatus' => "Does Not Require Help",  

                        ]);

                        DB::table('taskrole')->where('taskid',$request->id)->update([
                            'status' => $submissionstatus,
                        ]);
                    } //IF HAS CONTENT ONLY
                    else if($request->content){

                        if($now->lessThan($enddate))
                        $submissionstatus = "On-Time";
                        else
                        $submissionstatus = "Late";

                        DB::table('tasks')->where('id',$request->id)->update([
                            'content' => $request->content,
                            'status' => "Completed",
                            'submitted' => $now,
                            'helpstatus' => "Does Not Require Help",  

                        ]);

                        DB::table('taskrole')->where('taskid',$request->id)->update([
                            'status' => $submissionstatus,
                        ]);
                    }
                    else{ //IF BOTH ARE CHOSEN
                        $file = $request->file('file') ;
                        $fileName = $file->getClientOriginalName() ;
                        $destinationPath = public_path().'/files' ;
                        $file->move($destinationPath,$fileName);

                        if($now->lessThan($enddate))
                        $submissionstatus = "On-Time";
                        else
                        $submissionstatus = "Late";

                        DB::table('tasks')->where('id',$request->id)->update([
                            'filepath' => $fileName,
                            'status' => "Completed",
                            'content' => $request->content,
                            'submitted' => $now,
                            'helpstatus' => "Does Not Require Help",  

                        ]);

                        DB::table('taskrole')->where('taskid',$request->id)->update([
                            'status' => $submissionstatus,
                            'helpstatus' => "Does Not Require Help",  

                        ]);

                    }
            }
            else if (Auth::user()->role == "director") //DIRECTOR UPDATE
            {
                if($request->hasFile('file')){ //IF GOT FILE
                    $file = $request->file('file') ;
                    $fileName = $file->getClientOriginalName() ;
                    $destinationPath = public_path().'/files' ;
                    $file->move($destinationPath,$fileName);

                    DB::table('tasks')->where('id',$request->id)->update([
                        'name' => $request->name,
                        'description' => $request->description,
                        'startdate' => $now,
                        'enddate' => $request->enddate,
                        'content' => $request->content,
                        'filepath' => $fileName,
                        'status' => 'Assigned',
                        'suggestion' => $request->suggestion,
                    ]);
                }
                else{ //IF WANT TO CHANGE OTHER THAN FILE
                DB::table('tasks')->where('id',$request->id)->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'startdate' => $now,
                    'enddate' => $request->enddate,
                    'content' => $request->content,
                    'status' => 'Assigned',
                    'suggestion' => $request->suggestion,

                ]);
                }
                
                //UPDATING ASSIGNED USERS BUT TO HARD.. CONSULT THIS! 
                /*if (count($request->userid) == 1)
                {
                    foreach ($request->userid as $value => $task)
                {
                    $task = DB::table('taskrole')
                    ->join('tasks','taskrole.taskid', '=', 'tasks.id')
                    ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                    ->join('users', 'roles.userid', '=', 'users.id')
                            ->where('tasks.id',$request->id)
                            ->pluck('roles.id')->first();

                    DB::table('roles')->updateOrInsert([
                        'id' => $task],
                        ['userid' =>  $request->userid[$value],
                        'name' => "Submitter",
                    ]);

                    
                    $notinform = DB::table('taskrole')
                    ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->where('taskrole.taskid', '=', $request->id)
                            ->where('roles.userid','<>',$request->userid)
                            ->pluck('roles.id');

                    $notinformuser = DB::table('taskrole')
                    ->join('roles', 'taskrole.roleid', '=', 'roles.id')
                            ->where('taskrole.taskid', '=', $request->id)
                            ->where('roles.userid','<>',$request->userid)
                            ->pluck('roles.userid'); 
                    
                }
                    
                }
                else if (count($request->userid) > 1)
                {
                    
                    foreach ($request->userid as $value => $task)
                    {
                        $task = DB::table('roles')
                            ->where('roles.userid','=',$request->userid[$value])
                            ->pluck('id');
                        dd($task);
                            DB::table('roles')->updateOrInsert(
                        ['id' =>  $tasks,
                            'userid' =>  $request->userid[$value],
                        'name' =>'',
                    ]);
                    
                   

                    DB::table('taskrole')->updateOrInsert(
                        [
                            'taskid' => $request->id,
                        'roleid' =>  $tasks,
                    ]);
                
            }
        }*/
         // $student->update($request->all());
         }
         return redirect()->route('taskshow', ['assign' => $request->id])->withSuccess( 'Task successfully updated.');;

     }

     //DELETE FILEPATH IN EDIT FORM
     public function delete($id)
        {
            $task = DB::table('tasks')->where('id',$id)->update([
                    'filepath' => null,
                ]);

                return back()->withSuccess( 'File successfully deleted.');        
            }

    //UPDATE ROLE ESPECIALLY IF TWO USERS ARE ASSIGNED
    public function role(Request $request)
        {             

            $request->validate([
                'taskid' => 'required',
                'userid' => 'required',
                'rolename' => 'required',
             ]);

            $user = DB::table('roles')
                ->join('taskrole','taskrole.roleid','=','roles.id')
                ->join('users','users.id','=','roles.userid')
                ->where('taskrole.taskid',$request->taskid)
                ->where('users.id','=',$request->userid)
                ->pluck('users.id');

            $userrole = DB::table('roles')
                ->join('taskrole','taskrole.roleid','=','roles.id')
                ->join('users','users.id','=','roles.userid')
                ->where('taskrole.taskid',$request->taskid)
                ->where('users.id','=',$request->userid)
                ->pluck('roles.id');
            
            $otheruserrole = DB::table('roles')
                ->join('taskrole','taskrole.roleid','=','roles.id')
                ->join('users','users.id','=','roles.userid')
                ->where('taskrole.taskid',$request->taskid)
                ->where('users.id','<>',$request->userid)
                ->pluck('roles.id');

                if($request->rolename == "Submitter")
                {
                DB::table('roles')
                ->where('roles.id',$userrole)
                ->where('roles.userid',$user)
                ->update([
                        'roles.name' => $request->rolename,
                ]);

                DB::table('roles')
                ->where('roles.userid','<>',$user)
                ->where('roles.id',$otheruserrole)
                ->update([
                        'roles.name' => 'Doer',
                ]);

                DB::table('tasks')
                ->where('id',$request->taskid)
                ->update([
                        'status' => 'In-Progress',
                ]);
            }
                if($request->rolename == "Doer")
                {
                DB::table('roles')
                ->where('roles.id',$userrole)
                ->where('roles.userid',$user)
                ->update([
                        'roles.name' => $request->rolename,
                ]);

                DB::table('roles')
                ->where('roles.userid','<>',$user)
                ->update([
                        'roles.name' => 'Submitter',
                ]);

                DB::table('tasks')
                ->where('id',$request->taskid)
                ->update([
                        'status' => 'In-Progress',
                ]);
             }
            
             return back()->withSuccess( 'Role successfully assigned.');
        
        }

    public function updateprogress($adminassign) //update progress for administrator
    {   

        DB::table('tasks')
        ->where('id',$adminassign)
        ->update([
                'status' => 'In-Progress',
        ]);

             return back()->withSuccess( 'Task successfully in-progress. Finish Your Work On Time :)');
     }

     public function helpstatus($taskid) //update progress for administrator
    {   
        //dd($taskid);

        DB::table('tasks')
        ->where('id',$taskid)
        ->update([
                'helpstatus' => 'Require Help',
                'boolhelpstatus' => 1,
        ]);

             return back()->withSuccess( 'Your task is updated in database.');
     }
}
     