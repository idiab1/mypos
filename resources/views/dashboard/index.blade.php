@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{__('Home page')}}
@endsection


{{-- Page name --}}
@section('page_name')
    {{__('Dashboard')}}
@endsection

{{-- Breadcrumb Item
@section('breadcrumb-item')
    <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Users</a></li>
@endsection --}}


@section('content')
    <div class="home-page">
        <h2>This is dashboard</h2>
    </div>
@endsection
