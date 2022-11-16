<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PlanActivity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "planactivities";
    public $timestamps = false;


    protected $fillable = [
        'id', 
        'name', 
        'suggestion',  
        'status',  
        'activitiesdate',  
        'planid',  
    ];

}
