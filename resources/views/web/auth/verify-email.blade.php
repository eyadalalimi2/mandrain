@extends('web.layouts.app')

@section('title', 'تأكيد البريد الإلكتروني')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="web-card p-4 shadow-sm rounded-4 bg-white">
                    <h1 class="h5 mb-3">تأكيد البريد الإلكتروني</h1>
                    <p class="text-muted mb-3">تم إرسال رابط تأكيد إلى بريدك الإلكتروني. إذا لم يصلك، يمكنك طلب إعادة
                        الإرسال.</p>

                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success">تم إرسال رابط تأكيد جديد إلى بريدك.</div>
                    @endif

                    <div class="d-flex gap-2">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-mandrain">إعادة إرسال الرابط</button>
                        </form>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary">تسجيل خروج</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
