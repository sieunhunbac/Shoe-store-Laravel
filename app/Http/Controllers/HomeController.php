<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::active()
            ->whereNotNull('sale_price')
            ->with('category')
            ->take(4)
            ->get();

        $newArrivals = Product::active()
            ->with('category')
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::withCount('products')->get();

        return view('home', compact('featuredProducts', 'newArrivals', 'categories'));
    }
}
