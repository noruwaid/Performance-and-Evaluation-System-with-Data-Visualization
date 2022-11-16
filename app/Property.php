<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name', 
    ];


    /**public function Created() {

        $created = $this->created;

        $dt = Carbon::parse($created);

        return Carbon::createFromDate($dt->year)->diff(Carbon::now())->format(' %d days, %h hours and %i minutes');
    }*/

}
