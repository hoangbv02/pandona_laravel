<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\HomeController as ClientHomeController;
use App\Http\Controllers\client\ProductController as ClientProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [ClientHomeController::class, 'index'])->name('index');
Route::get('search', [ClientHomeController::class, 'search'])->name('search');
Route::get('info', [ClientHomeController::class, 'info'])->name('info');
Route::get('info/cancel/{id}', [OrderController::class, 'orderCancel'])->name('order-cancel');
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'addPost'])->name('register-post');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login-post');
Route::get('logout/{auth}', [LoginController::class, 'logout'])->name('logout');
Route::get('products/{id?}', [ClientProductController::class, 'index'])->name('products');
Route::get('product-list', [ClientProductController::class, 'productList'])->name('product-list');
Route::get('product_details/pay', [CartController::class, 'payGet'])->name('pay');
Route::get('product_details/{id}', [ClientProductController::class, 'productDetails'])->name('product-details');
Route::prefix('carts')->name('carts.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/pay', [CartController::class, 'pay'])->name('pay');
    Route::get('/up/{id}', [CartController::class, 'upQuantity'])->name('up');
    Route::get('/down/{id}', [CartController::class, 'downQuantity'])->name('down');
    Route::post('/add/{id}', [CartController::class, 'addCart'])->name('add');
    Route::get('/delete-all', [CartController::class, 'deleteAllCart'])->name('delete-all');
    Route::get('/delete/{id}', [CartController::class, 'delete'])->name('delete');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/report', [HomeController::class, 'report'])->name('report');
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/add', [UserController::class, 'addGet'])->name('add');
        Route::post('/add', [UserController::class, 'addPost'])->name('add-post');
        Route::get('/edit/{id}', [UserController::class, 'editGet'])->name('edit');
        Route::post('/edit/{id}', [UserController::class, 'editPost'])->name('edit-post');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
        Route::get('/search/{page}', [UserController::class, 'search'])->name('search');
        Route::get('/{page}', [UserController::class, 'index'])->name('index');
    });
    Route::prefix('categorys')->name('categorys.')->group(function () {
        Route::get('/add', [CategoryController::class, 'addGet'])->name('add');
        Route::post('/add', [CategoryController::class, 'addPost'])->name('add-post');
        Route::get('/edit/{id}', [CategoryController::class, 'editGet'])->name('edit');
        Route::post('/edit/{id}', [CategoryController::class, 'editPost'])->name('edit-post');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        Route::get('/search', [CategoryController::class, 'search'])->name('search');
        Route::get('/{page}', [CategoryController::class, 'index'])->name('index');
    });
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/add', [ProductController::class, 'addGet'])->name('add');
        Route::post('/add', [ProductController::class, 'addPost'])->name('add-post');
        Route::get('/edit/{id}', [ProductController::class, 'editGet'])->name('edit');
        Route::post('/edit/{id}', [ProductController::class, 'editPost'])->name('edit-post');
        Route::get('/delete/{id}/{image}', [ProductController::class, 'delete'])->name('delete');
        Route::get('/search', [ProductController::class, 'search'])->name('search');
        Route::get('/{page}', [ProductController::class, 'index'])->name('index');
    });
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/add', [OrderController::class, 'addGet'])->name('add');
        Route::post('/add', [OrderController::class, 'addPost'])->name('add-post');
        Route::get('/edit/{id}', [OrderController::class, 'editGet'])->name('edit');
        Route::post('/edit/{id}', [OrderController::class, 'editPost'])->name('edit-post');
        Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('delete');
        Route::get('/details/{id}', [OrderController::class, 'details'])->name('details');
        Route::get('/search', [OrderController::class, 'search'])->name('search');
        Route::get('/{page}', [OrderController::class, 'index'])->name('index');
    });
});
