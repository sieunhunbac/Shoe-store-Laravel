<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private function getCartQuery()
    {
        if (auth()->check()) {
            return Cart::where('user_id', auth()->id());
        }
        return Cart::where('session_id', session()->getId());
    }

    public function index()
    {
        $cartItems = $this->getCartQuery()->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            $price = $item->product->sale_price ?? $item->product->price;
            return $price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Check stock
        if ($product->stock < $request->quantity) {
            return back()->with('error', 'Not enough stock available.');
        }

        // Check for existing cart item with same product, size, color
        $existingItem = $this->getCartQuery()
            ->where('product_id', $request->product_id)
            ->where('size', $request->size)
            ->where('color', $request->color)
            ->first();

        if ($existingItem) {
            $newQuantity = $existingItem->quantity + $request->quantity;
            if ($newQuantity > $product->stock) {
                return back()->with('error', 'Cannot add more items. Stock limit reached.');
            }
            $existingItem->update(['quantity' => $newQuantity]);
        } else {
            Cart::create([
                'user_id' => auth()->check() ? auth()->id() : null,
                'session_id' => auth()->check() ? null : session()->getId(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'size' => $request->size,
                'color' => $request->color,
            ]);
        }

        return back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($cart->product_id);

        if ($request->quantity > $product->stock) {
            return back()->with('error', 'Quantity exceeds available stock.');
        }

        $cart->update(['quantity' => $request->quantity]);

        return back()->with('success', 'Cart updated.');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();
        return back()->with('success', 'Item removed from cart.');
    }
}
