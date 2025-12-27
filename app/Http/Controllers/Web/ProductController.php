<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            ['id' => 101, 'name' => 'طماطم عضوية', 'price' => '12 ر.س / كجم', 'status' => 'متوفر'],
            ['id' => 102, 'name' => 'خيار طازج', 'price' => '8 ر.س / كجم', 'status' => 'متوفر'],
            ['id' => 103, 'name' => 'برتقال عصيري', 'price' => '10 ر.س / كجم', 'status' => 'عرض اليوم'],
            ['id' => 104, 'name' => 'تفاح أحمر', 'price' => '14 ر.س / كجم', 'status' => 'طازج اليوم'],
        ];

        return view('web.pages.products.index', compact('products'));
    }

    public function show(string $product)
    {
        $productData = [
            'name' => 'طماطم عضوية مميزة',
            'price' => '12 ر.س / كجم',
            'description' => 'طماطم ناضجة حمراء بنكهة طبيعية، مثالية للسلطات والطبخ.',
            'highlights' => ['طازج اليوم', 'مزرعة محلية', 'معبأ بعناية'],
        ];

        return view('web.pages.products.show', ['product' => $productData]);
    }
}
