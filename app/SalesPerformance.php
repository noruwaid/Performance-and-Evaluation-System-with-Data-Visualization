<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SalesPerformance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "salesperformance";
    public $timestamps = false;

    protected $fillable = [
        'id', 
        'planning', 
        'communication',  

    ];

    public function userperformance ()
    {
        return $this->belongsTo('App\UserPerformance','id');
    }

}
