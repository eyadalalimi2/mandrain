@extends('web.layouts.app')

@section('title', 'تأكيد كلمة المرور')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="web-card p-4 shadow-sm rounded-4 bg-white">
                    <h1 class="h5 mb-3">تأكيد كلمة المرور</h1>
                    <p class="text-muted">لأسباب أمنية، يرجى إدخال كلمة المرور للمتابعة.</p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-mandrain w-100" type="submit">تأكيد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
