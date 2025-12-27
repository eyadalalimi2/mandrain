@extends('web.layouts.app')

@section('title', 'المنتجات')

@section('content')
    <div class="container py-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h5 mb-0">المنتجات</h1>
            <a class="btn btn-outline-mandrain" href="{{ route('web.cart') }}">اذهب إلى السلة</a>
        </div>

        <div class="row g-3">
            @foreach ($products as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="web-card p-3 rounded-4 shadow-sm h-100">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h2 class="h6 mb-0">{{ $product['name'] }}</h2>
                            <span class="badge bg-sun text-dark">{{ $product['status'] }}</span>
                        </div>
                        <p class="text-muted">{{ $product['price'] }}</p>
                        <div class="d-flex gap-2">
                            <a class="btn btn-outline-mandrain"
                                href="{{ route('web.products.show', $product['id']) }}">عرض</a>
                            <form method="POST" action="{{ route('web.cart.add') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                <button class="btn btn-mandrain" type="submit">أضف للسلة</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
