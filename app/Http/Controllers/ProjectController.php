<?php

use App\Http\Controllers\Controller;

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Employee;

class ProjectController extends Controller
{

    public function index()
    {
        return view('projects', ['projects' => Project::all()]);
    }

    public function show($id)
    {
        return view('project', ['project' => Project::find($id)]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'project_name' => 'required|unique:projects,project_name|max:20',
            'project_employees' => 'required|max:40',
        ]);
        $pr = new Project();
        $pr->project_name = $request['project_name'];
        $pr->project_employees = $request['project_employees'];

        return ($pr->save() !== 1)
            ? redirect('/projects')->with('status_success', 'Project was created!')
            : redirect('/projects')->with('status_error', 'Project was not created!');
    }

    public function destroy($id)
    {
        Project::destroy($id);
        return redirect('/projects')->with('status_success', 'Project deleted!');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'project_name' => 'required|unique:projects,project_name, ' . $id . ',id|max:20',
            'project_employees' => 'required|max:40',
        ]);
        $pr = Project::find($id);
        $pr->project_name = $request['project_name'];
        $pr->project_employees = $request['project_employees'];
        return ($pr->save() !== 1)
            ? redirect('/projects/' . $id)->with('status_success', 'Project was updated!')
            : redirect('/projects/' . $id)->with('status_error', 'Project was not updated!');
    }

    public function storeEmployee($id, Request $request)
    {
        $this->validate($request, [
            'employee_name' => 'required|max:40'
        ]);
        $pr = Project::find($id);
        $em = new Employee();
        $em->employee_name = $request['employee_name'];
        $pr->employees()->save($em);
        return redirect()->back()->with('status_success', 'Employee added!');
    }
}
