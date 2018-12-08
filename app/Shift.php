<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public $timestamps = false;

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function graphs()
    {
        return $this->hasMany('App\Graph');
    }
}
