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
                            <th scope="col">title_en</th>
                            <th scope="col">description_en</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">created_at</th>
                            <th scope="col">Operation</th>
                      </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">{{$product->id}}</td>
                    <td scope="row">{{$product->title_en}}</td>
                    <td scope="row">{{$product->description_en}}</td>
                    <td scope="row">{{$product->price}}</td>
                    <td scope="row">{{$product->quantity}}</td>
                    <td scope="row">{{$product->created_at}}</td>
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