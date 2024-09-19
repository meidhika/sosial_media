<?php
// Ini Merupakan Kumpulan Nama Controller Yang Dibutuhkan dalam Per Routingan
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;


// Route Untuk Login dan Register User/Account
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route Untuk Halaman Dashboard
Route::resource('dashboard', DashboardController::class);
Route::delete('post/softdelete/{id}', [DashboardController::class, 'softdelete'])->name('post.softdelete');

// Route Untuk Komentar
Route::resource('komentar', CommentController::class);
Route::delete('komentar/softdelete/{id}', [CommentController::class, 'softdelete'])->name('komentar.softdelete');


//  Route Untuk Profile
Route::resource('profile', UserController::class);

// Route untuk Mencari Tag maupun Hastag berdasarkan Post ataupun Komentar
Route::get('/search', [SearchController::class, 'search'])->name('search');
