<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $guarded = [];

    public function orders ()
    {

        return $this->belongsToMany('App\Order', 'plate_order');
    }

    public function user ()
    {

        return $this->belongsTo('App\User');
    }

}
