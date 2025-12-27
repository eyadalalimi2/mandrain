@extends('web.layouts.app')

@section('title', 'تعيين كلمة مرور جديدة')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="web-card p-4 shadow-sm rounded-4 bg-white">
                    <h1 class="h5 mb-3">تعيين كلمة مرور جديدة</h1>

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email', $request->email) }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور الجديدة</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <button class="btn btn-mandrain w-100" type="submit">حفظ كلمة المرور</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
