<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ToolsController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\ProfileController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Tools
    Route::post('/tools/clear-cache', [ToolsController::class, 'clearCache'])->name('tools.clear-cache');

    // Messages
    Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');
    Route::get('/messages/latest', [MessagesController::class, 'latest'])->name('messages.latest');

    // Notifications
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/latest', [NotificationsController::class, 'latest'])->name('notifications.latest');
    Route::post('/notifications/read-all', [NotificationsController::class, 'readAll'])->name('notifications.read-all');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');
});
