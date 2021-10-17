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
    {{trans('site.clients')}}
@endsection

{{-- Page name --}}

@section('page_name')
    {{trans('site.clients')}}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item active">{{trans('site.clients')}}</li>
@endsection

{{-- Content --}}
@section('content')
    <div class="clients-page">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="card-title">{{trans('site.all_list_clients')}}</h3>
                    </div>
                    <div class="col-sm-4 float-sm-right">
                        <a class="btn btn-primary btn-add-new" href="{{route('client.create')}}">
                            <i class="fas fa-plus"></i> {{trans('site.add_new_client')}}
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
                            <th>{{trans('site.phone')}}</th>
                            <th>{{trans('site.address')}}</th>
                            <th>{{trans('site.add_order')}}</th>
                            <th>{{trans('site.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $id = 1;
                        @endphp
                        @if ($clients->count() > 0)
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$client->name}}</td>
                                    <td>{{implode(array_filter($client->phone), '-')}}</td>
                                    <td>{{$client->address}}</td>
                                    <td><a class="btn btn-primary btn-sm btn-add-order" href="{{route('clients.orders.create', ['id' => $client->id])}}">{{trans('site.add_order')}}</a></td>
                                    <td>
                                        <a class="btn btn-success btn-edit btn-sm" href="{{route('client.edit', ['id' => $client->id])}}">
                                            <i class="fas fa-edit"></i>
                                            {{trans('site.edit')}}
                                        </a>
                                        <form action="{{route('client.destroy', ['id' => $client->id])}}" method="POST">
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
                            <th>{{trans('site.phone')}}</th>
                            <th>{{trans('site.address')}}</th>
                            <th>{{trans('site.add_order')}}</th>
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
