<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم - الأدمن')</title>
    <!-- Bootstrap RTL CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Vite Compiled Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Custom CSS for neutral colors -->
    <style>
        body {
            background-color: var(--color-background);
        }

        .sidebar {
            background-color: var(--color-sidebar-bg);
            color: var(--color-sidebar-text);
            min-height: 100vh;
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
            padding: 20px;
            background-color: var(--color-background);
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <div class="flex-grow-1">
            <!-- Topbar -->
            @include('admin.partials.topbar')

            <!-- Main Content -->
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
