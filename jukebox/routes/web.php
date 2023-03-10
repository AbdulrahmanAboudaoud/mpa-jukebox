<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlaylistController;

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
Route::get('/playlists',[PlaylistController::class,'playListsIndex'])->middleware('isLoggedIn');

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/song/{id}', 'App\Http\Controllers\SongController@index');
Route::post('add-playlist', [PlaylistController::class, 'createPlayList']);
Route::post('add-Song', [PlaylistController::class, 'addSong']);
Route::get('delete-Playlist/{id}', 'App\Http\Controllers\PlaylistController@deletePlaylist');
Route::get('delete-Playlist-song/{id}/{list}', 'App\Http\Controllers\PlaylistController@deletePlaylistSong');
Route::get('delete-Playlists/{list}', 'App\Http\Controllers\PlaylistController@deleteList');
Route::post('update-Playlists', 'App\Http\Controllers\PlaylistController@updateList');
Route::post('add-Song-to-playlist', 'App\Http\Controllers\PlaylistController@addSongToPlaylist');
Route::get('calculate/{id}', 'App\Http\Controllers\PlaylistController@calculatDuration');

Route::post('save-Playlist', 'App\Http\Controllers\PlaylistController@savePlaylist');

