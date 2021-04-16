<?php
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;

class ProjectController extends Controller{
    // array imitates our model / database
    private $projects = [
        ['id' => 1, 'title' => 'Title 1', 'text' => 'Some text 1'],
        ['id' => 2, 'title' => 'Title 2', 'text' => 'Some text 2']
    ];

    public function index(){
        return view('projects', ['projects' => $this->projects]);
    }

    public function show($id){
        foreach($this->projects as $project){
            if($project['id'] == $id){
                return $project;
            }
        }
    }
}