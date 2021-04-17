<?php
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller{

    public function index(){
        return view('projects', ['projects' => Project::all()]);
    }

    public function show($id){
        return view('project', ['project' => Project::find($id)]);
    }

    public function store(Request $request){
        $pr = new Project();
        $pr->project_name = $request['project_name'];
        $pr->project_employees = $request['project_employees'];
        return ($pr->save() == 1) 
        ? redirect('/projects')
        : "Project was not created";
    }

}