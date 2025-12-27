@extends('web.layouts.app')

@section('title', 'العروض')

@section('content')
    <div class="container py-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h5 mb-0">عروض ماندرين</h1>
            <a class="btn btn-outline-mandrain" href="{{ route('web.products') }}">تصفح المنتجات</a>
        </div>

        <div class="row g-3">
            @foreach ($offers as $offer)
                <div class="col-md-6 col-lg-4">
                    <div class="web-card p-3 rounded-4 shadow-sm h-100">
                        <span class="badge bg-sun text-dark mb-2">{{ $offer['badge'] }}</span>
                        <h2 class="h6 mb-2">{{ $offer['title'] }}</h2>
                        <p class="text-muted mb-3">{{ $offer['details'] }}</p>
                        <a class="btn btn-mandrain" href="{{ route('web.cart') }}">أضف للسلة</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
