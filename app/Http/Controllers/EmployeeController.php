<?php

use App\Http\Controllers\Controller;

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        return view('employees', ['employees' => Employee::all()]);
    }

    public function show($id)
    {
        return view('employee', ['employee' => Employee::find($id)]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_name' => 'required|unique:employees,employee_name|max:20',
            'project_id' => 'required|max:40',
        ]);
        $em = new Employee();
        $em->employee_name = $request['employee_name'];
        $em->project_id = $request['project_id'];

        return ($em->save() !== 1)
            ? redirect('/employees')->with('status_success', 'Employee was created!')
            : redirect('/employees')->with('status_error', 'Employee was not created!');
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect('/employees')->with('status_success', 'Employee deleted!');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'employee_name' => 'required|unique:employees,employee_name, ' . $id . ',id|max:20',
            'project_id' => 'required|max:40',
        ]);
        $em = Employee::find($id);
        $em->employee_name = $request['employee_name'];
        $em->project_id = $request['project_id'];
        return ($em->save() !== 1)
            ? redirect('/employees/' . $id)->with('status_success', 'Employee was updated!')
            : redirect('/employees/' . $id)->with('status_error', 'Employee was not updated!');
    }
}

