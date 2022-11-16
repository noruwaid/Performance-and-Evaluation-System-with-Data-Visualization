<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */    
    public $table = "users";

    protected $fillable = [
        'id',
        'name', 
        'email', 
        'password',
        'ic', 
        'address', 
        'salary', 
        'startdate',
        'education',
        'jobdescription',
        'role',
        'dob',
        'phoneno',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    public static function age()
    {
        $birth = auth()->user()->dob; //1-1-1990

        $dt = Carbon::parse($birth);

        return Carbon::createFromDate($dt->year, $dt->month, $dt->day)->diff(Carbon::now())->format('%y years');
    }

    public static function duration()
    {
        $duration = auth()->user()->startdate; //1-1-1990

        $dt = Carbon::parse($duration);

        return Carbon::createFromDate($dt->year)->diff(Carbon::now())->format('%y years');
    }

    public function employeeage() {

        $age = $this->dob;

        $dt = Carbon::parse($age);

        return Carbon::createFromDate($dt->year)->diff(Carbon::now())->format('%y years');
    }

    public function employeeduration() {

        $duration = $this->startdate;

        $dt = Carbon::parse($duration);

        return Carbon::createFromDate($dt->year)->diff(Carbon::now())->format('%y years');
    }

    public function task ()
    {
        return $this->belongsToMany(Task::class, 'taskuser', 'id', 'taskid');
    }

    public function plan ()
    {
        return $this->hasMany('App\Plan','id');
    }

    public function userperformance ()
    {
        return $this->hasMany('App\UserPerformance','id');
    }
}
