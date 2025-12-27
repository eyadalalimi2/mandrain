<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    public function index()
    {
        $offers = [
            ['title' => 'سلة فواكه أسبوعية', 'badge' => 'خصم 20%', 'details' => 'تشكيلة فواكه مختارة لعائلتك.'],
            ['title' => 'خضار للطهي السريع', 'badge' => 'عرض اليوم', 'details' => 'خضار مقطعة وجاهزة للطهي الصحي.'],
            ['title' => 'باقة عضوية', 'badge' => 'خصم 15%', 'details' => 'منتجات عضوية طازجة من المزرعة.'],
        ];

        return view('web.pages.offers.index', compact('offers'));
    }
}
