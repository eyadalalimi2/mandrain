@extends('web.layouts.app')

@section('title', 'تفاصيل الطلب')

@section('content')
    <div class="container py-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <p class="text-muted small mb-1">طلب #{{ $order['id'] }}</p>
                <h1 class="h5 mb-0">الحالة: {{ $order['status'] }}</h1>
            </div>
            <a class="btn btn-outline-mandrain" href="{{ route('web.orders') }}">عودة للطلبات</a>
        </div>

        <div class="web-card p-4 rounded-4 shadow-sm mb-3">
            <h2 class="h6 mb-3">العناصر</h2>
            @foreach ($order['items'] as $item)
                <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                    <span>{{ $item['name'] }} × {{ $item['qty'] }}</span>
                    <strong>{{ $item['price'] }}</strong>
                </div>
            @endforeach
            <div class="d-flex justify-content-between align-items-center pt-3">
                <span class="fw-semibold">الإجمالي</span>
                <strong>{{ $order['total'] }}</strong>
            </div>
        </div>

        <div class="web-card p-4 rounded-4 shadow-sm">
            <h2 class="h6 mb-3">تتبع سريع</h2>
            <a class="btn btn-mandrain" href="{{ route('web.orders.track', $order['id']) }}">عرض مسار التوصيل</a>
        </div>
    </div>
@endsection
