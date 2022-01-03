@extends('dashboard.layouts.app')

{{-- Styles --}}
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<style>
    .loading{
        display: none;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    .loading .loader{
        width: 100px;
        height: 100px;
        border: 5px solid #ddd;
        border-top-color: #007bff;
        border-radius: 50%;
        animation: spinner 2s linear infinite;
    }

    @-webkit-keyframes spinner{
        0%{
            transform: rotate(0deg);
        }
        100%{
            transform: rotate(360deg);
        }
    }
    @-moz-keyframes spinner{
        0%{
            transform: rotate(0deg);
        }
        100%{
            transform: rotate(360deg);
        }
    }
    @-o-keyframes spinner{
        0%{
            transform: rotate(0deg);
        }
        100%{
            transform: rotate(360deg);
        }
    }
    @keyframes spinner{
        0%{
            transform: rotate(0deg);
        }
        100%{
            transform: rotate(360deg);
        }
    }
</style>
@endsection

{{-- Title --}}
@section('title')
    {{trans('site.orders')}}
@endsection

{{-- Page name --}}

@section('page_name')
    {{trans('site.orders')}}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item active">{{trans('site.orders')}}</li>
@endsection

{{-- Content --}}
@section('content')
    <div class="orders-page">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('site.orders')}}
                            <span class="badge badge-secondary">{{$orders->count()}}</span>
                        </h3>
                    </div> <!-- ./card header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{trans('site.name_client')}}</th>
                                    <th>{{trans('site.price')}}</th>
                                    <th>{{trans('site.added')}}</th>
                                    <th>{{trans('site.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($orders->count() > 0)
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{$order->client->name}}</td>
                                            <td>{{$order->total_price}}</td>
                                            <td>{{$order->created_at->toFormattedDateString()}}</td>
                                            <td>
                                                <button class="btn btn-primary btn-order-product btn-sm"
                                                    data-url="{{route("order.products", ["order" => $order->id])}}"
                                                    data-method="get"
                                                >
                                                    <i class="fas fa-list"></i>
                                                    {{trans('site.show')}}
                                                </button>
                                                <a class="btn btn-success btn-edit btn-sm mr-2 ml-2" href="{{route('clients.orders.edit', ['id' => $order->client->id, 'order' => $order->id])}}">
                                                    <i class="fas fa-edit"></i>
                                                    {{trans('site.edit')}}
                                                </a>
                                                <form class="d-inline-block" action="{{route('order.destroy', ['id' => $order->id])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-delete btn-sm" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                        {{trans('site.delete')}}
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{trans('site.name_client')}}</th>
                                    <th>{{trans('site.price')}}</th>
                                    <th>{{trans('site.added')}}</th>
                                    <th>{{trans('site.action')}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> <!-- ./card body -->
                </div> <!-- ./card -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('site.show_orders')}}</h3>
                    </div> <!-- ./card header -->
                    <div class="card-body">
                        <div class="loading text-center">
                            <div class="loader"></div>
                            <p class="p-2">{{trans('site.waiting')}}</p>
                        </div>
                        <div class="product-order-list">

                        </div> <!-- /.end of product order list-->


                    </div> <!-- ./card body -->
                </div>

            </div>
        </div>

@endsection

@section('scripts')
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset("dashboard/js/custom/order.js")}}"></script>

<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

@endsection
