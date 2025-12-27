@extends('admin.layouts.app')

@section('title', 'إدارة وحدات القياس')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">وحدات القياس</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.units.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> إضافة وحدة جديدة
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Search and Filter Form -->
                        <form method="GET" class="mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="البحث بالاسم أو الكود..." value="{{ request('search') }}">
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

                        <!-- Units Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th>الكود</th>
                                        <th>العامل</th>
                                        <th>الحالة</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($units as $unit)
                                        <tr>
                                            <td>{{ $unit->name_ar }}</td>
                                            <td>{{ $unit->code }}</td>
                                            <td>{{ $unit->factor ?? 'غير محدد' }}</td>
                                            <td>
                                                @if ($unit->is_active)
                                                    <span class="badge bg-success">نشط</span>
                                                @else
                                                    <span class="badge bg-danger">غير نشط</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.units.show', $unit) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.units.edit', $unit) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.units.destroy', $unit) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('هل أنت متأكد من حذف هذه الوحدة؟')">
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
                                            <td colspan="5" class="text-center">لا توجد وحدات</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        {{ $units->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
