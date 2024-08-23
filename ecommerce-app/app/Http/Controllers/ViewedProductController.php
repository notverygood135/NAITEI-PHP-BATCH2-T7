<?php

namespace App\Http\Controllers;

use App\Models\ViewedProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $viewedProducts = ViewedProduct::join('products', 'viewed_products.product_id', '=', 'products.id')
            ->get(['products.*']);

        return view('viewed-products.index', [
            'viewedProducts' => $viewedProducts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ViewedProduct $viewedProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ViewedProduct $viewedProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ViewedProduct $viewedProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ViewedProduct $viewedProduct)
    {
        //
    }
}
