<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AlmaceneController;


Route::get('/almacene', [AlmaceneController::class, 'index'])->name('almacene.index');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'verify' => true
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::resource('almacenes', App\Http\Controllers\AlmaceneController::class);
Route::resource('productos', App\Http\Controllers\ProductoController::class);