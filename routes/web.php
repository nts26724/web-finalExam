<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

