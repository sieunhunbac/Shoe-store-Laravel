<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function success($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('orders.success', compact('order'));
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('items')
            ->latest()
            ->paginate(10);

        return view('orders.my-orders', compact('orders'));
    }
}
