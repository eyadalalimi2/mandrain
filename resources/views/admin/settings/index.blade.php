@extends('admin.layouts.app')

@section('title', 'الإعدادات')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card border rounded">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">إعدادات النظام</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="site_name" class="form-label">اسم الموقع</label>
                                <input type="text" class="form-control" id="site_name" value="Mandrain">
                            </div>
                            <div class="mb-3">
                                <label for="site_description" class="form-label">وصف الموقع</label>
                                <textarea class="form-control" id="site_description" rows="3">موقع سوبر ماركت الخضروات والفواكه</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="contact_email" class="form-label">البريد الإلكتروني للتواصل</label>
                                <input type="email" class="form-control" id="contact_email" value="info@mandrain.com">
                            </div>
                            <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border rounded">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">إعدادات أخرى</h5>
                    </div>
                    <div class="card-body">
                        <p>إعدادات إضافية يمكن إضافتها هنا.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
