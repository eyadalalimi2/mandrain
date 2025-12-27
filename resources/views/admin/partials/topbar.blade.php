<nav class="navbar navbar-expand-lg bg-white border-bottom fixed-top">
    <div class="container-fluid">
        <!-- Toggle Button for Mobile -->
        <button class="btn btn-outline-secondary d-lg-none me-2" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Brand/Title -->
        <span class="navbar-brand mb-0 h1">لوحة التحكم - Mandrain</span>

        <!-- Navbar Items -->
        <div class="d-flex ms-auto align-items-center">
            <!-- Theme Toggle -->
            <button id="theme-toggle" class="btn btn-outline-secondary me-2" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="تبديل الوضع">
                <i class="fas fa-sun"></i>
            </button>

            <!-- Clear Cache -->
            <button id="clear-cache-btn" class="btn btn-outline-secondary me-2" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="مسح الكاش">
                <i class="fas fa-sync-alt"></i>
            </button>

            <!-- Open Website -->
            <a href="/" target="_blank" class="btn btn-outline-secondary me-2" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="فتح الموقع">
                <i class="fas fa-globe"></i>
            </a>

            <!-- Messages -->
            <div class="dropdown me-2">
                <button class="btn btn-outline-secondary position-relative" type="button" id="messagesDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="الرسائل">
                    <i class="fas fa-envelope"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"
                        id="messages-badge">0</span>
                </button>
                <ul class="dropdown-menu border rounded">
                    <li>
                        <h6 class="dropdown-header">الرسائل</h6>
                    </li>
                    <li><a class="dropdown-item" href="#"><strong>المرسل 1</strong><br><small>مقتطف الرسالة
                                1</small><br><small class="text-muted">منذ دقيقة</small></a></li>
                    <li><a class="dropdown-item" href="#"><strong>المرسل 2</strong><br><small>مقتطف الرسالة
                                2</small><br><small class="text-muted">منذ 5 دقائق</small></a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin.messages.index') }}">عرض الكل</a></li>
                </ul>
            </div>

            <!-- Notifications -->
            <div class="dropdown me-2">
                <button class="btn btn-outline-secondary position-relative" type="button" id="notificationsDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="التنبيهات">
                    <i class="fas fa-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"
                        id="notifications-badge">0</span>
                </button>
                <ul class="dropdown-menu border rounded">
                    <li>
                        <h6 class="dropdown-header">التنبيهات</h6>
                    </li>
                    <li><a class="dropdown-item" href="#"><small>تنبيه 1</small><br><small class="text-muted">منذ
                                دقيقة</small></a></li>
                    <li><a class="dropdown-item" href="#"><small>تنبيه 2</small><br><small class="text-muted">منذ
                                5 دقائق</small></a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#" id="mark-all-read">تحديد الكل كمقروء</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.notifications.index') }}">عرض الكل</a></li>
                </ul>
            </div>

            <!-- Admin Profile -->
            <div class="dropdown">
                <button class="btn btn-outline-secondary d-flex align-items-center" type="button" id="profileDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ Auth::guard('admin')->user()->avatar ?? asset('admin/images/default-avatar.png') }}"
                        alt="Avatar" class="rounded-circle me-2" width="30" height="30">
                    <span>{{ Auth::guard('admin')->user()->name ?? 'الأدمن' }}</span>
                    <span class="badge bg-secondary ms-2">{{ Auth::guard('admin')->user()->role ?? 'أدمن' }}</span>
                </button>
                <ul class="dropdown-menu border rounded">
                    <li><a class="dropdown-item" href="{{ route('admin.profile') }}"><i
                                class="fas fa-user me-2"></i>الملف الشخصي</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.settings') }}"><i
                                class="fas fa-cog me-2"></i>الإعدادات</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item"><i
                                    class="fas fa-sign-out-alt me-2"></i>تسجيل الخروج</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Clear Cache Modal -->
<div class="modal fade" id="clearCacheModal" tabindex="-1" aria-labelledby="clearCacheModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border rounded">
            <div class="modal-header">
                <h5 class="modal-title" id="clearCacheModalLabel">تأكيد مسح الكاش</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                هل تريد تنفيذ تنظيف الكاش؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="confirm-clear-cache">تأكيد</button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="toast" class="toast border rounded" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">إشعار</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toast-message"></div>
    </div>
</div>
