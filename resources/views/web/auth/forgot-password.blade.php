@extends('web.layouts.app')

@section('title', 'استعادة كلمة المرور')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="web-card p-4 shadow-sm rounded-4 bg-white">
                    <h1 class="h5 mb-3">نسيت كلمة المرور</h1>
                    <p class="text-muted">أدخل بريدك الإلكتروني المسجّل لاستلام رابط إعادة تعيين كلمة المرور.</p>

                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-mandrain w-100" type="submit">إرسال رابط إعادة التعيين</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
