@extends('layouts.app')

@section('title', 'Order Confirmed - ShoeStore')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="max-w-2xl mx-auto text-center">
        {{-- Success Icon --}}
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-gray-900 mb-3">Thank You For Your Order!</h1>
        <p class="text-gray-500 text-lg mb-8">Your order has been placed successfully.</p>

        {{-- Order Info --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 text-left mb-8">
            <div class="grid sm:grid-cols-2 gap-4 mb-6">
                <div>
                    <p class="text-sm text-gray-500">Order Number</p>
                    <p class="font-semibold text-gray-900">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Date</p>
                    <p class="font-semibold text-gray-900">{{ $order->created_at->format('M d, Y') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Amount</p>
                    <p class="font-semibold text-gray-900">${{ number_format($order->total_amount, 2) }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Payment Method</p>
                    <p class="font-semibold text-gray-900">{{ strtoupper($order->payment_method) }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Status</p>
                    <span class="inline-block px-3 py-1 text-sm font-medium rounded-full {{ $order->status_badge }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Shipping To</p>
                    <p class="font-semibold text-gray-900">{{ $order->customer_name }}</p>
                </div>
            </div>

            <hr class="border-gray-200 mb-4">

            <h3 class="font-semibold text-gray-900 mb-4">Order Items</h3>
            <div class="space-y-3">
                @foreach($order->items as $item)
                    <div class="flex items-center justify-between py-2">
                        <div>
                            <p class="font-medium text-gray-900">{{ $item->product_name }}</p>
                            <p class="text-sm text-gray-500">
                                Qty: {{ $item->quantity }}
                                @if($item->size) | Size: {{ $item->size }} @endif
                                @if($item->color) | Color: {{ $item->color }} @endif
                            </p>
                        </div>
                        <p class="font-semibold text-gray-900">${{ number_format($item->subtotal, 2) }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('products.index') }}" class="bg-gray-900 text-white px-8 py-3 rounded-xl font-semibold hover:bg-gray-800 transition-colors">
                Continue Shopping
            </a>
            @auth
                <a href="{{ route('orders.my') }}" class="border border-gray-300 text-gray-700 px-8 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-colors">
                    View My Orders
                </a>
            @endauth
        </div>
    </div>
</div>
@endsection
