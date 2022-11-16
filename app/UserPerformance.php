<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserPerformance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "userperformance";
    public $timestamps = false;

    protected $fillable = [
        'id', 
        'performancedate', 
        'userid',  
        'remarks',  
        'quantityofworkrating',  
        'attendancerating',  
        'initiativerating',  
        'teamworkrating',
        'totalrating',

    ];

    public function user ()
    {
        return $this->belongsTo('App\User', 'userid');
    }

    public function teamwork ()
    {
        return $this->hasMany('App\TeamworkPerformance','id');
    }

    public function adminperformance()
    {
        return $this->hasMany(AdminPerformance::class, 'adminperformance', 'id', 'performanceid');
    }

    public function salesperformance()
    {
        return $this->hasMany(SalesPerformance::class, 'salesperformance', 'id', 'performanceid');
    }
}
