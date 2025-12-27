@extends('admin.layouts.app')

@section('title', 'عرض القسم')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تفاصيل القسم</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> تعديل
                            </a>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> العودة
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">الاسم بالعربية:</label>
                                    <p>{{ $category->name_ar }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">الرابط المختصر:</label>
                                    <p>{{ $category->slug }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">ترتيب العرض:</label>
                                    <p>{{ $category->sort_order }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">الحالة:</label>
                                    <p>
                                        @if ($category->is_active)
                                            <span class="badge bg-success">نشط</span>
                                        @else
                                            <span class="badge bg-danger">غير نشط</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">الصورة:</label>
                            <div>
                                @if ($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name_ar }}"
                                        class="img-thumbnail" width="200">
                                @else
                                    <span class="text-muted">لا توجد صورة</span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">تاريخ الإنشاء:</label>
                                    <p>{{ $category->created_at->format('Y-m-d H:i') }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">آخر تحديث:</label>
                                    <p>{{ $category->updated_at->format('Y-m-d H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
