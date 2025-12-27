<nav class="topbar navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">مرحباً، {{ Auth::guard('admin')->user()->name ?? 'الأدمن' }}</span>
        <div class="d-flex">
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger">تسجيل الخروج</button>
            </form>
        </div>
    </div>
</nav>
