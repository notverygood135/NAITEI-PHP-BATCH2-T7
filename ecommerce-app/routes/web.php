<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserReviewController;
use App\Http\Middleware\CheckOwner;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Rest of the code...

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ViewedProductController;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Rest of the code...

// Simulated feedback data

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
// Profile management routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/viewed-products', [ViewedProductController::class, 'index'])->name('viewed-products.index');
});

Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/admin', function () {
        // Dummy data for the admin view
        $users = User::all();

        $categories = ProductCategory::all();

        $products = Product::join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->get(['products.*', 'product_categories.name AS category']);

        return view('admin', ['users' => $users, 'categories' => $categories, 'products' => $products]);
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/products/create', [CategoryController::class, 'create'])->name('products.create');
    Route::post('/products', [CategoryController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [CategoryController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [CategoryController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [CategoryController::class, 'destroy'])->name('products.destroy');
    // Route::resource('products', ProductController::class);   
});

Route::get('/products', [CategoryController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/review/create', [UserReviewController::class, 'create'])->name('review.create');
    Route::post('/review', [UserReviewController::class, 'store'])->name('review.store');
    Route::middleware([CheckOwner::class])->group(function () {
        Route::get('review/edit/{id}', [UserReviewController::class, 'edit'])->name('review.edit');
        Route::put('/review/{id}', [UserReviewController::class, 'update'])->name('review.update');
        Route::delete('/review/{id}', [UserReviewController::class, 'destroy'])->name('review.destroy');
    });
});

require __DIR__ . '/auth.php';
