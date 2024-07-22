<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authmanager;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


Route::get('/home', function () {return view('home');})->name('dashboard');
Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [ProductController::class, 'nCount'])->name('home');



Route::get('/login',[Authmanager::class, 'login'])->name('login');
Route::post('/login',[Authmanager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [Authmanager::class, 'registration'])->name('registration');
Route::post('/registeration',[Authmanager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout',[Authmanager::class, 'logout'])->name('logout');

Route::get('/upload',[UploadController::class, 'upload'])->name('upload');
Route::post('/upload',[UploadController::class, 'uploadPost'])->name('upload.post');

Route::get('/category',[ProductController::class, 'productcategory'])->name('category');
Route::post('/category',[ProductController::class, 'productCategoryPost'])->name('category.post');

Route::get('/manageCategory',[ProductController::class, 'manageCategories'])->name('managecat');
Route::get('/edit-category/{id}',[ProductController::class, 'editCategory']);
Route::post('/updatecategory/{id}',[ProductController::class, 'editCategoryPost'])->name('editcategory.post');

Route::get('/deletecategory/{id}',[ProductController::class, 'deleteCategory']);

// product

Route::get('/addProduct',[ProductController::class, 'addProduct'])->name('add product');
Route::post('/addProduct',[ProductController::class, 'addProductPost'])->name('addProduct.post');
Route::get('/manageProducts',[ProductController::class, 'viewproducts'])->name('manage products');
Route::get('/editProduct/{id}',[ProductController::class, 'editProduct']);
Route::get('/deleteProduct/{id}',[ProductController::class, 'deleteProduct']); 
Route::post('/updateproduct/{id}',[ProductController::class, 'editProductPost'])->name('editproduct.post');

// cart
Route::get('/store/{id}',[CartController::class, 'store'])->name('cart.store');
Route::get('/cartContent',[CartController::class, 'cartContent'])->name('cartContent');


Route::get('/admin',[CartController::class, 'test']);


