<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\HomeController;
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


Route::get('/', [HomeController::class, 'home'])->name('home')->middleware('auth');
//AUTH ROUTES

//register
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'store']);


//login
Route::get('login', [LoginController::class, 'login']);
Route::post('login', [LoginController::class, 'store'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('home', [HomeController::class, 'home'])->name('home')->middleware('auth');
Route::get('home/menu', [HomeController::class, 'locationMenu'])->middleware('auth');
Route::get('home/create', [HomeController::class, 'create'])->middleware('auth');
Route::get('home/date', [HomeController::class, 'dateTable'])->middleware('auth');
Route::get('home/ubicationtable', [HomeController::class, 'ubicationtable'])->middleware('auth');
Route::post('home/store', [HomeController::class, 'store'])->middleware('auth');
Route::get('home/show/{id}', [HomeController::class, 'showRev'])->middleware('auth');
Route::put('home/{id}', [HomeController::class, 'update'])->middleware('auth');
Route::delete('home/{id}', [HomeController::class, 'delete'])->middleware('auth');
