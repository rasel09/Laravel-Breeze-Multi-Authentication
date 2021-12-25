<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SellerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ------------------------------ Admin Route -------------------  */

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'index'])->name('login_form');
    Route::get('/dashbord', [AdminController::class, 'dashbord'])->name('admin.dashbord')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout')->middleware('admin');
    Route::post('/login/owner', [AdminController::class, 'login'])->name('admin.login');
});

/* ------------------------------ Admin Route -------------------  */


/* ------------------------------ Seller Route -------------------  */

Route::prefix('seller')->group(function () {
    Route::get('/login', [SellerController::class, 'index'])->name('seller_login_form');
    Route::get('/dashbord', [SellerController::class, 'dashbord'])->name('seller.dashbord')->middleware('seller');
    Route::get('/logout', [SellerController::class, 'sellerLogout'])->name('seller.logout')->middleware('seller');
    Route::post('/login/owner', [SellerController::class, 'login'])->name('seller.login');
});

/* ------------------------------ Seller Route -------------------  */



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';