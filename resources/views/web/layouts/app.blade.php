<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mandrain')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&family=Tajawal:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-72fd17o3bpMj1j2OBHGh+Trsyg1i8eN8bPgyAy1Anfo7lK+OCOJtMlKmJVE9k5q5" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        integrity="sha384-kIk9VjA36TObgATJE0E7E5Wdl66iRS0LlwM1c01qmPvvrLpzjAU6RzGmmKzB6FKW" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/web/css/theme.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-web text-body">
    <script>
        (() => {
            const saved = localStorage.getItem('web-theme');
            if (saved === 'dark') {
                document.body.classList.add('theme-dark');
            }
        })();
    </script>
    @include('web.partials.header')

    <div class="container-fluid">
        <div class="row">
            @include('web.partials.sidebar')

            <main class="col-lg-9 col-xl-10 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    @include('web.partials.footer')
</body>

</html>
