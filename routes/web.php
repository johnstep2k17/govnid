<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// --------------------
// Public routes
// --------------------

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth pages
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'doRegister']);

// --------------------
// Protected routes
// --------------------
Route::middleware('auth')->group(function () {

    // ----- User -----
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::post('/user/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');

    // ----- Admin -----
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');

    Route::post('/admin/delete/{id}', [AdminController::class, 'softDelete'])->name('admin.users.delete');
    Route::post('/admin/restore/{id}', [AdminController::class, 'restore'])->name('admin.users.restore');
    Route::post('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    // // Audit logs
    Route::get('/admin/audit', [AdminController::class, 'audit'])->name('admin.audit');

});
