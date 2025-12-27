@extends('web.layouts.app')

@section('title', 'حسابي')

@section('content')
    <div class="container py-4">
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="web-card p-4 shadow-sm rounded-4 bg-white mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="h5 mb-0">البيانات الأساسية</h2>
                        @if (session('status') === 'profile-updated')
                            <span class="badge bg-success">تم الحفظ</span>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('web.profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label for="name" class="form-label">الاسم</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $user->name) }}" required autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                name="phone" value="{{ old('phone', $user->phone) }}" required autocomplete="tel">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني (اختياري)</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email', $user->email) }}" autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-mandrain">حفظ التعديلات</button>
                    </form>
                </div>

                <div class="web-card p-4 shadow-sm rounded-4 bg-white mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="h5 mb-0">تغيير كلمة المرور</h2>
                        @if (session('status') === 'password-updated')
                            <span class="badge bg-success">تم التحديث</span>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">كلمة المرور الحالية</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                id="current_password" name="current_password" required autocomplete="current-password">
                            @error('current_password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور الجديدة</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required autocomplete="new-password">
                            @error('password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn btn-outline-mandrain">تحديث كلمة المرور</button>
                    </form>
                </div>

                <div class="web-card p-4 shadow-sm rounded-4 bg-white">
                    <h2 class="h6 text-danger mb-2">حذف الحساب</h2>
                    <p class="text-muted">سيتم حذف حسابك وجميع البيانات المرتبطة به.</p>
                    <form method="POST" action="{{ route('web.profile.destroy') }}"
                        onsubmit="return confirm('تأكيد حذف الحساب؟');">
                        @csrf
                        @method('delete')

                        <div class="mb-3">
                            <label for="delete_password" class="form-label">تأكيد كلمة المرور</label>
                            <input type="password"
                                class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                id="delete_password" name="password" required autocomplete="current-password">
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-danger">حذف الحساب</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
