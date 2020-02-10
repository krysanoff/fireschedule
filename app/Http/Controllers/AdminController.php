<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
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
     * Admin page
     *
     * @return Factory|View
     */
    public function index()
    {
        $employees = Employee::getAll();
        return view('admin.index', compact('employees'));
    }

    /**
     * Get page for creating a new employee
     *
     * @param FormBuilder $formBuilder
     * @return Factory|View
     */
    public function newEmployee(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\AddEmployeeForm', [
            'method' => 'POST',
            'url'    => route('saveEmployee'),
        ]);
        return view('admin.employee', compact('form'));
    }

    /**
     * Get page for editing employee's data
     *
     * @param $id
     * @param FormBuilder $formBuilder
     * @return Factory|View
     */
    public function getEmployee($id, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\AddEmployeeForm', array_merge(Employee::find($id)->toArray(), [
            'method' => 'POST',
            'url' => route('saveEmployee', ['id' => $id])
        ]));

        return view('admin.employee', compact(['form']));
    }

    public function saveEmployee(Request $request, $id = null)
    {
        Employee::saveData($request, $id);

        return redirect()->route('admin');
    }

    public function removeEmployee($id, Request $request)
    {
        Employee::remove($id, $request);

        return redirect()->route('admin');
    }
}
