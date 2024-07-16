<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authmanager;
use App\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('home');
    
})->name('home');
Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/login',[Authmanager::class, 'login'])->name('login');
Route::post('/login',[Authmanager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [Authmanager::class, 'registration'])->name('registration');
Route::post('/registeration',[Authmanager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout',[Authmanager::class, 'logout'])->name('logout');

Route::get('/upload',[UploadController::class, 'upload'])->name('upload');
Route::post('/upload',[UploadController::class, 'uploadPost'])->name('upload.post');
