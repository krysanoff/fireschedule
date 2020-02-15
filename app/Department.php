<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Department extends Model
{
    public function users()
    {
        $this->hasMany('App\User');
    }

    /*
     * Create new department
     * */
    public function createDepartment(Request $request)
    {
        $department = new self();

        $department->name = $request->department;

        $department->save();
    }
}
