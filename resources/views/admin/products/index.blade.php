@extends('admin.layouts.app')

@section('title', 'إدارة المنتجات')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">المنتجات</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> إضافة منتج جديد
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Search and Filter Form -->
                        <form method="GET" class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="البحث بالاسم أو SKU..." value="{{ request('search') }}">
                                </div>
                                <div class="col-md-3">
                                    <select name="category_id" class="form-control">
                                        <option value="">جميع الأقسام</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="is_active" class="form-control">
                                        <option value="">جميع الحالات</option>
                                        <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>نشط
                                        </option>
                                        <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>غير نشط
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-secondary">بحث</button>
                                </div>
                            </div>
                        </form>

                        <!-- Products Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>الصورة</th>
                                        <th>الاسم</th>
                                        <th>SKU</th>
                                        <th>القسم</th>
                                        <th>الوحدة</th>
                                        <th>الكمية</th>
                                        <th>السعر</th>
                                        <th>الحالة</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td>
                                                @if ($product->image)
                                                    <img src="{{ asset('storage/' . $product->image) }}"
                                                        alt="{{ $product->name_ar }}" class="img-thumbnail" width="50">
                                                @else
                                                    <span class="text-muted">لا توجد صورة</span>
                                                @endif
                                            </td>
                                            <td>{{ $product->name_ar }}</td>
                                            <td>{{ $product->sku }}</td>
                                            <td>{{ $product->category->name_ar }}</td>
                                            <td>{{ $product->unit->name_ar }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ number_format($product->price, 2) }} ريال</td>
                                            <td>
                                                @if ($product->is_active)
                                                    <span class="badge bg-success">نشط</span>
                                                @else
                                                    <span class="badge bg-danger">غير نشط</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.products.show', $product) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.products.edit', $product) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.products.destroy', $product) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">لا توجد منتجات</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
