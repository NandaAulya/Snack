<?php

use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SnackController;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/maps', [HomeController::class, 'maps'])->name('maps');

// Route::get('/maps', function () {
//     return view('maps');
// });

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/admin', [AdminController::class, 'Dashboard'])->name('adminDashboard');
Route::get('/Nadmn',[AdminController::class, 'tampil'])->name('nadmn.tampil');
Route::get('/Nadmn/tambah',[AdminController::class, 'tambah'])->name('nadmn.tambah');
Route::post('/Nadmn/submit',[AdminController::class, 'submit'])->name('nadmn.submit');
Route::get('/Nadmn/update{id}',[AdminController::class, 'update'])->name('nadmn.update');
Route::post('/Nadmn/edit{id}',[AdminController::class, 'edit'])->name('nadmn.edit');
Route::get('/Nadmn/delete{id}',[AdminController::class, 'delete'])->name('nadmn.delete');

Route::get('/snack', [SnackController::class, 'tampilSnack'])->name('nadmn.tampilSnack');
Route::get('/snack/tambahSnack', [SnackController::class, 'tambahSnack'])->name('nadmn.tambahSnack');
Route::post('/snack/submitSnack', [SnackController::class, 'submitSnack'])->name('nadmn.submitSnack');
Route::get('/snack/updateSnack/{id}', [SnackController::class, 'updateSnack'])->name('nadmn.updateSnack');
Route::post('/snack/editSnack/{id}', [SnackController::class, 'editSnack'])->name('nadmn.editSnack');
Route::get('/snack/deleteSnack/{id}', [SnackController::class, 'deleteSnack'])->name('nadmn.deleteSnack');

Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/google', 'googleLogin')->name('auth.google');
    Route::get('auth/callback', 'googleAutentication');
});
