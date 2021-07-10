@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{__('Create New User')}}
@endsection

{{-- Page name --}}
@section('page_name')
    {{__('Create New User')}}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item "><a href="{{route('users.index')}}">Users</a></li>
    <li class="breadcrumb-item active">Create New User</li>
@endsection

{{-- Content --}}
@section('content')
    <div class="users-form-page">
        <div class="row">
            <div class="col-md-9 m-auto">
                <!-- general form elements -->
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Create New User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input class="form-control" type="text" id="firstName" name="first_name" placeholder="Enter first name">
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input class="form-control" type="text" id="lastName" name="last_name" placeholder="Enter last name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Enter email">
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
