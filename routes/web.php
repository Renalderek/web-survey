<?php

// use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


// Route untuk admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('bidang', AdminController::class);
    Route::resource('layanan', AdminController::class);
    Route::resource('kuisioner', AdminController::class);
});

// Route untuk user
Route::prefix('user')->group(function () {
    Route::get('/biodata', [UserController::class, 'biodataForm'])->name('user.biodata');
    Route::post('/biodata', [UserController::class, 'saveBiodata'])->name('user.save_biodata');

    Route::get('/bidang-layanan', [UserController::class, 'bidangLayananForm'])->name('user.bidang_layanan');
});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// user contoroller

Route::get('/user/biodata', [UserController::class, 'showBiodataForm'])->name('user.biodata');
Route::post('/user/biodata', [UserController::class, 'submitBiodata'])->name('user.biodata.submit');
Route::get('/user/bidang', [UserController::class, 'showBidangForm'])->name('user.bidang');
Route::post('/user/bidang', [UserController::class, 'submitBidang'])->name('user.bidang.submit');
Route::get('/user/layanan', [UserController::class, 'showLayananForm'])->name('user.layanan');
Route::post('/user/layanan', [UserController::class, 'submitLayanan'])->name('user.layanan.submit');
Route::get('/user/kuisioner', [UserController::class, 'showKuisionerForm'])->name('user.kuisioner');
Route::post('/user/kuisioner', [UserController::class, 'submitKuisioner'])->name('user.kuisioner.submit');
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');



    //admin
    // bidang routes

    Route::get('/admin/bidang/{id}/edit', [AdminController::class, 'editBidang'])->name('admin.bidang.edit');
    Route::put('/admin/bidang/{id}', [AdminController::class, 'updateBidang'])->name('admin.bidang.update');
    Route::get('/admin/bidang', [AdminController::class, 'showBidangForm'])->name('admin.bidang');
    Route::post('/admin/bidang', [AdminController::class, 'storeBidang'])->name('admin.bidang.store');
    Route::delete('/admin/bidang/{id}', [AdminController::class, 'destroyBidang'])->name('admin.bidang.delete');

    // layanan routes

    Route::get('/admin/layanan', [AdminController::class, 'showLayananForm'])->name('admin.layanan');
    Route::post('/admin/layanan', [AdminController::class, 'storeLayanan'])->name('admin.layanan.store');
    Route::get('/admin/layanan/{id}/edit', [AdminController::class, 'editLayanan'])->name('admin.layanan.edit');
    Route::put('/admin/layanan/{id}', [AdminController::class, 'updateLayanan'])->name('admin.layanan.update');
    Route::delete('/admin/layanan/{id}', [AdminController::class, 'destroyLayanan'])->name('admin.layanan.delete');

    // kuisioner routes

    Route::get('/admin/kuisioner', [AdminController::class, 'showKuisionerForm'])->name('admin.kuisioner');
    Route::post('/admin/kuisioner', [AdminController::class, 'storeKuisioner'])->name('admin.kuisioner.store');
    Route::get('/admin/kuisioner/{id}/edit', [AdminController::class, 'editKuisioner'])->name('admin.kuisioner.edit');
    Route::put('/admin/kuisioner/{id}', [AdminController::class, 'updateKuisioner'])->name('admin.kuisioner.update');
    Route::delete('/admin/kuisioner/{id}', [AdminController::class, 'destroyKuisioner'])->name('admin.kuisioner.delete');
    // routes/web.php





    //grafik admin


    // Route lainnya

    // Route::get('/admin/grafik', [AdminController::class, 'showGrafik'])->name('admin.grafik');
});
