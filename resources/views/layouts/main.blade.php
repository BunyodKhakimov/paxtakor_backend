<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Starter</title>

        @yield('links')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            @include('layouts.partials._navbar')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('layouts.partials._main_sidebar')
            <!-- /.main-sidebar-container -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            @include('layouts.partials._sidebar')
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            @include('layouts.partials._footer')
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        @yield('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
