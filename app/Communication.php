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
    public $table = "communicationperformance";
    public $timestamps = false;

    protected $fillable = [
        'id', 
        'rating', 
        'salesperformanceid',  

    ];

    public function userperformance ()
    {
        return $this->belongsTo('App\SalesPerformance','salesperformanceid');
    }

}
