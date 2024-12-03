<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/home', function () {
//     return view('home');
// })->name('home');

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
