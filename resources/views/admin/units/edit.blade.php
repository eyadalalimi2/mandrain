@extends('admin.layouts.app')

@section('title', 'تعديل وحدة القياس')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تعديل وحدة القياس: {{ $unit->name_ar }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.units.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> العودة
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('admin.units.update', $unit) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name_ar" class="form-label">الاسم بالعربية <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name_ar') is-invalid @enderror"
                                            id="name_ar" name="name_ar" value="{{ old('name_ar', $unit->name_ar) }}"
                                            required>
                                        @error('name_ar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="code" class="form-label">الكود <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control @error('code') is-invalid @enderror" id="code"
                                            name="code" required>
                                            <option value="">اختر الكود</option>
                                            <option value="KG" {{ old('code', $unit->code) == 'KG' ? 'selected' : '' }}>
                                                KG</option>
                                            <option value="HALF"
                                                {{ old('code', $unit->code) == 'HALF' ? 'selected' : '' }}>HALF</option>
                                            <option value="QUARTER"
                                                {{ old('code', $unit->code) == 'QUARTER' ? 'selected' : '' }}>QUARTER
                                            </option>
                                            <option value="BASKET"
                                                {{ old('code', $unit->code) == 'BASKET' ? 'selected' : '' }}>BASKET</option>
                                        </select>
                                        @error('code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="factor" class="form-label">العامل</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('factor') is-invalid @enderror" id="factor"
                                            name="factor" value="{{ old('factor', $unit->factor) }}" min="0">
                                        @error('factor')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">اختياري - للتحويل بين الوحدات</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">الحالة</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                                value="1" {{ old('is_active', $unit->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                نشط
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> حفظ التغييرات
                            </button>
                            <a href="{{ route('admin.units.index') }}" class="btn btn-secondary">
                                إلغاء
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
