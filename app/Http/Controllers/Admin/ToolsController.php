<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ToolsController extends Controller
{
    public function clearCache(Request $request)
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');

            return response()->json([
                'success' => true,
                'message' => 'تم مسح الكاش بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'فشل في مسح الكاش: ' . $e->getMessage()
            ], 500);
        }
    }
}
