@extends('admin.layouts.app')

@section('title', 'عرض المنتج')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تفاصيل المنتج</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> تعديل
                            </a>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> العودة
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">الاسم بالعربية:</label>
                                    <p>{{ $product->name_ar }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">رمز المنتج (SKU):</label>
                                    <p>{{ $product->sku }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">القسم:</label>
                                    <p>{{ $product->category->name_ar }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">وحدة القياس:</label>
                                    <p>{{ $product->unit->name_ar }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">الكمية:</label>
                                    <p>{{ $product->quantity }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">السعر:</label>
                                    <p>{{ number_format($product->price, 2) }} ريال</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">ترتيب العرض:</label>
                                    <p>{{ $product->sort_order }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">الحالة:</label>
                                    <p>
                                        @if ($product->is_active)
                                            <span class="badge bg-success">نشط</span>
                                        @else
                                            <span class="badge bg-danger">غير نشط</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">الوصف المختصر:</label>
                            <p>{{ $product->short_description ?? 'لا يوجد وصف' }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">الصورة:</label>
                            <div>
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name_ar }}"
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
                                    <p>{{ $product->created_at->format('Y-m-d H:i') }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">آخر تحديث:</label>
                                    <p>{{ $product->updated_at->format('Y-m-d H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
