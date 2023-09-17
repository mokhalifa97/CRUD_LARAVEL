<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\model\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class employeeController extends Controller
{
    public function index(){
        $employee= EmployeeResource::collection(Employee::all());
        $data=[
            'msg'=> 'ALL EMPLOYEES RECORDS!',
            'status'=> 200,
            'data'=> $employee
        ];
        return response()->json($data);
    }

    public function show($id){
        $employee=Employee::find($id);
        if($employee){
            $data=[
                'msg'=> 'RETURN ONE RECORD FORM EMPLOYEES!',
                'status'=> 201,
                'data'=> new EmployeeResource($employee)
            ];
            return response()->json($data);
        }else{
            $data=[
                'msg'=> 'NO RECORD FOUND!',
                'status'=> 200,
                'data'=> null
            ];
            return response()->json($data);
        }
    }

    public function create(Request $request){
        $validate=Validator::make($request->all(),[
            'id' => 'required|unique:posts|max:11',
            'emp_name' => 'required| min:5|max:255',       
            'department' => 'required| min:5|max:255',       
            'dep_id' => 'required|max:11',       
            'shift' => 'required|max:255',       
            'salary' => 'required|max:255',  
        ]);

        if($validate->fails()){
            $data=[
                "msg"=> "NOT VALID DATA!!",
                "status"=> 203,
                "data" => $validate->errors()
            ];
            return response()->json($data);
        }

        $new=Employee::create([
            'id'=>$request->id,
            'emp_name'=>$request->emp_name,
            'department'=>$request->department,
            'dep_id'=>$request->dep_id,
            'shift'=>$request->shift,
            'salary'=>$request->salary,
        ]);
        $data=[
            "msg"=> "CREATED NEW RECORD SUCCESSFULLY!!",
            "status"=> 201,
            "data" => new EmployeeResource($new)
        ];
        return response()->json($data);
    }

    public function delete(Request $request){
        $id=$request->id;
        $employee=Employee::find($id);
        $employee->delete();
        $data=[
            "msg"=> "deleted successfully !",
            "status"=> 205,
            "data" => null
        ];
        return response()->json($data);
    }

    public function update(Request $request){
        $validate=Validator::make($request->all(),[
            'id' => 'unique:posts|max:11',
            'emp_name' => 'required| min:5|max:255',       
            'department' => 'required| min:5|max:255',       
            'dep_id' => 'required|max:11',       
            'shift' => 'required|max:255',       
            'salary' => 'required|max:255',  
        ]);

        if($validate->fails()){
            $data=[
                "msg"=> "NOT VALID DATA!!",
                "status"=> 203,
                "data" => $validate->errors()
            ];
            return response()->json($data);
        }

        $id_emp=$request->old_id;

        $employee=Employee::findOrFail($id_emp);

        $employee->update([
            'id'=>$request->id,
            'emp_name'=>$request->emp_name,
            'department'=>$request->department,
            'dep_id'=>$request->dep_id,
            'shift'=>$request->shift,
            'salary'=>$request->salary,
        ]);
        $data=[
            "msg"=> "UPDATED successfully !",
            "status"=> 207,
            "data" => new EmployeeResource($employee)
        ];
        return response()->json($data);
    }

}
