<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
    public $timestamps = [ "created_at" ];

    public function shift()
    {
        return $this->belongsTo('App\Shift');
    }
}
