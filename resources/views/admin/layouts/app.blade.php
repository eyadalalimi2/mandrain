<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة تحكم سوبر ماركت الخضروات والفواكه')</title>
    <!-- Bootstrap RTL CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Custom Admin CSS -->
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
    <style>
        .sidebar {
            background-color: var(--color-sidebar-bg);
            color: var(--color-sidebar-text);
            min-height: 100vh;
            width: 250px;
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

<body>
    <!-- Sidebar Offcanvas for Mobile -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">سوبر ماركت الخضروات والفواكه</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @include('admin.partials.sidebar')
        </div>
    </div>

    <div class="d-flex">
        <!-- Sidebar for Desktop -->
        <div class="d-none d-lg-block sidebar">
            @include('admin.partials.sidebar')
        </div>

        <div class="flex-grow-1 d-flex flex-column min-vh-100">
            <!-- Topbar -->
            @include('admin.partials.topbar')

            <!-- Main Content -->
            <div class="content flex-grow-1 p-3">
                @yield('content')
            </div>

            <!-- Footer -->
            @include('admin.partials.footer')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
