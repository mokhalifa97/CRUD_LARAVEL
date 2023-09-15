
@extends('layouts.app')

@section('content')
@include('includes.navbar')

<div class="col-md-8 m-auto">
    <div class="card mt-5">
      @if (session('success'))
          <div class="alert alert-primary" >{{session('success')}}</div>
      @endif
        <div class="card-header d-flex justify-content-between align-item-center">
          <h5>{{__('language.PRODUCT')}} <span class="badge badge-info">{{$pro->count()}}</span></h5>
          <a href="{{route('products.create')}}" class="btn btn-success">Create New Product</a>
        </div>
        <div class="card-body">
          @if (session('pro'))
          <div class="alert alert-primary" >{{session('pro')}}</div>
      @endif
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">{{__('language.TITLE')}}</th>
                    <th scope="col">{{__("language.DESCRIPTION")}}</th>
                    <th scope="col">{{__("language.PRICE")}}</th>
                    <th scope="col">{{__("language.QUANTITY")}}</th>
                    <th scope="col">{{__("language.CREATED")}}</th>
                    <th scope="col">{{__("language.OPERATION")}}</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($pro->count()>0)
                    @foreach ($pro as $item)
                            
                        
                    
                  <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td scope="row">{{$item->title_en}}</td>
                    <td scope="row">{{$item->description_en}}</td>
                    <td scope="row">{{$item->price}}</td>
                    <td scope="row">{{$item->quantity}}</td>
                    <td scope="row">{{$item->created_at}}</td>
                    <td scope="row" class="d-flex">
                      <a href="{{route("products.show",$item->id)}}" class="btn btn-success ml-1">
                        <i class="fa-solid fa-eye"></i>
                      </a>
                      <a href="{{route('products.edit',$item->id)}}" class="btn btn-primary ml-1">
                        <i class="fa-solid fa-pencil"></i>
                      </a>
                      <a href="{{route("products.delete",$item->id)}}" class="btn btn-danger ml-1">
                        <i class="fa-solid fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <div class="alert alert-danger">No data Yet...!</div>
                  @endif
                </tbody>
              </table>
        </div>
    </div>
</div>
</div>
</div>

@endsection


