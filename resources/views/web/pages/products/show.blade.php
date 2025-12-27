@extends('web.layouts.app')

@section('title', $product['name'])

@section('content')
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="web-card p-4 rounded-4 shadow-sm h-100">
                    <p class="text-muted small mb-1">منتج</p>
                    <h1 class="h5 mb-2">{{ $product['name'] }}</h1>
                    <p class="text-muted">{{ $product['price'] }}</p>
                    <p class="mb-3">{{ $product['description'] }}</p>

                    <div class="d-flex flex-wrap gap-2 mb-3">
                        @foreach ($product['highlights'] as $highlight)
                            <span class="badge bg-wood text-dark">{{ $highlight }}</span>
                        @endforeach
                    </div>

                    <form method="POST" action="{{ route('web.cart.add') }}" class="d-flex gap-2">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ request()->route('product') }}">
                        <button class="btn btn-mandrain" type="submit">أضف للسلة</button>
                        <a class="btn btn-outline-mandrain" href="{{ route('web.products') }}">عودة للمنتجات</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
