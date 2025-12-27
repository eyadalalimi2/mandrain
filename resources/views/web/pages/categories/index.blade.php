@extends('web.layouts.app')

@section('title', 'الأقسام')

@section('content')
    <div class="container py-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h5 mb-0">الأقسام</h1>
            <a class="btn btn-outline-mandrain" href="{{ route('web.offers') }}">اطلع على العروض</a>
        </div>

        <div class="row g-3">
            @foreach ($categories as $category)
                <div class="col-md-6 col-lg-4">
                    <div class="web-card p-3 rounded-4 shadow-sm h-100">
                        <p class="text-muted small mb-1">#{{ $category['id'] }}</p>
                        <h2 class="h6 mb-2">{{ $category['name'] }}</h2>
                        <p class="text-muted mb-3">{{ $category['summary'] }}</p>
                        <a class="btn btn-mandrain" href="{{ route('web.categories.show', $category['id']) }}">تصفح</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
