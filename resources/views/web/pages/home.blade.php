@extends('web.layouts.app')

@section('title', 'الرئيسية')

@section('content')
    <div class="container-fluid">
        <div class="row g-3">
            <div class="col-12">
                <div class="web-hero p-4 rounded-4 shadow-sm">
                    <div>
                        <h1 class="h4 mb-2 text-white">أهلاً بك في ماندرين</h1>
                        <p class="text-white-50 mb-0">استكشف أفضل الخضار والفواكه الطازجة، وتسوّق عروض الأسبوع بسهولة.</p>
                    </div>
                    <a class="btn btn-sun fw-semibold" href="{{ route('web.offers') }}">تسوّق العروض الآن</a>
                </div>
            </div>

            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between mt-2 mb-2">
                    <h2 class="h5 mb-0">الأقسام</h2>
                    <a class="btn btn-outline-mandrain" href="{{ route('web.categories') }}">كل الأقسام</a>
                </div>
                <div class="row g-3">
                    @foreach ($categories as $category)
                        <div class="col-md-6 col-xl-3">
                            <div class="web-card p-3 shadow-sm rounded-4 h-100">
                                <h3 class="h6 mb-1">{{ $category['name'] }}</h3>
                                <p class="text-muted mb-3">{{ $category['description'] }}</p>
                                <a class="btn btn-mandrain btn-sm"
                                    href="{{ $category['route'] }}">{{ $category['cta'] }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <h2 class="h5 mb-0">عروض مختارة</h2>
                    <a class="btn btn-outline-mandrain" href="{{ route('web.offers') }}">كل العروض</a>
                </div>
                <div class="row g-3">
                    @foreach ($offers as $offer)
                        <div class="col-md-4">
                            <div class="web-card p-3 shadow-sm rounded-4 h-100">
                                <span class="badge bg-sun text-dark mb-2">{{ $offer['badge'] }}</span>
                                <h3 class="h6 mb-2">{{ $offer['title'] }}</h3>
                                <p class="text-muted mb-0">{{ $offer['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
