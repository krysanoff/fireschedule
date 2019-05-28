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

    /**
     * Get page for creating a new employee
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newEmployee(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\AddEmployeeForm', [
            'method' => 'POST',
            'url'    => route('addEmployee'),
        ]);
        return view('admin.employee', compact('form'));
    }

    /**
     * Get page for editing employee's data
     *
     * @param $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEmployee($id, FormBuilder $formBuilder)
    {
        $employee = Employee::find($id)->toArray();
        $form = $formBuilder->create('App\Forms\AddEmployeeForm', $employee);
        return view('admin.employee', compact(['form']));
    }

    public function addEmployee(Request $request)
    {
        Employee::saveData($request);

        return redirect()->route('admin');
    }

    public function updateEmployee($id)
    {

    }

    public function removeEmployee($id)
    {

    }
}
