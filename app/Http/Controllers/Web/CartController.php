<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $items = [
            ['id' => 1, 'name' => 'طماطم عضوية', 'qty' => 2, 'price' => 12, 'total' => 24],
            ['id' => 2, 'name' => 'خيار طازج', 'qty' => 1, 'price' => 8, 'total' => 8],
        ];

        $summary = [
            'subtotal' => 32,
            'delivery' => 10,
            'discount' => 5,
            'total' => 37,
        ];

        return view('web.pages.cart.index', compact('items', 'summary'));
    }

    public function add(Request $request): RedirectResponse
    {
        return back()->with('status', 'تمت إضافة المنتج إلى السلة.');
    }

    public function update(Request $request, string $item): RedirectResponse
    {
        return back()->with('status', 'تم تحديث الكمية.');
    }

    public function remove(string $item): RedirectResponse
    {
        return back()->with('status', 'تم حذف العنصر من السلة.');
    }
}
