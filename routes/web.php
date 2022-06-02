<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\User\UserController;
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


Route::get('/', [HomeController::class, 'home'])->name('home');
//AUTH ROUTES

//register
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'store']);


//login
Route::get('login', [LoginController::class, 'login']);
Route::post('login', [LoginController::class, 'store'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//Api
Route::get('/users/upload', [UserController::class, 'upload']);
Route::post('/users/upload/create', [UserController::class, 'fromFile']);

Route::group(['middleware' => ['auth']], function () {

    Route::get('home', [HomeController::class, 'home'])->name('home');
    Route::get('home/menu', [HomeController::class, 'locationMenu']);
    Route::get('home/create', [HomeController::class, 'create']);
    Route::get('home/date', [HomeController::class, 'dateTable']);
    Route::get('home/ubicationtable', [HomeController::class, 'ubicationtable']);
    Route::post('home/store', [HomeController::class, 'store']);
    Route::get('home/show/{id}', [HomeController::class, 'showRev']);
    Route::put('home/{id}', [HomeController::class, 'update']);
    Route::delete('home/{id}', [HomeController::class, 'delete']);

    //User
    Route::get('/users/menu', [UserController::class, 'locationMenu']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('/users/create', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'detail']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::get('/users/{id}/editpass', [UserController::class, 'editPassword']);
    Route::put('/users/{id}/pass', [UserController::class, 'updatePassword']);
    Route::delete('/users/{id}', [UserController::class, 'deleteOrResotore']);
});
