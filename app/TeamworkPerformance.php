<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TeamworkPerformance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "TeamworkPerformance";
    public $timestamps = false;

    protected $fillable = [
        'id', 
        'rating', 
        'userperformanceid',  

    ];

    public function userperformance ()
    {
        return $this->belongsTo('App\UserPerformance','userperformanceid');
    }

    
}
