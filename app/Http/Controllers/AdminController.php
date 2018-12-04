<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function newEmployee()
    {
        return view('welcome');
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
