<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\ProductCategory;
use App\Models\UserReview;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $userReviews = UserReview::all();
        return view('products.show', [
            'product' => $product,
            'userReviews' => $userReviews,
        ]);
    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $product = new Product($request->validated());

        if ($request->hasFile('image')) {
           $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        return view('admin.products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
