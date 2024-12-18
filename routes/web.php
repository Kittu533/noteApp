<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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
Route::redirect("/",'/login');
Route::get('/post',[PostController::class ,'home'])->name('post#home');
Route::post('/post/create',[PostController::class ,'create'])->name('post#create');
Route::get('/post/show/{id}',[PostController::class ,'show'])->name('post#show');
Route::get('/post/edit/{id}',[PostController::class ,'edit'])->name('post#edit');
Route::post('/post/update/{id}',[PostController::class ,'update'])->name('post#update');
Route::get('/post/delete/{id}',[PostController::class ,'delete'])->name('post#delete');

// Menampilkan halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Menampilkan halaman register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
