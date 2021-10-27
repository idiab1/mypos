@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{__('Home page')}}
@endsection


{{-- Page name --}}
@section('page_name')
    {{__('Dashboard')}}
@endsection


@section('content')
    <div class="home-page">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>{{$users}}</h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <a href="{{route("users.index")}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{$clients}}</h3>
                        <p>Clients</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{route("clients.index")}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$orders}}</h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="{{route("orders.index")}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$categories}}</h3>
                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <a href="{{route("categories.index")}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{$products}}</h3>
                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clone"></i>
                    </div>
                    <a href="{{route("products.index")}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

