@extends('layouts.app')
@section('content')
@include('includes.navbar')


<h1 class="text-center mt-5">Edit And Save product</h1>
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <form enctype="multipart/form-data" method="POST" action="{{route('employee.update')}}" >
                @csrf

                <input type="hidden" name="old_id" value="{{$emp->id}}">

                <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="text" class="form-control" name="id" value="{{$emp->id}}">
                </div>

                @error('id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="emp_name" value="{{$emp->emp_name}}">
                </div>

                
                @error('emp_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">department</label>
                    <input type="text" class="form-control" name="department" value="{{$emp->department}}">
                </div>

                @error('department')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">dep_id</label>
                    <input type="text" class="form-control" name="dep_id" value="{{$emp->dep_id}}">
                </div>
                @error('dep_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">shift</label>
                    <input type="text" class="form-control" name="shift" value="{{$emp->shift}}">
                </div>
                @error('shift')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">salary</label>
                    <input type="text" class="form-control" name="salary" value="{{$emp->salary}}">
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
