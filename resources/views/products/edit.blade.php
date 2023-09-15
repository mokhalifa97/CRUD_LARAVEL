@extends('layouts.app')
@section('content')
@include('includes.navbar')


<h1 class="text-center mt-5">Edit And Save product</h1>
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <form enctype="multipart/form-data" method="POST" action="{{route('products.update')}}" >
                @csrf

                <input type="hidden" name="old_id" value="{{$products->id}}">

                <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="text" class="form-control" name="id" value="{{$products->id}}">
                </div>

                @error('id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="form-group">
                    <label for="exampleInputEmail1">Title_en</label>
                    <input type="text" class="form-control" name="title_en" value="{{$products->title_en}}">
                </div>

                
                @error('title_en')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Title_ar</label>
                    <input type="text" class="form-control" name="title_ar" value="{{$products->title_ar}}">
                </div>

                @error('title_ar')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Descripton_en</label>
                    <input type="text" class="form-control" name="description_en" value="{{$products->description_en}}">
                </div>
                @error('description_en')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Descripton_ar</label>
                    <input type="text" class="form-control" name="description_ar" value="{{$products->description_ar}}">
                </div>
                @error('description_ar')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" class="form-control" name="price" value="{{$products->price}}">
                </div>
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="text" class="form-control" name="quantity" value="{{$products->quantity}}">
                </div>
                @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

        


                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
