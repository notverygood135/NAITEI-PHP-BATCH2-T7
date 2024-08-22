<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Rest of the code...


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Rest of the code...


// Simulated product data
// Simulated product data with categories
$products = [
    1 => [
        'name' => 'Cup',
        'description' => 'Beautiful and elegant cup.',
        'price' => 15.00,
        'rating' => 4,
        'ratings_count' => 150,
        'category' => 'Kitchen',
        'image' => 'https://plus.unsplash.com/premium_photo-1668972393852-4c1adf9687c3?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Y3VwfGVufDB8fDB8fHww',
    ],
    2 => [
        'name' => 'Hanger',
        'description' => 'Stylish and modern hanger.',
        'price' => 12.00,
        'rating' => 5,
        'ratings_count' => 200,
        'category' => 'Furniture',
        'image' => 'https://plus.unsplash.com/premium_photo-1677838847509-0828c90e2848?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aGFuZ2VyfGVufDB8fDB8fHww',
    ],
    3 => [
        'name' => 'Fan',
        'description' => 'Cool breeze with modern design.',
        'price' => 25.00,
        'rating' => 3,
        'ratings_count' => 85,
        'category' => 'Electronics',
        'image' => 'https://images.unsplash.com/photo-1528293064916-02c0435e416d?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8ZmFufGVufDB8fDB8fHww',
    ],
    4 => [
        'name' => 'Sofa',
        'description' => 'Comfortable and modern sofa.',
        'price' => 400.00,
        'rating' => 5,
        'ratings_count' => 230,
        'category' => 'Furniture',
        'image' => 'https://plus.unsplash.com/premium_photo-1681449856688-2abd99ab5a73?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8c29mYXxlbnwwfHwwfHx8MA%3D%3D',
    ],
    5 => [
        'name' => 'Laptop',
        'description' => 'High-performance laptop for work and gaming.',
        'price' => 1200.00,
        'rating' => 4,
        'ratings_count' => 310,
        'category' => 'Electronics',
        'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8bGFwdG9wfGVufDB8fDB8fHww',
    ],
    6 => [
        'name' => 'Table Lamp',
        'description' => 'Modern and stylish table lamp.',
        'price' => 45.00,
        'rating' => 4,
        'ratings_count' => 50,
        'category' => 'Furniture',
        'image' => 'https://plus.unsplash.com/premium_photo-1681412205156-bb506a4ea970?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8dGFibGUlMjBsYW1wfGVufDB8fDB8fHww',
    ],
    7 => [
        'name' => 'Smartphone',
        'description' => 'Latest model with top-notch features.',
        'price' => 899.00,
        'rating' => 5,
        'ratings_count' => 500,
        'category' => 'Electronics',
        'image' => 'https://images.unsplash.com/photo-1720048171731-15b3d9d5473f?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxzZWFyY2h8MXx8c21hcnRwaG9uZXxlbnwwfHwwfHx8MA%3D%3D',
    ],
    8 => [
        'name' => 'Microwave',
        'description' => 'Quick and easy cooking with this microwave.',
        'price' => 200.00,
        'rating' => 4,
        'ratings_count' => 190,
        'category' => 'Kitchen',
        'image' => 'https://images.unsplash.com/photo-1693786229416-2dd310137f18?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8bWljcm93YXZlfGVufDB8fDB8fHww',
    ],
    9 => [
        'name' => 'Dining Table',
        'description' => 'Elegant wooden dining table.',
        'price' => 650.00,
        'rating' => 5,
        'ratings_count' => 120,
        'category' => 'Furniture',
        'image' => 'https://plus.unsplash.com/premium_photo-1675744019321-f90d6d719da7?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8ZGluaW5nJTIwdGFibGV8ZW58MHx8MHx8fDA%3D',
    ],
    10 => [
        'name' => 'Headphones',
        'description' => 'Noise-cancelling over-ear headphones.',
        'price' => 199.00,
        'rating' => 4,
        'ratings_count' => 340,
        'category' => 'Electronics',
        'image' => 'https://plus.unsplash.com/premium_photo-1679513691474-73102089c117?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aGVhZHBob25lfGVufDB8fDB8fHww',
    ],
    11 => [
        'name' => 'Blender',
        'description' => 'Powerful and efficient blender.',
        'price' => 90.00,
        'rating' => 4,
        'ratings_count' => 210,
        'category' => 'Kitchen',
        'image' => 'https://plus.unsplash.com/premium_photo-1663853294058-3f85f18a4bed?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8YmxlbmRlcnxlbnwwfHwwfHx8MA%3D%3D',
    ],
    12 => [
        'name' => 'Desk Chair',
        'description' => 'Ergonomic desk chair for long working hours.',
        'price' => 250.00,
        'rating' => 5,
        'ratings_count' => 175,
        'category' => 'Furniture',
        'image' => 'https://plus.unsplash.com/premium_photo-1664699099351-4364a337288c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8ZGVzayUyMGNoYWlyfGVufDB8fDB8fHww',
    ],
    13 => [
        'name' => 'Coffee Maker',
        'description' => 'Brew your perfect cup of coffee every morning.',
        'price' => 120.00,
        'rating' => 5,
        'ratings_count' => 130,
        'category' => 'Kitchen',
        'image' => 'https://plus.unsplash.com/premium_photo-1663011334275-4201e7b18921?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Y29mZmVlJTIwbWFrZXJ8ZW58MHx8MHx8fDA%3D',
    ],
    14 => [
        'name' => 'Refrigerator',
        'description' => 'Spacious and energy-efficient refrigerator.',
        'price' => 1500.00,
        'rating' => 4,
        'ratings_count' => 90,
        'category' => 'Kitchen',
        'image' => 'https://images.unsplash.com/photo-1536353284924-9220c464e262?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZnJpZGdlfGVufDB8fDB8fHww',
    ],
    15 => [
        'name' => 'TV',
        'description' => 'Large screen TV with 4K resolution.',
        'price' => 1000.00,
        'rating' => 4,
        'ratings_count' => 330,
        'category' => 'Electronics',
        'image' => 'https://plus.unsplash.com/premium_photo-1681236323432-3df82be0c1b0?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8VFZ8ZW58MHx8MHx8fDA%3D',
    ],
];


// Simulated feedback data
$feedbacks = [
    1 => [
        ['text' => 'Great cup, very sturdy and looks amazing!', 'rating' => 5],
        ['text' => 'Good quality but a bit expensive.', 'rating' => 4],
    ],
    2 => [
        ['text' => 'The hanger is very strong and durable.', 'rating' => 5],
        ['text' => 'Stylish design but not as strong as expected.', 'rating' => 3],
    ],
    3 => [
        ['text' => 'The fan works well but is a bit noisy.', 'rating' => 3],
        ['text' => 'Keeps me cool during hot days, worth the price.', 'rating' => 4],
    ],
];

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // ->middleware(['auth', 'verified']);

// Route to display individual product details with feedback
Route::get('/product/{id}', function ($id) use ($products, $feedbacks) {
    // Check if the product exists
    if (!isset($products[$id])) {
        abort(404); // Return a 404 error if the product doesn't exist
    }

    $product = $products[$id];
    $productFeedbacks = $feedbacks[$id] ?? [];

    return view('product.show', ['product' => $product, 'feedbacks' => $productFeedbacks]);
})->name('product.show');

// Profile management routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin', function () {
        // Dummy data for the admin view
        $users = User::all();

        $categories = [
            1 => ['id' => 1, 'name' => 'Electronics'],
            2 => ['id' => 2, 'name' => 'Furniture'],
        ];

        $products = [
            ['id' => 1, 'name' => 'Laptop', 'price' => '$1200', 'category_id' => 1],
            ['id' => 2, 'name' => 'Chair', 'price' => '$100', 'category_id' => 2],
            ['id' => 3, 'name' => 'Smartphone', 'price' => '$800', 'category_id' => 1],
        ];

        return view('admin', ['users' => $users, 'categories' => $categories, 'products' => $products]);
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::resource('products', ProductController::class);   
});

require __DIR__.'/auth.php';
