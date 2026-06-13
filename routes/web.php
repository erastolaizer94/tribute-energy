<?php

use Illuminate\Support\Facades\Route;

// Landing page
Route::get('/', function () {
    $featuredProducts = \App\Models\Product::where('is_featured', true)->where('is_active', true)->take(4)->get();
    $featuredGallery = \App\Models\Gallery::where('is_featured', true)->where('is_active', true)->orderBy('order')->take(6)->get();
    return view('landing', compact('featuredProducts', 'featuredGallery'));
})->name('home');

// Products page
Route::get('/products', function () {
    $products = \App\Models\Product::where('is_active', true)->get();
    return view('products', compact('products'));
})->name('products');

// Gallery page
Route::get('/gallery', function () {
    $gallery = \App\Models\Gallery::where('is_active', true)->orderBy('order')->get();
    return view('gallery', compact('gallery'));
})->name('gallery');

// Product detail page (SEO-friendly)
Route::get('/product/{id}', function ($id) {
    $product = \App\Models\Product::findOrFail($id);
    return view('product-detail', compact('product'));
})->name('product.detail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // Users management
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
            Route::get('/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('show');
            Route::get('/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
            Route::put('/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
            Route::delete('/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('destroy');
        });
        
        // Products management
        Route::prefix('products')->name('products.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store');
            Route::get('/{product}', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('show');
            Route::get('/{product}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
            Route::put('/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
            Route::delete('/{product}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('destroy');
        });
        
        // Gallery management
        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('store');
            Route::get('/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'show'])->name('show');
            Route::get('/{gallery}/edit', [App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('edit');
            Route::put('/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('update');
            Route::delete('/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('destroy');
        });
    });
});
