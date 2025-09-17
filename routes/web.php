<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

// Registration (optional but useful)
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'doRegister']);

Route::middleware('auth')->group(function () {
    // User
    Route::get('/user/dashboard', [UserController::class, 'dashboard']);
    Route::post('/user/profile', [UserController::class, 'updateProfile']);

    // Admin
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/users/create', [AdminController::class, 'createUser']);
    Route::post('/admin/users', [AdminController::class, 'storeUser']);
    Route::post('/admin/delete/{id}', [AdminController::class, 'softDelete']);
    Route::post('/admin/restore/{id}', [AdminController::class, 'restore']);
    Route::post('/admin/profile', [AdminController::class, 'updateProfile']);

    // 🔽 Simple audit log viewer
    Route::get('/admin/audit', function () {
        $logs = \App\Models\AuditLog::latest()->take(200)->get();
        return view('admin.audit', compact('logs'));
    });
});


