@extends('web.layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="web-card p-4 shadow-sm rounded-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="h5 mb-0">تسجيل الدخول</h1>
                        <a class="text-decoration-none" href="{{ route('register') }}">مستخدم جديد؟</a>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                name="phone" value="{{ old('phone') }}" required autofocus autocomplete="username">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">تذكرني</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="small" href="{{ route('password.request') }}">نسيت كلمة المرور؟</a>
                            @endif
                        </div>

                        <button class="btn btn-mandrain w-100" type="submit">دخول</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
