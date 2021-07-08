<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Unknown page') | POS</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dashboard/css/adminlte.min.css')}}">

        {{-- Styles --}}
        @yield('styles')
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            {{-- Navbar --}}
            @include('dashboard.layouts.navbar')

            {{-- Aside --}}
            @include('dashboard.layouts.aside')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h1 class="page-heading">@yield('page_name')</h1>
                            </div>
                                {{-- @include('dashboard.layouts.breadcrumb') --}}
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                                    {{-- Other Breadcrumb items --}}
                                    @yield('breadcrumb-item')
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Container -->
                    <div class="container-fluid">

                        {{-- Content --}}
                        @yield('content')

                    </div> <!-- End of container-fluid  -->

                </section>
                <!-- /.content -->

                <!-- Footer -->
                @include('dashboard.layouts.footer')

            </div>
            <!-- /.content-wrapper -->



            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
            <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('dashboard/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('dashboard/js/demo.js')}}"></script>

        {{-- Scripts --}}
        @yield('scripts')
    </body>
</html>
