<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [
            ['id' => 1, 'name' => 'الخضار الورقية', 'summary' => 'خس، سبانخ، بقدونس بطزاجة يومية'],
            ['id' => 2, 'name' => 'الخضار الجذرية', 'summary' => 'جزر، بطاطس، شمندر مختارة بعناية'],
            ['id' => 3, 'name' => 'الفواكه الموسمية', 'summary' => 'رمان، برتقال، تفاح بكرم الطبيعة'],
            ['id' => 4, 'name' => 'السلال الجاهزة', 'summary' => 'سلال عائلية متكاملة للأسبوع'],
        ];

        return view('web.pages.categories.index', compact('categories'));
    }

    public function show(string $category)
    {
        $categoryName = ucwords(str_replace('-', ' ', $category));
        $products = [
            ['name' => 'منتج 1', 'price' => '35 ر.س', 'tag' => 'طازج اليوم'],
            ['name' => 'منتج 2', 'price' => '24 ر.س', 'tag' => 'عرض خاص'],
            ['name' => 'منتج 3', 'price' => '18 ر.س', 'tag' => 'عضوي'],
        ];

        return view('web.pages.categories.show', [
            'category' => $categoryName,
            'products' => $products,
        ]);
    }
}
