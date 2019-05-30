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
            $flashMessage = trans('messages.addEmployee');
        } else {
            $employee = self::find($id);
            $flashMessage = trans('messages.saveEmployee');
        }

        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->middlename = $request->middlename;
        $employee->post_id = $request->post;
        $employee->rank_id = $request->rank;
        $employee->shift_id = $request->shift;

        // save new image and delete old one
        if ($request->croppedImage) {
            $image_name = $employee->lastname."_".time().".png";
            $new_image = public_path('/').env('UPLOAD_EMPLOYEE_PHOTO_DIR').$image_name;
            $old_image = public_path('/').$request->oldImage;

            list(, $image_src) = explode(",", $request->croppedImage);

            if (file_put_contents($new_image, base64_decode($image_src))) {
                $employee->pic_path = env('UPLOAD_EMPLOYEE_PHOTO_DIR').$image_name;

                if (!empty($request->oldImage)) {
                    unlink($old_image);
                }
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
            if (!is_null($employee->pic_path)) {
                unlink(public_path('/').$employee->pic_path);
            }

            $request->session()->flash('message', trans('messages.removeEmployee', [
                    'lastname' => $employee->lastname,
                    'firstname' => $employee->firstname
                ])
            );
        }
    }
}
