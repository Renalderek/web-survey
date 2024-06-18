<?php

// use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\BidangController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\KuisionerController;


// Suggested code may be subject to a license. Learn more: ~LicenseLog:3661501165.
// Route untuk admin
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

// Route untuk user
Route::prefix('user')->group(function () {
    Route::get('/biodata', [UserController::class, 'biodataForm'])->name('user.biodata');
    Route::post('/biodata', [UserController::class, 'saveBiodata'])->name('user.save_biodata');

    Route::get('/bidang-layanan', [UserController::class, 'bidangLayananForm'])->name('user.bidang_layanan');
});


// user controller

Route::get('/user/biodata', [UserController::class, 'showBiodataForm'])->name('user.biodata');
Route::post('/user/biodata', [UserController::class, 'submitBiodata'])->name('user.biodata.submit');
Route::get('/user/bidang', [UserController::class, 'showBidangForm'])->name('user.bidang');
Route::post('/user/bidang', [UserController::class, 'submitBidang'])->name('user.bidang.submit');
Route::get('/user/layanan', [UserController::class, 'showLayananForm'])->name('user.layanan');
Route::post('/user/layanan', [UserController::class, 'submitLayanan'])->name('user.layanan.submit');
Route::get('/user/kuisioner', [UserController::class, 'showKuisionerForm'])->name('user.kuisioner');
Route::post('/user/kuisioner', [UserController::class, 'submitKuisioner'])->name('user.kuisioner.submit');

// admin login


Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login']);
Route::get('admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

// Bidang routes
Route::get('admin/bidang', [BidangController::class, 'showBidangForm'])->name('admin.bidang');
Route::post('admin/bidang', [BidangController::class, 'storeBidang'])->name('admin.bidang.store');
Route::get('admin/bidang/{id}/edit', [BidangController::class, 'editBidang'])->name('admin.bidang.edit');
Route::put('admin/bidang/{id}', [BidangController::class, 'updateBidang'])->name('admin.bidang.update');
Route::delete('admin/bidang/{id}', [BidangController::class, 'destroyBidang'])->name('admin.bidang.delete');

// Layanan routes
Route::get('admin/layanan', [LayananController::class, 'showLayananForm'])->name('admin.layanan');
Route::post('admin/layanan', [LayananController::class, 'storeLayanan'])->name('admin.layanan.store');
Route::get('admin/layanan/{id}/edit', [LayananController::class, 'editLayanan'])->name('admin.layanan.edit');
Route::put('admin/layanan/{id}', [LayananController::class, 'updateLayanan'])->name('admin.layanan.update');
Route::delete('admin/layanan/{id}', [LayananController::class, 'destroyLayanan'])->name('admin.layanan.delete');

// Kuisioner routes
Route::get('admin/kuisioner', [KuisionerController::class, 'showKuisionerForm'])->name('admin.kuisioner');
Route::post('admin/kuisioner', [KuisionerController::class, 'storeKuisioner'])->name('admin.kuisioner.store');
Route::get('admin/kuisioner/{id}/edit', [KuisionerController::class, 'editKuisioner'])->name('admin.kuisioner.edit');
Route::put('admin/kuisioner/{id}', [KuisionerController::class, 'updateKuisioner'])->name('admin.kuisioner.update');
Route::delete('admin/kuisioner/{id}', [KuisionerController::class, 'destroyKuisioner'])->name('admin.kuisioner.delete');

