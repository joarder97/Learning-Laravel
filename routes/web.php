<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use Illuminate\Http\Request;




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

Route::get('/', function () { // "/" means base url
    return view('welcome');
});

Route::get('/contact', [userController::class, 'contact']);


Auth::routes();

Route::post('/upload', [userController::class, 'uploadAvatar']);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
