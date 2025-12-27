@extends('admin.layouts.app')

@section('title', 'الملف الشخصي')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card border rounded">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">معلومات الملف الشخصي</h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">الاسم</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $admin->name) }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">رقم الهاتف</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ old('phone', $admin->phone) }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">الصورة الشخصية</label>
                                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                                @if ($admin->avatar)
                                    <img src="{{ asset('storage/' . $admin->avatar) }}" alt="Avatar"
                                        class="mt-2 rounded-circle" width="100" height="100">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                        </form>
                    </div>
                </div>

                <div class="card border rounded mt-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">تغيير كلمة المرور</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.change-password') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password" class="form-label">كلمة المرور الحالية</label>
                                <input type="password" class="form-control" id="current_password" name="current_password"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">كلمة المرور الجديدة</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">تأكيد كلمة المرور الجديدة</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary">تغيير كلمة المرور</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border rounded">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">معلومات إضافية</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>الدور:</strong> {{ $admin->role ?? 'أدمن' }}</p>
                        <p><strong>تاريخ آخر دخول:</strong>
                            {{ $admin->last_login_at ? $admin->last_login_at->format('Y-m-d H:i') : 'غير محدد' }}</p>
                        <p><strong>الحالة:</strong> {{ $admin->is_active ? 'مفعل' : 'غير مفعل' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
