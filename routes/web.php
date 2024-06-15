<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\OrderController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\MenuController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\CustomerController;


Route::prefix('web')->group(function() {
    Route::get('/', [WebController::class, 'out'])->name('web.out');

    Route::get('/logged/{id}', [WebController::class, 'index'])->name('web');
    
    Route::get('/logged/{id_Log}/category/{id_Type}', [WebController::class, 'category'])->name('web.category');

    Route::get('/category/{id_Type}', [WebController::class, 'categoryOut'])->name('web.category.out');

    Route::get('/gioithieu', function () { return view('web.gioithieu'); })->name('web.about');

    Route::get('/contact', function () { return view('web.contact'); })->name('web.contact');

    Route::get('/logged/{id_cus}/product/{id_pro}', [WebController::class, 'product'])->name('web.product');
});

Route::prefix('cart')->group(function() {

    Route::get('/{id}', [CartController::class, 'index'])->name('cart');
    
    Route::post('/{id}/add}', [CartController::class, 'add'])->name('cart.add');

    Route::post('/{id}/update', [CartController::class, 'update'])->name('cart.update');
    
    Route::post('/{id}/delete', [CartController::class, 'delete'])->name('cart.delete');

});

Route::prefix('order')->group(function() {

    Route::get('/{id}', [OrderController::class, 'index'])->name('order');

    Route::get('/{id}/pay', [OrderController::class, 'order'])->name('order.pay');

});

Route::get('admin/users/login', [LoginController::class,'index']);
Route::post('admin/users/login/store', [LoginController::class,'store'])->name('login.store');

#Customer
Route::get('/', [CustomerController::class,'index'])->name('customer.login');
Route::post('/login', [CustomerController::class,'login'])->name('customer.login.store');
Route::post('/register', [CustomerController::class,'store'])->name('customer.register.store');
Route::get('/register', [CustomerController::class,'create'])->name('customer.register');


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function(){
        Route::get('/', [DashboardController::class,'index'])->name('dashboard');
        Route::get('main', [DashboardController::class,'index']);

        #Menu
        Route::prefix('menus')->group(function(){
           Route::get('add',[MenuController::class, 'create'])->name('admin.menus.add');
           Route::post('add',[MenuController::class, 'store']);
           Route::get('list',[MenuController::class, 'index'])->name('admin.menus.list');
           Route::delete('destroy',[MenuController::class, 'destroy']);
           Route::get('edit/{menu}',[MenuController::class, 'show']);
           Route::post('edit/{menu}',[MenuController::class, 'update']);
        });

        #Product
        Route::prefix('products')->group(function (){
            Route::get('add',[ProductController::class, 'create'])->name('admin.products.add');
            Route::post('add',[ProductController::class, 'store']);
            Route::get('list',[ProductController::class, 'index'])->name('admin.products.list');
            Route::get('edit/{product}',[ProductController::class, 'show']);
            Route::post('edit/{product}',[ProductController::class, 'update']);
            Route::delete('destroy',[ProductController::class, 'destroy'])->name('admin.products.destroy');
        });

        #Customer
        Route::prefix('customers')->group(function (){
            Route::get('list',[CustomerController::class, 'show'])->name('admin.customers.list');
            Route::get('edit/{customer}',[CustomerController::class, 'edit']);
            Route::post('edit/{customer}',[CustomerController::class, 'update']);
            Route::delete('destroy',[CustomerController::class, 'destroy'])->name('admin.customers.destroy');
        });

        #Cart
        Route::prefix('carts')->group(function (){
            Route::get('list',[CartController::class, 'index'])->name('admin.carts.list');
            Route::get('view/{customer}',[CartController::class, 'view']);
            Route::delete('destroy',[CartController::class, 'destroy'])->name('admin.carts.destroy');
        });
    });
});

