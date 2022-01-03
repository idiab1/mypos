@extends('dashboard.layouts.app')

{{-- Title --}}
@section('title')
    {{trans('site.edit_order')}}
@endsection

{{-- Page name --}}
@section('page_name')
    {{trans('site.edit_order')}}
@endsection



{{-- {{$categories}} --}}



{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item "><a href="{{route('clients.index')}}">{{trans('site.clients')}}</a></li>
    <li class="breadcrumb-item active">{{trans('site.edit_order')}}</li>
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

                        {{-- @foreach ($categories as $category)

                        @endforeach --}}

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
                                                                                <a class="btn {{ in_array($product->id, $order->products->pluck('id')->toArray()) ? 'btn-default disabled' : 'btn-primary btn-product-add' }}
                                                                                product-{{$product->id}} btn-sm" href="#"
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
                        <form action="{{route("clients.orders.update", ['id' => $client->id, 'order' => $order->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody class="order-list">
                                    @foreach ($order->products as $product)

                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                                <input class="form-control product-quantity" type="number"
                                                name="products[{{ $product->id }}][quantity]" data-price="{{ $product->sale_price }}" value="{{$product->pivot->quantity}}" min="1">
                                            </td>
                                            <td class="product-price">
                                                {{$product->sale_price * $product->pivot->quantity }}
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm btn-product-remove" href="#" data-id="{{$product->id}}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            <div class="total-price">
                                <p class="d-inline-block font-weight-bold">
                                    Total Price</p> &colon; <span class="total">{{$order->total_price}}</span>
                            </div>
                            <button class="btn btn-primary btn-edit-order" type="submit">{{trans('site.edit_order')}}</button>

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
    <script src="{{asset("dashboard/js/custom/order.js")}}"></script>

    <script>
        // Calculate price for product
        let productsQty = document.querySelectorAll(".product-quantity")
        productsQty.forEach(productQty => {

            productQty.addEventListener("change", () => {

                let price = productQty.value * productQty.getAttribute("data-price")

                let productPrice = productQty.parentElement.nextElementSibling;

                productPrice.textContent = price

                totalPrice()
            })
        })

        // Calculate total price for orders list
        function totalPrice(){

            let price = 0;

            // Select on all products
            let productsPrice = document.querySelectorAll(".order-list .product-price");

            productsPrice.forEach(productPrice => {
                // change data type for productPrice
                price += Number(productPrice.textContent)
            })

            // Select on total price element
            let totalPrice = document.querySelector(".total-price .total");

            totalPrice.textContent = price

            if(price > 0){
                document.querySelector(".btn-add-order").classList.remove("disabled")
            }else{
                document.querySelector(".btn-add-order").classList.add("disabled")
        }
        }

    </script>

@endsection


