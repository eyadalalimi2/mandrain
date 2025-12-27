<nav class="topbar navbar navbar-expand-lg">
    <div class="container-fluid">
        <!-- Toggle Button for Mobile -->
        <button class="btn d-lg-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas"
            aria-controls="sidebarOffcanvas">
            <i class="bi bi-list"></i>
        </button>

        <!-- Brand/Title -->
        <span class="navbar-brand mb-0 h1">مرحباً، {{ Auth::guard('admin')->user()->name ?? 'الأدمن' }}</span>

        <!-- Navbar Items -->
        <div class="d-flex ms-auto">
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger">تسجيل الخروج</button>
            </form>
        </div>
    </div>
</nav>
