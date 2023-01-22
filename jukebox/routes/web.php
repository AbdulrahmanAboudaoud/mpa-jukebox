<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[CustomerAuthController::class,'login']);
Route::get('/registration',[CustomerAuthController::class,'registration']);
Route::post('/register-user',[CustomerAuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[CustomerAuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard',[CustomerAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[CustomerAuthController::class,'logout']);


Route::get('/category', [CategoryController::class, 'index']);

Route::get('/song/{id}', 'App\Http\Controllers\SongController@index');