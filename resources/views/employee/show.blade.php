@extends('layouts.app')
@section('content')
@include('includes.navbar')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 m-auto">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Dep_id</th>
                        <th scope="col">Shift</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Operation</th>
                      </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$emp->id}}</td>
                    <td>{{$emp->emp_name}}</td>
                    <td>{{$emp->department}}</td>
                    <td>{{$emp->dep_id}}</td>
                    <td>{{$emp->shift}}</td>
                    <td>{{$emp->salary}}</td>
                    <td>{{$emp->created_at}}</td>
                    <td>
                      <a class="btn btn-success" href="{{route('home')}}">
                        <i class="fa-solid fa-house"></i>
                      </a>
                    </td>
                    
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>


@endsection