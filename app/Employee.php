<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public static function getAll()
    {
        $employees = self::with(['post', 'rank', 'shift'])->get();

        foreach ($employees as $employee) {
            $employee->employeeRoute = route('employee', $employee->id);
            $employee->removeRoute = route('removeEmployee', $employee->id);
        }

        return $employees;
    }

    public static function saveData(Request $request, $id)
    {
        if (is_null($id)) {
            $employee = new Employee();
            $flashMessage = "Добавлен новый сотрудник - {$employee->lastname} {$employee->firstname}";
        } else {
            $employee = self::find($id);
            $flashMessage = "{$employee->lastname} {$employee->firstname}. Данные сотрудника сохранены.";
        }

        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->middlename = $request->middlename;
        $employee->post_id = $request->post;
        $employee->rank_id = $request->rank;
        $employee->shift_id = $request->shift;

        if ($request->croppedImage) {
            $image_name = $employee->lastname."_".time().".png";
            $path = public_path()."/upload/employees/".$image_name;

            list(, $image_src) = explode(",", $request->croppedImage);

            if (file_put_contents($path, base64_decode($image_src))) {
                $employee->pic_path = $image_name;
            }
        }

        if ($employee->save()) {
            $request->session()->flash('message', $flashMessage);
        }
    }

    public static function remove($id, Request $request)
    {
        $employee = self::find($id);
        if ($employee->delete()) {
            $request->session()->flash('message',
                "Сотрудник {$employee->lastname} {$employee->firstname} удален из базы данных");
        }
    }
}
