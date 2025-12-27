<aside class="col-12 col-lg-3 col-xl-2 web-sidebar min-vh-100 py-4">
    <div class="px-3 mb-3 d-flex align-items-center justify-content-between">
        <div>
            <p class="text-muted fw-semibold mb-1">تصفح</p>
            <small class="text-secondary">اختر وجهتك بسرعة</small>
        </div>
        <button class="btn btn-outline-mandrain d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#webSidebarNav" aria-expanded="false" aria-controls="webSidebarNav">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <nav id="webSidebarNav" class="nav flex-column px-3 collapse d-lg-block">
        <a class="nav-link text-secondary py-2 rounded-3" href="{{ route('web.home') }}">الرئيسية</a>
        <a class="nav-link text-secondary py-2 rounded-3" href="{{ route('web.categories') }}">الأقسام</a>
        <a class="nav-link text-secondary py-2 rounded-3" href="{{ route('web.offers') }}">العروض</a>
        <a class="nav-link text-secondary py-2 rounded-3" href="{{ route('web.best') }}">الأكثر مبيعًا</a>

        @auth
            <hr class="my-3 text-muted" />
            <p class="text-muted fw-semibold mb-2">حسابي</p>
            <a class="nav-link text-secondary py-2 rounded-3" href="{{ route('web.cart') }}">سلة المشتريات</a>
            <a class="nav-link text-secondary py-2 rounded-3" href="{{ route('web.tracking') }}">تتبع الطلبات</a>
            <a class="nav-link text-secondary py-2 rounded-3" href="{{ route('web.addresses') }}">العناوين</a>
            <a class="nav-link text-secondary py-2 rounded-3" href="{{ route('web.wallet') }}">المحفظة / الدفع</a>
        @endauth
    </nav>
</aside>
