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
                                <input class="form-control" type="text" id="firstName" name="first_name" placeholder="Enter first name" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input class="form-control" type="text" id="lastName" name="last_name" placeholder="Enter last name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="supervisors">Privileges</label>

                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    @php
                                        $models = ['users', 'clients', 'categories', 'products', 'orders'];
                                        $maps = ['create', 'read', 'update', 'delete']
                                    @endphp

                                    @foreach ($models as $index => $model)
                                        <li class="nav-item">
                                            <a class="nav-link {{$index == 0 ? "active" : ""}}"
                                            id="pills-{{$model}}-tab" data-toggle="pill" href="#pills-{{$model}}" role="tab" aria-controls="pills-{{$model}}">{{ trans('site.' . $model) }}</a>
                                        </li>

                                    @endforeach

                                </ul>
                                <div class="tab-content" id="pills-tabContent">

                                    @foreach ($models as $index => $model)

                                        <div class="tab-pane fade show {{$index == 0 ? "active" : ""}}" id="pills-{{$model}}" role="tabpanel" aria-labelledby="pills-{{$model}}-tab">

                                            @foreach ($maps as $map)
                                                <label><input type="checkbox" name="permissions[]" value="{{$map . '-' . $model}}">{{ trans('site.' . $map) }}</label>
                                            @endforeach

                                        </div>
                                    @endforeach
                                </div>

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
