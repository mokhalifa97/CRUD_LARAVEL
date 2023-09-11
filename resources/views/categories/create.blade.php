@extends('layouts.app')
@section('content')
@include('includes.navbar')


<h1 class="text-center mt-5">Create New Category</h1>
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <form enctype="multipart/form-data" method="POST" action="{{route('categories.save')}}" >
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
                    <label for="exampleInputEmail1">Descripton_en</label>
                    <input type="text" class="form-control" name="description_en">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Descripton_ar</label>
                    <input type="text" class="form-control" name="description_ar">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Parent_id</label>
                    <select name="parent_id" class="form-control">
                        <option value="0">Main Category</option>
                        @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->id}}-{{$item->title_en}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
