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
    <div class="clients-form-page">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-categories card-outline card-primary">
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
            </div>


            <div class="col-md-6">
                <div class="card card-orders card-outline card-primary">
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
                            <button class="btn btn-primary disabled btn-add-order" type="submit">Add Order</button>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Other scripts --}}
@section('scripts')
    <script src="{{asset("dashboard/js\custom/order.js")}}"></script>
@endsection

