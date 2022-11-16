<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'description', 
        'startdate',
        'enddate', 
        'status', 
        'content', 
        'filepath',
        'created',
        'submitted',
        'suggestion',
    ];

    protected $dates = [
        'created',
        'updated',
        // your other new column
    ];


    public function user ()
    {
        return $this->belongsToMany(User::class, 'taskuser', 'id', 'userid');
    }

    /**public function Created() {

        $created = $this->created;

        $dt = Carbon::parse($created);

        return Carbon::createFromDate($dt->year)->diff(Carbon::now())->format(' %d days, %h hours and %i minutes');
    }*/

}
