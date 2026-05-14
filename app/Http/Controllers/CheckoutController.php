<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
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

        if ($cartItems->isEmpty()) {
            return redirect('/cart')->with('error', 'Your cart is empty.');
        }

        $total = $cartItems->sum(function ($item) {
            $price = $item->product->sale_price ?? $item->product->price;
            return $price * $item->quantity;
        });

        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string|max:1000',
            'note' => 'nullable|string|max:500',
        ]);

        $cartItems = $this->getCartQuery()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect('/cart')->with('error', 'Your cart is empty.');
        }

        // Check stock before processing
        foreach ($cartItems as $item) {
            if ($item->product->stock < $item->quantity) {
                return back()->with('error', "Not enough stock for {$item->product->name}. Available: {$item->product->stock}");
            }
        }

        try {
            DB::beginTransaction();

            $totalAmount = $cartItems->sum(function ($item) {
                $price = $item->product->sale_price ?? $item->product->price;
                return $price * $item->quantity;
            });

            // Create order
            $order = Order::create([
                'user_id' => auth()->check() ? auth()->id() : null,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'payment_method' => 'cod',
                'note' => $request->note,
            ]);

            // Create order items and reduce stock
            foreach ($cartItems as $item) {
                $price = $item->product->sale_price ?? $item->product->price;
                $subtotal = $price * $item->quantity;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'product_price' => $price,
                    'quantity' => $item->quantity,
                    'size' => $item->size,
                    'color' => $item->color,
                    'subtotal' => $subtotal,
                ]);

                // Reduce stock
                $item->product->decrement('stock', $item->quantity);
            }

            // Clear cart
            $this->getCartQuery()->delete();

            DB::commit();

            return redirect("/orders/{$order->id}/success")->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while placing your order. Please try again.');
        }
    }
}
