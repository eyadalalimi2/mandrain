@extends('web.layouts.app')

@section('title', 'تتبع الطلب')

@section('content')
    <div class="container py-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <p class="text-muted small mb-1">طلب #{{ $orderId }}</p>
                <h1 class="h5 mb-0">تتبع الطلب</h1>
            </div>
            <a class="btn btn-outline-mandrain" href="{{ route('web.orders.show', $orderId) }}">تفاصيل الطلب</a>
        </div>

        <div class="web-card p-4 rounded-4 shadow-sm">
            <ol class="list-unstyled mb-0">
                @foreach ($steps as $step)
                    <li class="d-flex align-items-center mb-3">
                        <span
                            class="badge {{ $step['done'] ? 'bg-success' : 'bg-secondary' }} me-2">{{ $loop->iteration }}</span>
                        <span class="fw-semibold">{{ $step['label'] }}</span>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
@endsection
