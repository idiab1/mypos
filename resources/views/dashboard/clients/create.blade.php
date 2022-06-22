@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{trans('site.add_new_client')}}
@endsection

{{-- Page name --}}
@section('page_name')
    {{trans('site.add_new_client')}}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item "><a href="{{route('clients.index')}}">{{trans('site.clients')}}</a></li>
    <li class="breadcrumb-item active">{{trans('site.add_new_client')}}</li>
@endsection

{{-- Content --}}
@section('content')
    <section class="clients-form-page section">
        <div class="row">
            <div class="col-md-9 m-auto">
                <!-- general form elements -->
                <div class="card card-form">

                    <div class="card-header">
                        <h3 class="card-title">{{trans('site.add_new_client')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('client.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{trans('site.name')}}</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="{{trans('site.type_name')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">{{trans('site.phone')}}</label>
                                <input class="form-control" type="number" id="phone" name="phone[]" placeholder="{{trans('site.type_phone')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="other_phone">{{trans('site.other_phone')}}</label>
                                <input class="form-control" type="number" id="other_phone" name="phone[]" placeholder="{{trans('site.type_other_phone')}}">
                            </div>
                            <div class="form-group">
                                <label for="address">{{trans('site.address')}}</label>
                                <input class="form-control address" type="text" name="address" id="address" placeholder="{{trans('site.type_address')}}" required>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> {{trans('site.add')}}</button>
                        </div>
                    </form>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
