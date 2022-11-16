<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Auth, Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user=User::where('id',Auth::User()->id)->get();

        return view ('profile', compact('user'));
    }

    public function view()
    {
        $users = DB::select('select * from users where role!="director"');
        return view('director.viewemployee',['users'=>$users]);
    }

    public function destroy(User $id) {
       $id->delete();

       return redirect()->route('employee')->withSuccess( 'Employee successfully deleted.');
        }

    public function show(User $users)
    {
        $period = now()->subMonths(11)->monthsUntil(now());
        $data = [];
        $completiondata = [];
        $ontime = [];
        $late = [];

        foreach ($period as $date) //to get tasks by month
        {
            $data[] = [
                $date->format('F') ,
            ];
            $completiondata[] = DB::table('tasks')
            ->join('taskrole','tasks.id','=','taskrole.taskid')
            ->join('roles','roles.id','=','taskrole.roleid')
            ->join('users','users.id','=','roles.userid')
            ->where('users.id', $users->id)
            ->whereMonth('tasks.submitted','=', Carbon::parse($date->format('F'))->month        )
            ->where('tasks.status', 'Completed')
            ->count();

            $ontime[] = DB::table('tasks')
            ->join('taskrole','tasks.id','=','taskrole.taskid')
            ->join('roles','roles.id','=','taskrole.roleid')
            ->join('users','users.id','=','roles.userid')
            ->where('users.id', $users->id)
            ->whereMonth('tasks.submitted','=', Carbon::parse($date->format('F'))->month        )
            ->where('taskrole.status', 'On-Time')
            ->count();

            $late[] = DB::table('tasks')
            ->join('taskrole','tasks.id','=','taskrole.taskid')
            ->join('roles','roles.id','=','taskrole.roleid')
            ->join('users','users.id','=','roles.userid')
            ->where('users.id', $users->id)
            ->whereMonth('tasks.submitted','=', Carbon::parse($date->format('F'))->month        )
            ->where('taskrole.status', 'Late')
            ->count();
        }

        $data= json_decode( json_encode($data), true); //convert from collection to array
        $MonthName = call_user_func_array('array_merge', $data);//merger into one array

        $salesmonth = [];
        $sales = [];

        for ($m=1; $m<=12; $m++) //to get sales of the month
        {
            $salesmonth[] = date('F', mktime(0,0,0,$m, 1, date('Y')));

            $sales[] = DB::table('sales')
            ->join('users','users.id','=','sales.userid')
            ->where('users.id', $users->id)
            ->whereMonth('createdat','=', Carbon::parse(date('F', mktime(0,0,0,$m, 1, date('Y'))))->month        )
            ->sum('commissionprice');
        }
       
        $data= json_decode( json_encode($data), true); //convert from collection to array
        $MonthName = call_user_func_array('array_merge', $data);//merger into one array

        return view('director.employeedetails',compact('users','MonthName','completiondata','ontime','late','salesmonth', 'sales'));
     }

     public function update(Request $request) {
        $request->validate([
            'id' => 'required',
        ]);
  
        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'ic' => $request->ic,
            'phoneno' => $request->phoneno,
            'salary' => $request->salary,
            'address' => $request->address,
            'dob' => $request->dob,
            'startdate' => $request->startdate,
            'education' => $request->education,
            'jobdescription' => $request->jobdescription,
            'password' =>  $request->password,

        ]);

        return redirect()->route('profile')->withSuccess( 'Account successfully updated.');
         }
}