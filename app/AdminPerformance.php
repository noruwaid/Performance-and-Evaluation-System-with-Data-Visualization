<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AdminPerformance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "adminperformance";
    public $timestamps = false;

    protected $fillable = [
        'id', 
        'dependability', 
        'qualityofwork',  

    ];

    public function userperformance ()
    {
        return $this->belongsTo(UserPerformance::class, 'userperformance', 'performanceid', 'id');
    }

}
