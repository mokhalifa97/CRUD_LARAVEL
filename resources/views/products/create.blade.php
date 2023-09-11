@extends('layouts.app')
@section('content')
@include('includes.navbar')

<h2 class="text-center mt-5">Create New Product</h2>
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <form enctype="multipart/form-data" method="POST" action="{{route('products.save')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input type="text" class="form-control" name="id">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Title_en</label>
                    <input type="text" class="form-control" name="title_en">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Title_ar</label>
                    <input type="text" class="form-control" name="title_ar">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Description_en</label>
                    <input type="text" class="form-control" name="description_en">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Description_ar</label>
                    <input type="text" class="form-control" name="description_ar">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" class="form-control" name="price">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="text" class="form-control" name="quantity">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </form>
        </div>
    </div>
</div>

@endsection