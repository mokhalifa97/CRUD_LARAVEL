<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\model\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $emp=Employee::all();
        return view('employee',['emp'=>$emp]);
    }

    public function show($id){
        $employee=Employee::findOrFail($id);
        return view('employee.show',['emp'=>$employee]);
    }

    public function delete($id){
        $employee=Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('home');
    }

    public function create(){
        $employee=Employee::all();
        return view('employee.create',['emp'=>$employee]);
    }

    public function save(EmployeeRequest $request){
        Employee::create([
            'id'=>$request->id,
            'emp_name'=>$request->emp_name,
            'department'=>$request->department,
            'dep_id'=>$request->dep_id,
            'shift'=>$request->shift,
            'salary'=>$request->salary,
        ]);
        return redirect()->route('home')->with('emp','NEW EMPLOYEE ADDED SUCCESSFULLY');
    }

    public function edit($id){
        $allEmp=Employee::all();
        $employee=Employee::findOrFail($id);
        return view('employee.edit',['emp'=>$employee,'allemp'=>$allEmp]);
    }
    
    public function update(EmployeeRequest $request){
        $old_id=$request->old_id;
        $employee=Employee::findOrFail($old_id);

        $employee->update([
            'id'=>$request->id,
            'emp_name'=>$request->emp_name,
            'department'=>$request->department,
            'dep_id'=>$request->dep_id,
            'shift'=>$request->shift,
            'salary'=>$request->salary,
        ]);

        return redirect()->route('home')->with('empupdate','UPDATED EMPLOYEE SUCCESSFULLY');
    }



}
