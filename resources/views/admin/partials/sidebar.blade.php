<div class="sidebar p-3 bg-white border-end">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-house-door me-2"></i> الرئيسية
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="#">
                <i class="bi bi-gear me-2"></i> الإعدادات
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('admin.categories.index') }}">
                <i class="bi bi-tags me-2"></i> الأقسام
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('admin.units.index') }}">
                <i class="bi bi-rulers me-2"></i> وحدات القياس
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('admin.products.index') }}">
                <i class="bi bi-box-seam me-2"></i> المنتجات
            </a>
        </li>
        <!-- أضف المزيد من الروابط حسب الحاجة -->
        <li class="nav-item">
            <a class="nav-link text-dark" href="#">
                <i class="bi bi-people me-2"></i> المستخدمون
            </a>
        </li>
      
        <li class="nav-item">
            <a class="nav-link text-dark" href="#">
                <i class="bi bi-graph-up me-2"></i> التقارير
            </a>
        </li>
    </ul>
</div>
