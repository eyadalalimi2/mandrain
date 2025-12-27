<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        // Return view for messages
        return view('admin.messages.index');
    }

    public function latest()
    {
        // Return latest 5 messages as JSON
        // Placeholder data
        $messages = [
            ['id' => 1, 'sender' => 'User1', 'snippet' => 'رسالة تجريبية 1', 'time' => 'منذ دقيقة'],
            ['id' => 2, 'sender' => 'User2', 'snippet' => 'رسالة تجريبية 2', 'time' => 'منذ 5 دقائق'],
        ];

        return response()->json([
            'messages' => $messages,
            'unread_count' => 2
        ]);
    }
}
