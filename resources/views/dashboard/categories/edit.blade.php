@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{__('Edit')}} {{$category->name."'s" }}
@endsection

{{-- Page name --}}
@section('page_name')
    {{__('Edit')}} {{$category->name."'s" }}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item "><a href="{{route('categories.index')}}">Categories</a></li>
    <li class="breadcrumb-item active">Edit {{$category->name."'s" }}</li>
@endsection

{{-- Content --}}
@section('content')
    <div class="categories-form-page">
        <div class="row">
            <div class="col-md-9 m-auto">
                <!-- general form elements -->
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Edit {{$category->name."'s" }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('category.update', ['id' => $category->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" id="name" name="name" value="{{$category->name}}" placeholder="Type name of category">
                            </div>
                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
