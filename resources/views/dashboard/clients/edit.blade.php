@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{trans('site.edit')}} {{$client->name."'s" }}
@endsection

{{-- Page name --}}
@section('page_name')
    {{trans('site.edit')}} {{$client->name."'s" }}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item "><a href="{{route('clients.index')}}">{{trans('site.clients')}}</a></li>
    <li class="breadcrumb-item active">{{trans('site.edit')}} {{$client->name."'s" }}</li>
@endsection

{{-- Content --}}
@section('content')
    <section class="clients-form-page section">
        <div class="row">
            <div class="col-md-9 m-auto">
                <!-- general form elements -->
                <div class="card card-form">

                    <div class="card-header">
                        <h3 class="card-title">{{trans('site.edit')}} {{$client->name."'s" }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('client.update', ['id' => $client->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{trans('site.name')}}</label>
                                <input class="form-control" type="text" id="name" name="name" value="{{$client->name}}" placeholder="{{trans('site.type_name')}}">
                            </div>
                            <div class="form-group">
                                <label for="phone">{{trans('site.phone')}}</label>
                                <input class="form-control" type="number" id="phone" name="phone[]" value="{{$client->phone[0]}}" placeholder="{{trans('site.type_phone')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="other_phone">{{trans('site.other_phone')}}</label>
                                <input class="form-control" type="number" id="other_phone" name="phone[]" value="{{$client->phone[1]}}" placeholder="{{trans('site.type_other_phone')}}">
                            </div>
                            <div class="form-group">
                                <label for="address">{{trans('site.address')}}</label>
                                <input class="form-control address" type="text" name="address" id="address" value="{{$client->address}}" placeholder="{{trans('site.type_address')}}" required>
                            </div>
                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{trans('site.edit')}}</button>
                    </div>
                </form>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
