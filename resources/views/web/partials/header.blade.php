<header class="web-header shadow-sm">
    <div class="container-fluid py-3 d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('web.home') }}" class="navbar-brand fs-4 fw-bold text-white mb-0">ماندرين</a>
            <span class="badge rounded-pill bg-wood text-dark fw-semibold">Premium Grocery</span>
            <a class="btn btn-sun fw-semibold" href="{{ route('web.home') }}">
                <i class="bi bi-shop me-1"></i>
                الذهاب للمتجر
            </a>
        </div>

        <div class="d-flex align-items-center gap-2 flex-wrap justify-content-end">
            <div class="btn-group">
                <button class="btn btn-icon text-white" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end shadow-sm p-3">
                    <p class="text-muted mb-0">لا توجد إشعارات حالياً</p>
                </div>
            </div>

            <div class="btn-group">
                <button class="btn btn-icon text-white" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-chat-dots"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end shadow-sm p-3">
                    <p class="text-muted mb-0">لا توجد رسائل جديدة</p>
                </div>
            </div>

            @auth
                <button class="btn btn-icon text-white" id="web-cache-sync" title="مزامنة وتحديث">
                    <i class="bi bi-arrow-repeat"></i>
                </button>
            @endauth

            <button class="btn btn-icon text-white" id="web-theme-toggle" title="تبديل الوضع">
                <i class="bi bi-moon"></i>
            </button>
            @auth
                @php
                    $user = auth()->user();
                    $initial = $user && $user->name ? mb_substr($user->name, 0, 1, 'UTF-8') : 'م';
                @endphp
                <div class="dropdown">
                    <button class="btn d-flex align-items-center gap-2 text-white" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="avatar bg-white text-mandrain fw-bold">{{ $initial }}</span>
                        <span class="fw-semibold">{{ $user->name }}</span>
                        <i class="bi bi-chevron-down small"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li><a class="dropdown-item" href="{{ route('web.profile') }}"><i
                                    class="bi bi-person me-2"></i>الملف الشخصي</a></li>
                        <li><a class="dropdown-item" href="{{ route('web.orders') }}"><i
                                    class="bi bi-bag-check me-2"></i>طلباتي</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="#" id="web-logout-link"><i
                                    class="bi bi-box-arrow-left me-2"></i>تسجيل خروج</a></li>
                    </ul>
                </div>
            @else
                <a class="btn btn-outline-light" href="{{ route('login') }}">تسجيل الدخول</a>
                <a class="btn btn-sun fw-semibold" href="{{ route('register') }}">إنشاء حساب</a>
            @endauth
        </div>
    </div>
</header>

<form id="web-logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
    @csrf
</form>

@auth
    <form id="web-cache-form" action="{{ route('web.cache.clear') }}" method="POST" class="d-none">
        @csrf
    </form>
@endauth

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const themeToggle = document.getElementById('web-theme-toggle');
        const logoutLink = document.getElementById('web-logout-link');
        const logoutForm = document.getElementById('web-logout-form');

        const applyTheme = (mode) => {
            const body = document.body;
            const icon = themeToggle?.querySelector('i');
            const isDark = mode === 'dark';
            body.classList.toggle('theme-dark', isDark);
            localStorage.setItem('web-theme', isDark ? 'dark' : 'light');
            if (icon) {
                icon.classList.toggle('bi-moon', !isDark);
                icon.classList.toggle('bi-sun', isDark);
            }
        };

        const storedTheme = localStorage.getItem('web-theme');
        applyTheme(storedTheme === 'dark' ? 'dark' : 'light');

        themeToggle?.addEventListener('click', () => {
            const isDark = document.body.classList.contains('theme-dark');
            applyTheme(isDark ? 'light' : 'dark');
        });

        const cacheBtn = document.getElementById('web-cache-sync');
        const cacheForm = document.getElementById('web-cache-form');

        cacheBtn?.addEventListener('click', () => {
            cacheForm?.submit();
        });

        logoutLink?.addEventListener('click', (e) => {
            e.preventDefault();
            logoutForm?.submit();
        });
    });
</script>
