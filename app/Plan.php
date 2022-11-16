<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "plans";
    public $timestamps = false;

    protected $fillable = [
        'id', 
        'name', 
        'userid',  
        'plandate',  
        'suggestion',  
    ];

    public function planactivity ()
    {
        return $this->belongsToMany(PlanActivity::class, 'planactivities', 'id', 'planid');
    }

    public function user ()
    {
        return $this->belongsTo('App\User','userid');
    }

}
