@extends('web.layouts.app')

@section('title', 'طلباتي')

@section('content')
    <div class="container py-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h5 mb-0">طلباتي</h1>
            @if (session('status'))
                <span class="badge bg-success">{{ session('status') }}</span>
            @endif
        </div>

        <div class="row g-3">
            @forelse ($orders as $order)
                <div class="col-md-6">
                    <div class="web-card p-3 rounded-4 shadow-sm h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h2 class="h6 mb-0">طلب #{{ $order['id'] }}</h2>
                            <span class="badge bg-wood text-dark">{{ $order['status'] }}</span>
                        </div>
                        <p class="text-muted mb-1">التكلفة: {{ $order['total'] }}</p>
                        <p class="text-muted mb-3">التاريخ: {{ $order['date'] }}</p>
                        <div class="d-flex gap-2">
                            <a class="btn btn-outline-mandrain" href="{{ route('web.orders.show', $order['id']) }}">عرض</a>
                            <a class="btn btn-mandrain" href="{{ route('web.orders.track', $order['id']) }}">تتبع</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">لا توجد طلبات حالياً.</p>
            @endforelse
        </div>
    </div>
@endsection
