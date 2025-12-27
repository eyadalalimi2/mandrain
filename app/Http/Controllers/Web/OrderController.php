<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = [
            ['id' => 501, 'status' => 'قيد التجهيز', 'total' => '145 ر.س', 'date' => '2025-12-28'],
            ['id' => 502, 'status' => 'قيد التوصيل', 'total' => '89 ر.س', 'date' => '2025-12-26'],
        ];

        return view('web.pages.orders.index', compact('orders'));
    }

    public function show(string $order): View
    {
        $orderData = [
            'id' => $order,
            'status' => 'قيد التوصيل',
            'total' => '145 ر.س',
            'items' => [
                ['name' => 'طماطم عضوية', 'qty' => 2, 'price' => '24 ر.س'],
                ['name' => 'خيار طازج', 'qty' => 1, 'price' => '8 ر.س'],
            ],
        ];

        return view('web.pages.orders.show', ['order' => $orderData]);
    }

    public function track(string $order): View
    {
        $steps = [
            ['label' => 'تم استلام الطلب', 'done' => true],
            ['label' => 'قيد التجهيز', 'done' => true],
            ['label' => 'جاري التوصيل', 'done' => true],
            ['label' => 'تم التسليم', 'done' => false],
        ];

        return view('web.pages.orders.track', [
            'orderId' => $order,
            'steps' => $steps,
        ]);
    }
}
