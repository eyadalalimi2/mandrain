@extends('admin.layouts.app')

@section('title', 'عرض وحدة القياس')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تفاصيل وحدة القياس</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.units.edit', $unit) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> تعديل
                            </a>
                            <a href="{{ route('admin.units.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> العودة
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">الاسم بالعربية:</label>
                                    <p>{{ $unit->name_ar }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">الكود:</label>
                                    <p>{{ $unit->code }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">العامل:</label>
                                    <p>{{ $unit->factor ?? 'غير محدد' }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">الحالة:</label>
                                    <p>
                                        @if ($unit->is_active)
                                            <span class="badge bg-success">نشط</span>
                                        @else
                                            <span class="badge bg-danger">غير نشط</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">تاريخ الإنشاء:</label>
                                    <p>{{ $unit->created_at->format('Y-m-d H:i') }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">آخر تحديث:</label>
                                    <p>{{ $unit->updated_at->format('Y-m-d H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
