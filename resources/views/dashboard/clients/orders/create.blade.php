@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{trans('site.add_order')}}
@endsection

{{-- Page name --}}
@section('page_name')
    {{trans('site.add_order')}}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item "><a href="{{route('clients.index')}}">{{trans('site.clients')}}</a></li>
    <li class="breadcrumb-item active">{{trans('site.add_order')}}</li>
@endsection

{{-- Content --}}
@section('content')
    <section class="clients-form-page client-orders section">
        <div class="row">
            <div class="col-6 col-md-7">
                <!-- Product Container -->
                <div class="products-container">
                    <!-- Products head -->
                    <div class="products-head">

                    </div>
                    <!-- ./ Products head -->
                    <div class="row">
                        @if ($products->count() > 0)
                            @foreach ($products as $product)

                                <div class="col-md-6">
                                    <!-- Card Product -->
                                    <div class="card card-product">
                                        <!-- Card header -->
                                        <div class="card-header p-0">
                                            <img class="img-fluid" src="{{$product->image_path}}" alt="">
                                        </div>
                                        <!-- ./ Card Header -->
                                        <!-- Card body -->
                                        <div class="card-body text-center px-2 pt-3 pb-0">
                                            <!-- Product info -->
                                            <div class="product-info">
                                                <h4>{{$product->name}}</h4>
                                                <span>{{$product->sale_price}} {{ trans('site.currency') }}</span>
                                            </div>
                                        </div>
                                        <!-- ./ Card body -->

                                        <!-- Card footer -->
                                        <div class="card-footer text-center">
                                            <a class="btn btn-sm btn-primary btn-crayons btn-product-add product-{{$product->id}}" href="#"
                                                id="product-{{$product->id}}" data-id="{{$product->id}}"
                                                data-name="{{$product->name}}" data-price="{{$product->sale_price}}" >
                                                    <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <!-- ./ Card footer -->
                                    </div>
                                    <!-- ./ Card Product -->
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- ./ Product Container -->

            </div>
            {{-- <div class="col-6 col-md-4">
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-12">
                            <!-- Card -->
                            <div class="card">
                                <!-- Card Hedaer -->
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{trans('site.orders')}}
                                    </h3>
                                </div>
                                <!-- ./ Card Hedaer -->

                                <form action="{{route("clients.orders.store", ['id' => $client->id])}}" method="POST">
                                    @csrf
                                    @method("POST")
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody class="order-list">

                                            </tbody>
                                        </table>

                                        <!-- Card footer -->
                                        <div class="card-footer">
                                            <!-- Total Price -->
                                            <div class="total-price">
                                                <p class="d-inline-block font-weight-bold">Total Price</p> &colon; <span class="total">00</span>
                                            </div>
                                            <button class="btn btn-primary disabled btn-crayons btn-add-order"
                                                type="submit">
                                                Add Order
                                            </button>
                                        </div>
                                        <!-- ./ Card footer -->

                                    </div>
                                    <!-- ./ card Body -->
                                </form>
                            </div>
                            <!-- ./ Card -->
                        </div>
                    </div>
                </div>

                <!-- ./ Orders -->
            </div> --}}
            <div class="col-6 col-md-5">
                <div class="card card-orders">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('site.orders')}}</h3>
                    </div>
                    <form action="{{route("clients.orders.store", ['id' => $client->id])}}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="card-body p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody class="order-list">

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <!-- Card footer -->
                        <div class="card-footer">
                            <!-- Total Price -->
                            <div class="total-price">
                                <p class="d-inline-block font-weight-bold">Total Price</p> &colon; <span class="total">00</span>
                            </div>
                            <button class="btn btn-crayons btn-add-order disabled"
                                type="submit">
                                Add Order
                            </button>
                        </div>
                        <!-- ./ Card footer -->
                    </form>
                </div>

            </div>
        </div>
        <div class="row">
            {{-- <div class="col-md-6">
                <div class="card card-categories">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('site.categories')}}</h3>
                    </div>

                    <div class="card-body p-0">

                        @if ($categories->count() > 0)
                            @foreach ($categories as $category)


                                <table class="table table-hover">
                                    <tbody>
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td class="bg-primary">
                                                <h5>{{$category->name}}</h5>
                                            </td>
                                            <td class="bg-primary text-right">
                                                <span class="badge badge-warning">
                                                    {{$category->products->count()}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="expandable-body">
                                            <td>
                                                @if ($category->products->count() > 0)
                                                        <div class="p-0">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Price</th>
                                                                        <th>Stored</th>
                                                                        <th>Add</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($category->products as $product)
                                                                        <tr>
                                                                            <td>{{$product->name}}</td>
                                                                            <td>{{$product->sale_price}}</td>
                                                                            <td>{{$product->stock}}</td>
                                                                            <td>
                                                                                <a class="btn btn-sm btn-primary btn-product-add product-{{$product->id}}" href="#"
                                                                                id="product-{{$product->id}}" data-id="{{$product->id}}"
                                                                                data-name="{{$product->name}}" data-price="{{$product->sale_price}}" >
                                                                                    <i class="fas fa-plus"></i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                @else
                                                    <p>not categories exist yet</p>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            @endforeach
                        @else
                            <p>not categories exist yet</p>
                        @endif



                    </div>

                </div>
            </div> --}}

            {{-- <div class="col-md-6">
                <div class="card card-orders">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('site.orders')}}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route("clients.orders.store", ['id' => $client->id])}}" method="POST">
                            @csrf
                            @method("POST")
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody class="order-list">

                                </tbody>
                            </table>
                            <div class="total-price">
                                <p class="d-inline-block font-weight-bold">Total Price</p> &colon; <span class="total">00</span>
                            </div>
                            <button class="btn btn-primary disabled btn-crayons btn-add-order"
                                type="submit">
                                Add Order
                            </button>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div> --}}
        </div>
    </section>
@endsection

{{-- Other scripts --}}
@section('scripts')
    <script src="{{asset("dashboard/js\custom/order.js")}}"></script>
@endsection

