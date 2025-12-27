@extends('web.layouts.app')

@section('title', 'إتمام الشراء')

@section('content')
    <div class="container py-4">
        <div class="row g-3">
            <div class="col-lg-7">
                <div class="web-card p-4 rounded-4 shadow-sm mb-3">
                    <h1 class="h5 mb-3">معلومات التوصيل</h1>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">الاسم الكامل</label>
                                <input type="text" class="form-control" placeholder="اسم المستلم">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">رقم الهاتف</label>
                                <input type="text" class="form-control" placeholder="05XXXXXXXX">
                            </div>
                            <div class="col-12">
                                <label class="form-label">العنوان</label>
                                <input type="text" class="form-control" placeholder="الحي، الشارع، الرقم">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">طريقة الدفع</label>
                                <select class="form-select">
                                    <option>الدفع عند الاستلام</option>
                                    <option>بطاقة مدى</option>
                                    <option>بطاقة ائتمانية</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ملاحظات</label>
                                <input type="text" class="form-control" placeholder="ملاحظة للمندوب">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="web-card p-4 rounded-4 shadow-sm">
                    <h2 class="h6 mb-3">ملخص الطلب</h2>
                    <ul class="list-unstyled mb-3">
                        <li class="d-flex justify-content-between mb-2"><span>قيمة
                                المنتجات</span><strong>{{ $summary['items_total'] }} ر.س</strong></li>
                        <li class="d-flex justify-content-between mb-2">
                            <span>التوصيل</span><strong>{{ $summary['delivery'] }} ر.س</strong></li>
                        <li class="d-flex justify-content-between mb-2">
                            <span>الخصم</span><strong>-{{ $summary['discount'] }} ر.س</strong></li>
                        <li class="d-flex justify-content-between border-top pt-2">
                            <span>الإجمالي</span><strong>{{ $summary['grand_total'] }} ر.س</strong></li>
                    </ul>
                    <form method="POST" action="{{ route('web.checkout.submit') }}">
                        @csrf
                        <button class="btn btn-mandrain w-100" type="submit">تأكيد الطلب</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
