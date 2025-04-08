<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    {{-- Если используете CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">

    {{-- Если используете Vite/Mix, подключите свои файлы --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{-- или --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <!-- Ваши ссылки в navbar -->
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="{{ asset('images/logo.svg') }}" alt="Site Logo">
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('program_categories.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Program Categories</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('programs.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Programs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('days.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Days</p>
                        </a>
                    </li>
                    <!-- Добавляйте ссылки для других ресурсов -->
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <h1>@yield('title')</h1>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>&copy; {{ date('Y') }} <a href="#">Your Company</a>.</strong>
        All rights reserved.
    </footer>
</div>

{{-- JS для AdminLTE (если используете CDN) --}}
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
{{-- Bootstrap bundle (AdminLTE 3.2 требует) --}}
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

{{-- Если используете Vite/Mix, подключите свои файлы --}}
{{-- @vite('resources/js/app.js') --}}
{{-- или --}}
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</body>
</html>
