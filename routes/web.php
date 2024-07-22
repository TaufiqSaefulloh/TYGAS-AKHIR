<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KategoridetailController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PendaftaranController;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Models\Pendaftaran;

// Rute untuk menampilkan form permintaan reset kata sandi
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Rute untuk mengirim email reset kata sandi
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Rute untuk menampilkan form reset kata sandi
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Rute untuk memperbarui kata sandi
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');



Route::middleware(['admin'])->group(function () {
    Route::resource('admin/kategoridetail', KategoridetailController::class);
    Route::resource('/admin/event', EventController::class);
    Route::resource('/admin/team', TeamController::class);
    Route::get('/admin/form', [FormController::class, 'tampilkan'])->name('form-pertanyaan');
    Route::delete('admin/form/{id}', [FormController::class, 'destroy'])->name('forms.destroy');
    Route::resource('admin/dashboard', AdminController::class);
    Route::resource('/admin/category', CategoryController::class);
    Route::resource('/admin/contact', ContactController::class);
    Route::resource('/admin/table', TableController::class);
    Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/pendaftaran', [FormController::class, 'tampil'])->name('form-pendaftaran');
    // routes/web.php
    Route::get('/pendaftaran/download', [FormController::class, 'download'])->name('pendaftaran.download');
});

Route::middleware(['user'])->group(function () {
    Route::get('/profil', [UserController::class, 'profil'])->name('profil');
    Route::put('/profil/{id}', [UserController::class, 'update_profil'])->name('update_profil');
    Route::put('/profil/password/{id}', [UserController::class, 'ubah_password'])->name('ubah_password');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/remove_profile_image', [UserController::class, 'remove_profile_image'])->name('remove_profile_image');
});


//All User
Route::get('/', function () {
    return redirect('/beranda');
});
Route::resource('/register', RegisterController::class);
Route::get('/login', [UserController::class, 'index'])->name('login.index');
Route::post('/login', [UserController::class, 'login'])->name('login.masuk');
Route::get('admin/login', [LoginController::class, 'index'])->name('admin.index');
Route::post('admin/login', [UserController::class, 'masuk'])->name('admin.masuk');

Route::get('/beranda', [PagesController::class, 'beranda'])->name('beranda');
Route::get('/pelatihan', [PagesController::class, 'pelatihan'])->name('pelatihan');
Route::get('/tentangkami', [PagesController::class, 'tentang'])->name('tentangkami');
Route::get('/bantuan', [PagesController::class, 'bantuan'])->name('bantuan');
Route::get('/event', [PagesController::class, 'event'])->name('event');
Route::get('/kategori', [PagesController::class, 'event'])->name('event');

Route::post('/bantuan', [FormController::class, 'store'])->name('store');
Route::get('/detailpelatihan/{id}', [PagesController::class, 'detailpelatihan'])->name('detailpelatihan');
Route::get('/detailkategori/{id}', [PagesController::class, 'detailkategori'])->name('detailkategori');
Route::get('/detailevent/{id}', [PagesController::class, 'detailevent'])->name('detailevent');

Route::get('pelatihan/{id}/materi/{materi}', [PagesController::class, 'materi'])->name('materi');
Route::get('/404', [PagesController::class, 'eror'])->name('eror');
Route::get('/pendaftaran', [PagesController::class, 'pendaftaran'])->name('pendaftaran');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('store');
