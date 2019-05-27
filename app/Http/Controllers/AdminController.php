<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kris\LaravelFormBuilder\FormBuilder;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('admin.index', compact('employees'));
    }

    public function newEmployee(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\AddEmployeeForm', [
            'method' => 'POST',
            'url'    => route('addEmployee'),
        ]);
        return view('admin.newEmployee', compact('form'));
    }

    public function getEmployee($id)
    {

    }

    public function addEmployee(Request $request)
    {
        $employee = new Employee();

        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->middlename = $request->middlename;
        $employee->post_id = $request->post;
        $employee->rank_id = $request->rank;
        $employee->shift_id = $request->shift;

        if ($employee->save()) {
            $request->session()->flash('message',
                "Добавлен новый сотрудник - {$employee->lastname} {$employee->firstname}");
        }
        return redirect()->route('admin');
    }

    public function removeEmployee($id)
    {

    }

    public function updateEmployee($id)
    {

    }
}
