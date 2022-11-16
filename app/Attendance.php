<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "attendances";
    public $timestamps = false;

    protected $fillable = [
        'id', 
        'attendancedate', 

    ];


}
