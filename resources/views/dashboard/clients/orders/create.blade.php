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
    <section class="clients-form-page section">
        <div class="row">
            <div class="col-md-6">
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
            </div>

            <div class="col-md-6">
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
                            <button class="btn btn-primary disabled btn-crayons btn-add-order" type="submit">Add Order</button>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- Previous Order -->
                {{-- <div class="card card-previous-orders card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('site.previous_orders')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Collapsible Group Item #1
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Collapsible Group Item #2
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Collapsible Group Item #3
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}



            </div>
        </div>
    </section>
@endsection

{{-- Other scripts --}}
@section('scripts')
    <script src="{{asset("dashboard/js\custom/order.js")}}"></script>
@endsection

