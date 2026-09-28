<?php

use Illuminate\Support\Facades\Route;

Route::get('/helluuww', function () {
    return ('welcome');
});

use App\Http\Controllers\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/kasir/transaksi', [KasirController::class, 'index']);

Route::post('/kasir/transaksi', [KasirController::class, 'store']);

Route::get('/about', function () {
    return '<h1>Profil Toko POS</h1>
            <p>Selamat datang di Toko Serba Ada. Kami menyediakan berbagai kebutuhan harian Anda 
            dengan harga terjangkau dan pelayanan terbaik.</p>';
});


use App\Http\Controllers\Auth\LoginController;
 
Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');
 
Route::post('/login', [LoginController::class, 'store'])
    
    ->middleware('guest')
    ->name('login.store');
 
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('report.sales');
});
 
Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos', [PosController::class, 'store'])->name('pos.store');
});

use App\Http\Controllers\UserController;

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

use App\Http\Controllers\CategoryController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

Route::get('/index', function(){
    $posts =[
        (object)['title' => 'Belajar blade', 'published' => true],
        (object)['title' => 'Praktikum lima', 'published' => false],
        (object)['title' => 'Masih bingung', 'published' => true],
        (object)['created_at' => 24102006],
    ];
    return view('posts.index', compact('posts'));
});

Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('/pos/history', function () {
        return 'Halaman Riwayat Transaksi Saya';
    })->name('pos.history');
});