@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{__('Edit')}} {{$user->first_name."'s" }}
@endsection

{{-- Page name --}}
@section('page_name')
    {{__('Edit')}} {{$user->first_name."'s" }}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item "><a href="{{route('users.index')}}">Users</a></li>
    <li class="breadcrumb-item active">Edit {{$user->first_name."'s" }}</li>
@endsection

{{-- Content --}}
@section('content')
    <div class="users-form-page">
        <div class="row">
            <div class="col-md-9 m-auto">
                <!-- general form elements -->
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Edit {{$user->first_name."'s" }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('user.update', ['id' => $user->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input class="form-control" type="text" id="firstName" name="first_name" value="{{$user->first_name}}" placeholder="Enter first name">
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input class="form-control" type="text" id="lastName" name="last_name" value="{{$user->last_name}}" placeholder="Enter last name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input class="form-control" type="email" id="email" name="email" value="{{$user->email}}" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
