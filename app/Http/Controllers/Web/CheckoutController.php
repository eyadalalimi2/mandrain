<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(): View
    {
        $summary = [
            'items_total' => 140,
            'delivery' => 15,
            'discount' => 10,
            'grand_total' => 145,
        ];

        return view('web.pages.checkout.index', compact('summary'));
    }

    public function submit(Request $request): RedirectResponse
    {
        return redirect()->route('web.orders')->with('status', 'تم تأكيد الطلب، سنقوم بالتواصل معك قريباً.');
    }
}
