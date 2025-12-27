@extends('web.layouts.app')

@section('title', $category)

@section('content')
    <div class="container py-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <p class="text-muted small mb-1">قسم</p>
                <h1 class="h5 mb-0">{{ $category }}</h1>
            </div>
            <a class="btn btn-outline-mandrain" href="{{ route('web.categories') }}">عودة للأقسام</a>
        </div>

        <div class="row g-3">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="web-card p-3 rounded-4 shadow-sm h-100">
                        <span class="badge bg-wood text-dark mb-2">{{ $product['tag'] }}</span>
                        <h2 class="h6 mb-1">{{ $product['name'] }}</h2>
                        <p class="text-muted mb-3">{{ $product['price'] }}</p>
                        <a class="btn btn-outline-mandrain" href="{{ route('web.products.show', $product['name']) }}">عرض
                            المنتج</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
