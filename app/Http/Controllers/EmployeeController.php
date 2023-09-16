<?php

namespace App\Http\Controllers;

use App\model\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $emp=Employee::all();
        return view('employee',['emp'=>$emp]);
    }
}
