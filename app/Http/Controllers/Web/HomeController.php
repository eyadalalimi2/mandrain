<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $categories = [
            ['name' => 'خضار طازجة', 'description' => 'منتجات يومية مختارة', 'cta' => 'تصفح الخضار', 'route' => route('web.categories')],
            ['name' => 'فواكه موسمية', 'description' => 'نكهات موسمية مميزة', 'cta' => 'اكتشف الفواكه', 'route' => route('web.categories')],
            ['name' => 'سلال جاهزة', 'description' => 'سلال عائلية متكاملة', 'cta' => 'تصفح السلال', 'route' => route('web.categories')],
            ['name' => 'الأكثر مبيعاً', 'description' => 'اختيارات العملاء المفضلة', 'cta' => 'الأكثر مبيعاً', 'route' => route('web.offers')],
        ];

        $offers = [
            ['title' => 'سلة خضار عائلية', 'badge' => 'خصم 25%', 'description' => 'تشكيلة خضار طازجة تكفي الأسبوع.'],
            ['title' => 'فواكه استوائية', 'badge' => 'عرض اليوم', 'description' => 'مانجو، أناناس، وكيوي بطزاجة مضمونة.'],
            ['title' => 'خضار للطبخ السريع', 'badge' => 'خصم 15%', 'description' => 'مكونات جاهزة للطهي الصحي والسريع.'],
        ];

        return view('web.pages.home', compact('categories', 'offers'));
    }
}
