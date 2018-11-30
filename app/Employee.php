<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function shift()
    {
        return $this->belongsTo('App\Shift');
    }

    public function rank()
    {
        return $this->belongsTo('App\Rank');
    }
}
