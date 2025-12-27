@extends('web.layouts.app')

@section('title', 'سلة المشتريات')

@section('content')
    <div class="container py-4">
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="web-card p-4 rounded-4 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="h5 mb-0">السلة</h1>
                        @if (session('status'))
                            <span class="badge bg-success">{{ session('status') }}</span>
                        @endif
                    </div>

                    @forelse ($items as $item)
                        <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                            <div>
                                <h2 class="h6 mb-1">{{ $item['name'] }}</h2>
                                <p class="text-muted mb-0">{{ $item['price'] }} ر.س</p>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <form method="POST" action="{{ route('web.cart.update', $item['id']) }}"
                                    class="d-flex gap-2 align-items-center">
                                    @csrf
                                    @method('patch')
                                    <input type="number" class="form-control" name="qty" value="{{ $item['qty'] }}"
                                        min="1" style="width: 80px;">
                                    <button class="btn btn-outline-mandrain" type="submit">تحديث</button>
                                </form>
                                <form method="POST" action="{{ route('web.cart.remove', $item['id']) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">حذف</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">السلة فارغة حالياً.</p>
                    @endforelse
                </div>
            </div>

            <div class="col-lg-4">
                <div class="web-card p-4 rounded-4 shadow-sm">
                    <h2 class="h6 mb-3">الملخص</h2>
                    <ul class="list-unstyled mb-3">
                        <li class="d-flex justify-content-between mb-2">
                            <span>الإجمالي</span><strong>{{ $summary['subtotal'] }} ر.س</strong></li>
                        <li class="d-flex justify-content-between mb-2">
                            <span>التوصيل</span><strong>{{ $summary['delivery'] }} ر.س</strong></li>
                        <li class="d-flex justify-content-between mb-2">
                            <span>الخصم</span><strong>-{{ $summary['discount'] }} ر.س</strong></li>
                        <li class="d-flex justify-content-between border-top pt-2"><span>المجموع
                                الكلي</span><strong>{{ $summary['total'] }} ر.س</strong></li>
                    </ul>
                    <a class="btn btn-mandrain w-100" href="{{ route('web.checkout') }}">إتمام الشراء</a>
                </div>
            </div>
        </div>
    </div>
@endsection
