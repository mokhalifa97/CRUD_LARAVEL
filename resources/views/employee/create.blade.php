@extends('layouts.app')
@section('content')
@include('includes.navbar')

<h2 class="text-center mt-5">Create New Employee</h2>
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <form enctype="multipart/form-data" method="POST" action="{{route('employee.save')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="text" class="form-control" name="id">
                </div>

                @error('id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="emp_name">
                </div>

                @error('emp_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Department</label>
                    <input type="text" class="form-control" name="department">
                </div>

                @error('department')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Dep_id</label>
                    <input type="text" class="form-control" name="dep_id">
                </div>

                @error('dep_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Shift</label>
                    <input type="text" class="form-control" name="shift">
                </div>

                @error('shift')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Salary</label>
                    <input type="text" class="form-control" name="salary">
                </div>

                @error('salary')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </form>
        </div>
    </div>
</div>

@endsection