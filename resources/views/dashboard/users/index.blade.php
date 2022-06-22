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
    {{__('Users')}}
@endsection

{{-- Page name --}}

@section('page_name')
    {{__('Users')}}
@endsection

{{-- Breadcrumb Item --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item active">Users</li>
@endsection


{{-- Content --}}
@section('content')
    <div class="users-page">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="card-title">List of All Users</h3>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary btn-crayons btn-add-new float-right" href="{{route('user.create')}}">
                            <i class="fas fa-plus"></i> Add New User
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a class="btn btn-success d-inline-block btn-sm btn-edit" href="{{route('user.edit', ['id' => $user->id])}}">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <form class="d-inline-block" action="{{route('user.destroy', ['id' => $user->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btn-delete" type="submit">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
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
            "buttons": ["csv", "excel"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>
@endsection
