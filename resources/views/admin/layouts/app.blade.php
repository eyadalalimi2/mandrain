<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'لوحة التحكم - Mandrain')</title>
    <!-- Bootstrap RTL CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom Admin CSS -->
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
    @stack('styles')
    <style>
        .sidebar {
            background-color: var(--color-sidebar-bg);
            color: var(--color-sidebar-text);
            min-height: 100vh;
            width: 250px;
            border-right: 1px solid var(--color-border);
        }

        .sidebar .nav-link {
            color: var(--color-sidebar-icon);
        }

        .sidebar .nav-link:hover {
            color: var(--color-sidebar-text);
            background-color: var(--color-sidebar-hover-bg);
        }

        .topbar {
            background-color: var(--color-navbar-bg);
            border-bottom: 1px solid var(--color-navbar-border);
            color: var(--color-navbar-text);
        }

        .content {
            background-color: var(--color-background);
        }

        .footer {
            background-color: var(--color-footer-bg);
            color: var(--color-footer-text);
            border-top: 1px solid var(--color-footer-border);
        }
    </style>
</head>

<body class="theme-light d-flex flex-column min-vh-100">
    <!-- Topbar -->
    @include('admin.partials.topbar')

    <!-- Sidebar Offcanvas for Mobile -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">Mandrain Admin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @include('admin.partials.sidebar')
        </div>
    </div>

    <div class="d-flex flex-grow-1">
        <!-- Sidebar for Desktop -->
        <div class="d-none d-lg-block sidebar">
            @include('admin.partials.sidebar')
        </div>

        <div class="flex-grow-1 d-flex flex-column">
            <!-- Main Content -->
            <div class="content flex-grow-1 p-3">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="py-3 text-center">
                @include('admin.partials.footer')
            </footer>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/js/admin.js'])
    @stack('scripts')
</body>

</html>
