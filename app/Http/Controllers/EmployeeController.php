<?php
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;

class EmployeeController extends Controller{
    // array imitates our model / database
    private $employees = [
        ['id' => 1, 'title' => 'Title 1', 'text' => 'Some text 1'],
        ['id' => 2, 'title' => 'Title 2', 'text' => 'Some text 2']
    ];

    public function index(){
        return view('employees', ['employees' => $this->employees]);
    }

    public function show($id){
        foreach($this->employees as $employee){
            if($employee['id'] == $id){
                return $employee;
            }
        }
    }
}
