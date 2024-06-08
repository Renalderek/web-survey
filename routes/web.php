<?php

// use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SesiController;

// Route::get('/admin', function () {
//     return view('pages/adminform');
// });
// Route::get('/login', function () {
//     return view('Login/login');
// });
// Route::get('/kuisioner', function () {
//     return view('kuisioner');
// });
// Route::get('/form', function () {
//     return view('pages/formbidang');
// });

// Route::get('/login', [LoginController::class, 'index']);
// Route::post('/login', [LoginController::class, 'login']);
// Route::resource('surveys', SurveyController::class);
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


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

    Route::get('/admin/bidang', [AdminController::class, 'showBidangForm'])->name('admin.bidang');
    Route::post('/admin/bidang', [AdminController::class, 'storeBidang'])->name('admin.bidang.store');

    Route::get('/admin/layanan', [AdminController::class, 'showLayananForm'])->name('admin.layanan');
    Route::post('/admin/layanan', [AdminController::class, 'storeLayanan'])->name('admin.layanan.store');

    Route::get('/admin/kuisioner', [AdminController::class, 'showKuisionerForm'])->name('admin.kuisioner');
    Route::post('/admin/kuisioner', [AdminController::class, 'storeKuisioner'])->name('admin.kuisioner.store');

    //grafik admin


    // Route lainnya

    // Route::get('/admin/grafik', [AdminController::class, 'showGrafik'])->name('admin.grafik');
});
