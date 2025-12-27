<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        // Return view for notifications
        return view('admin.notifications.index');
    }

    public function latest()
    {
        // Return latest 5 notifications as JSON
        // Placeholder data
        $notifications = [
            ['id' => 1, 'text' => 'تنبيه تجريبي 1', 'time' => 'منذ دقيقة'],
            ['id' => 2, 'text' => 'تنبيه تجريبي 2', 'time' => 'منذ 5 دقائق'],
        ];

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => 2
        ]);
    }

    public function readAll(Request $request)
    {
        // Mark all as read
        return response()->json([
            'success' => true,
            'message' => 'تم تحديد الكل كمقروء'
        ]);
    }
}
