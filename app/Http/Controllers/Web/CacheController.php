<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    public function clear(): RedirectResponse
    {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        return redirect()->back()->with('status', 'تم مسح الذاكرة المؤقتة وتحديث التوجيهات بنجاح.');
    }
}
