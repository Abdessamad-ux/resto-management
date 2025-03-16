<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\PromoCodeController;

Route::prefix('admin')->name('admin.')->group(function () {
    // Routes publiques (accessibles sans authentification)
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AdminAuthController::class, 'register']);

    // Routes protégées par le middleware auth:admin
    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Routes ressources pour la gestion des catégories, ingrédients et produits
        Route::resource('categories', CategoryController::class);
        Route::resource('ingredients', IngredientController::class);
        Route::resource('products', ProductController::class);

        // Routes pour la gestion des codes promos
        Route::prefix('promo-codes')->name('promo-codes.')->group(function () {
            Route::get('/', [PromoCodeController::class, 'index'])->name('index');
            Route::post('/', [PromoCodeController::class, 'store'])->name('store');
            Route::delete('/{promoCode}', [PromoCodeController::class, 'destroy'])->name('destroy');
            Route::patch('/{promoCode}/toggle', [PromoCodeController::class, 'toggleActive'])->name('toggle');
        });
    });
});