@extends('layouts.app')
@section('content')
@include('includes.navbar')

<div class="container-fluid px-5">
    <div class="row">
        <div class="col-md-6 mt-5">
            <div class="card">

          <div class="table-responsive">

                <div class="card-header d-flex justify-content-between align-item-center">
                  <h5>
                    {{__('language.CATEGORY')}} <span class="badge badge-info">{{$cate->count()}}</span>
                  </h5>
                  <a href="{{route('categories.create')}}" class="btn btn-success">Crete New Category</a>
                </div>
                <div class="card-body">
                  @if (session('cate'))
                  <div class="alert alert-primary" >{{session('cate')}}</div>
              @endif

                    <table class="table">
                        <thead class="thead-dark">
                            @if ($cate->count()>0)
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">ID</th>
                            <th scope="col">{{__('language.TITLE')}}</th>
                            <th scope="col">{{__("language.DESCRIPTION")}}</th>
                            <th scope="col">{{__("language.PARENT")}}</th>
                            <th scope="col">{{__("language.CREATED")}}</th>
                            <th scope="col">{{__("language.OPERATION")}}</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($cate as $item)
                          <tr>
                            <td scope="row">
                              <img src="{{asset('categories/images/'.$item->cate_image)}}"  style="width:70px; heghit:70px;">
                            </td>
                            <td scope="row">{{$item->id}}</td>
                            <td scope="row">{{$item->title_en}}</td>
                            <td scope="row">{{$item->description_en}}</td>
                            <td scope="row">{{$item->parent_id}}</td>
                            <td scope="row">{{$item->created_at}}</td>
                            <td scope="row" class="d-flex">
                              <a href="{{route('category.show',$item->id)}}" class="btn btn-success ml-1">
                                <i class="fa-solid fa-eye"></i>
                              </a>
                              <a href="{{route('categories.edit',$item->id)}}" class="btn btn-primary ml-1">
                                <i class="fa-solid fa-pencil"></i>
                              </a>
                              <a href="{{route('category.delete',$item->id)}}" class="btn btn-danger ml-1">
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
        </div>

        <div class="col-md-6 mt-5">
            <div class="card">
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
                          @if ($pro->count()>0)
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

  <div class="container-fluid px-5">
    <div class="row">
      <div class="col-md-6 mt-5">
        <div class="card">
          <div class="card-header">
            <h5>Employees <span class="badge badge-info">{{$emp->count()}}</span></h5>

          </div>
          <div class="card-body">
            <table class="table">
              <thead class="thead-dark">
                @if ($emp->count()>0)
                    
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">emp_name</th>
                  <th scope="col">department</th>
                  <th scope="col">dep_id</th>
                  <th scope="col">shift</th>
                  <th scope="col">salary</th>
                  <th scope="col">created_at</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($emp as $item)
                    
                <tr>
                  <th scope="row">1</th>
                  <td></td>
                  <td>Otto</td>
                  <td>@mdo</td>
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
