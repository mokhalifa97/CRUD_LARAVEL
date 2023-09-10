@extends('layouts.app')
@section('content')
@include('includes.navbar')

<div class="container-fluid px-5">
    <div class="row">
        <div class="col-md-6 mt-5">
            <div class="card">
                <div class="card-header">
                Catgories <span class="badge badge-info">{{$cate->count()}}</span>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            @if ($cate->count()>0)
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">{{__('language.TITLE')}}</th>
                            <th scope="col">Description_en</th>
                            <th scope="col">Parent_id</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Operation</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($cate as $item)
                          <tr>
                            <td scope="row">{{$item->id}}</td>
                            <td scope="row">{{$item->title_en}}</td>
                            <td scope="row">{{$item->description_en}}</td>
                            <td scope="row">{{$item->parent_id}}</td>
                            <td scope="row">{{$item->created_at}}</td>
                            <td scope="row">
                              <a href="{{route('category.show',$item->id)}}" class="btn btn-success">
                                <i class="fa-solid fa-eye"></i>
                              </a>
                              <a href="{{route('category.delete',$item->id)}}" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                              </a>
                            </td>
                            
                          </tr>
                          @endforeach
                          @else 
                          <div class="alert alert-danger"> No Data yet...!</div>
                          @endif
                        </tbody>
                        
                      </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-5">
            <div class="card">
                <div class="card-header">
                Products <span class="badge badge-info">{{$pro->count()}}</span>
                </div>
                <div class="card-body">
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
                            @if ($pro->count()>0)
                            @foreach ($pro as $item)
                                    
                                
                            
                          <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td scope="row">{{$item->title_en}}</td>
                            <td scope="row">{{$item->description_en}}</td>
                            <td scope="row">{{$item->price}}</td>
                            <td scope="row">{{$item->quantity}}</td>
                            <td scope="row">{{$item->created_at}}</td>
                            <td scope="row">
                              <a href="{{route("products.show",$item->id)}}" class="btn btn-success">
                                <i class="fa-solid fa-eye"></i>
                              </a>
                              <a href="{{route("products.delete",$item->id)}}" class="btn btn-danger">
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
