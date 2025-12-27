<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class ToolsController extends Controller
{
    public function clearCache(Request $request)
    {
        try {
            // Clear application cache
            Cache::flush();

            // Clear config cache
            config()->clear();

            // Clear route cache
            app()->make('router')->clearResolvedInstances();

            // Clear view cache
            View::flush();

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
