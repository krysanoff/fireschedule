<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
