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
    {{trans('site.categories')}}
@endsection

{{-- Page name --}}

@section('page_name')
    {{trans('site.categories')}}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item active">{{trans('site.categories')}}</li>
@endsection

{{-- Content --}}
@section('content')
    <div class="Categories-page">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="card-title">{{trans('site.all_list_categories')}}</h3>
                    </div>
                    <div class="col-sm-4 float-sm-right">
                        <a class="btn btn-primary btn-add-new" href="{{route('category.create')}}">
                            <i class="fas fa-plus"></i> {{trans('site.add_new_category')}}
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('site.name')}}</th>
                            <th>{{trans('site.product_count')}}</th>
                            <th>{{trans('site.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id = 1;
                        @endphp
                        @if ($categories->count() > 0)
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->products->count()}}</td>
                                    <td>
                                        <a class="btn btn-success btn-edit btn-sm" href="{{route('category.edit', ['id' => $category->id])}}">
                                            <i class="fas fa-edit"></i>
                                            {{trans('site.edit')}}
                                        </a>
                                        <form action="{{route('category.destroy', ['id' => $category->id])}}" method="POST">
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
                            <th>{{trans('site.product_count')}}</th>
                            <th>{{trans('site.action')}}</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
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

<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>
@endsection
