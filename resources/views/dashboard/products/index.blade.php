@extends('dashboard.layouts.app')

{{-- Styles --}}
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection

{{-- Title --}}
@section('title')
    {{trans('site.products')}}
@endsection

{{-- Page name --}}

@section('page_name')
    {{trans('site.products')}}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item active">{{trans('site.products')}}</li>
@endsection

{{-- Content --}}
@section('content')
    <section class="products-page section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="card-title">{{trans('site.all_list_products')}}</h3>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary btn-crayons btn-add-new float-right" href="{{route('product.create')}}">
                            <i class="fas fa-plus"></i> {{trans('site.add_new_product')}}
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('site.name')}}</th>
                            {{-- <th>{{trans('site.category')}}</th> --}}
                            {{-- <th>{{trans('site.description')}}</th> --}}
                            <th>{{trans('site.image')}}</th>
                            {{-- <th>{{trans('site.purchase_price')}}</th> --}}
                            <th>{{trans('site.sale_price')}}</th>
                            <th>{{trans('site.profit_percent')}}</th>
                            <th>{{trans('site.stock')}}</th>
                            <th>{{trans('site.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id = 1;
                        @endphp
                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$product->name}}</td>
                                    {{-- <td>{{$product->category->name}}</td> --}}
                                    {{-- <td>{{$product->description}}</td> --}}
                                    <td><img class="img-thumbnail" src="{{$product->image_path}}" style="width: 60px; height:60px" alt="" /></td>
                                    {{-- <td>{{$product->purchase_price}}</td> --}}
                                    <td>{{$product->sale_price}}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                            style="width: {{$product->profit_percent}}%"
                                            aria-valuenow="{{$product->profit_percent}}"
                                            aria-valuemin="0" aria-valuemax="100">
                                                {{$product->profit_percent}} %
                                            </div>
                                        </div>
                                        {{-- <progress id="file" max="100" value="{{$product->profit_percent}}"> {{$product->profit_percent}}% </progress> --}}
                                    </td>
                                    <td>{{$product->stock}}</td>
                                    <td>
                                        <a class="btn btn-success d-inline-block btn-edit btn-sm" href="{{route('product.edit', ['id' => $product->id])}}">
                                            <i class="fas fa-edit"></i>
                                            {{trans('site.edit')}}
                                        </a>
                                        <form class="d-inline-block" action="{{route('product.destroy', ['id' => $product->id])}}" method="POST">
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
                            <th>#</th>
                            <th>{{trans('site.name')}}</th>
                            {{-- <th>{{trans('site.category')}}</th> --}}
                            {{-- <th>{{trans('site.description')}}</th>
                            <th>{{trans('site.image')}}</th> --}}
                            <th>{{trans('site.purchase_price')}}</th>
                            <th>{{trans('site.sale_price')}}</th>
                            <th>{{trans('site.profit_percent')}}</th>
                            <th>{{trans('site.stock')}}</th>
                            <th>{{trans('site.action')}}</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
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

<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["csv", "excel", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>
@endsection
