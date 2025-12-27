@extends('admin.layouts.app')

@section('title', 'إدارة الأقسام')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">الأقسام</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> إضافة قسم جديد
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Search and Filter Form -->
                        <form method="GET" class="mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="search" class="form-control" placeholder="البحث بالاسم..."
                                        value="{{ request('search') }}">
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
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-secondary">بحث</button>
                                </div>
                            </div>
                        </form>

                        <!-- Categories Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>الصورة</th>
                                        <th>الاسم</th>
                                        <th>الرابط المختصر</th>
                                        <th>ترتيب العرض</th>
                                        <th>الحالة</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td>
                                                @if ($category->image)
                                                    <img src="{{ asset('storage/' . $category->image) }}"
                                                        alt="{{ $category->name_ar }}" class="img-thumbnail" width="50">
                                                @else
                                                    <span class="text-muted">لا توجد صورة</span>
                                                @endif
                                            </td>
                                            <td>{{ $category->name_ar }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->sort_order }}</td>
                                            <td>
                                                @if ($category->is_active)
                                                    <span class="badge bg-success">نشط</span>
                                                @else
                                                    <span class="badge bg-danger">غير نشط</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.categories.show', $category) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.categories.edit', $category) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.categories.destroy', $category) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('هل أنت متأكد من حذف هذا القسم؟')">
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
                                            <td colspan="6" class="text-center">لا توجد أقسام</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        {{ $categories->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
