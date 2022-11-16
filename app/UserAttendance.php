<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserAttendance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "userattendance";
    public $timestamps = false;

    protected $fillable = [
        'userid', 
        'attendanceid', 
        'status', 
        'timestatus', 


    ];


}
