@extends('layouts.app')
@section('content')
@include('includes.navbar')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 m-auto">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">Image</th>
                        <th scope="col">Id</th>
                        <th scope="col">{{__('language.TITLE')}}</th>
                        <th scope="col">Description_en</th>
                        <th scope="col">Parent_id</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Operation</th>
                      </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">
                      <img src="{{asset('categories/images/'.$categories->cate_image)}}"  style="width:70px; heghit:70px;">
                    </td>
                    <td scope="row">{{$categories->id}}</td>
                    <td scope="row">{{$categories->title_en}}</td>
                    <td scope="row">{{$categories->description_en}}</td>
                    <td scope="row">{{$categories->parent_id}}</td>
                    <td scope="row">{{$categories->created_at}}</td>
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