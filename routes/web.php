<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\SparepartController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Kasir\DashboardController as KasirDashboard;
use App\Http\Controllers\Kasir\TransactionController;



Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'form'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTE
|--------------------------------------------------------------------------
*/
Route::middleware('auth.custom')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | KASIR
    |--------------------------------------------------------------------------
    */
    Route::prefix('kasir')->middleware('role:kasir')->group(function () {
        Route::get('/', [KasirDashboard::class, 'index']);

        // transaksi
        Route::get('/transaksi', [TransactionController::class, 'create']);
        Route::post('/transaksi', [TransactionController::class, 'store']);

        // invoice (kasir)
        Route::get('/invoice/{id}', [TransactionController::class, 'invoice']);
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->middleware('role:admin')->group(function () {

        // dashboard + history pembayaran
        Route::get('/', [AdminDashboard::class, 'index']);

        // 🔥 HISTORY PEMBAYARAN (LIST)
        Route::get('/transaksi', [AdminDashboard::class, 'transactions'])
            ->name('admin.transaksi');

        // 🔥 DETAIL TRANSAKSI / INVOICE (ADMIN)
        Route::get('/transaksi/{id}', [AdminDashboard::class, 'show'])
            ->name('admin.transaksi.show');

        // sparepart (CRUD)
        Route::resource('/sparepart', SparepartController::class);

        // setting biaya jasa
        Route::get('/setting', [SettingController::class, 'index']);
        Route::post('/setting', [SettingController::class, 'update']);
    });

});
