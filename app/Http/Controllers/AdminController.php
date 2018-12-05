<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Post;
use Illuminate\Http\Request;
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
        return view('admin');
    }

    public function newEmployee(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\AddEmployeeForm', [
            'method' => 'POST',
            'url'    => route('addEmployee'),
        ]);
        return view('newEmployee', compact('form'));
    }

    public function getEmployee($id)
    {

    }

    public function addEmployee()
    {

    }

    public function removeEmployee($id)
    {

    }

    public function updateEmployee($id)
    {

    }
}
