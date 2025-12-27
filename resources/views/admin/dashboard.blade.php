@extends('admin.layouts.app')

@section('title', 'الرئيسية - لوحة التحكم')

@section('content')
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">عدد الأصناف</h5>
                    <h2 class="text-primary">150</h2>
                    <p class="card-text">إجمالي الأصناف المتاحة</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">الطلبات اليوم</h5>
                    <h2 class="text-success">25</h2>
                    <p class="card-text">عدد الطلبات اليوم</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">إجمالي المبيعات اليوم</h5>
                    <h2 class="text-warning">5000 ريال</h2>
                    <p class="card-text">المبيعات اليومية</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">العملاء الجدد</h5>
                    <h2 class="text-info">10</h2>
                    <p class="card-text">عملاء جدد اليوم</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4>مرحباً بك في لوحة التحكم</h4>
        <p>هذه لوحة تحكم أولية للأدمن. يمكنك إضافة المزيد من الميزات هنا.</p>
    </div>
@endsection
