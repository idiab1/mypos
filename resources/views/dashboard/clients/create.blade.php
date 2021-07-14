@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{__('Add New Client')}}
@endsection

{{-- Page name --}}
@section('page_name')
    {{__('Add New Client')}}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item "><a href="{{route('clients.index')}}">Clients</a></li>
    <li class="breadcrumb-item active">Add New Client</li>
@endsection

{{-- Content --}}
@section('content')
    <div class="clients-form-page">
        <div class="row">
            <div class="col-md-9 m-auto">
                <!-- general form elements -->
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Add New Client</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('client.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Type name of client" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input class="form-control" type="number" id="phone" name="phone[]" placeholder="Type of your number phone" required>
                            </div>
                            <div class="form-group">
                                <label for="other_phone">Other Phone</label>
                                <input class="form-control" type="number" id="other_phone" name="phone[]" placeholder="Type of your other number phone">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input class="form-control address" type="text" name="address" id="address" placeholder="Type of your address" required>
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
