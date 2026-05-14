@extends('layouts.app')

@section('title', 'Shopping Cart - ShoeStore')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @if($cartItems->count() > 0)
        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Shopping Cart</h1>
                <p class="text-gray-500 mt-1">{{ $cartItems->sum('quantity') }} {{ $cartItems->sum('quantity') == 1 ? 'item' : 'items' }} in your cart</p>
            </div>
            <a href="{{ route('products.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 flex items-center gap-2 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Continue Shopping
            </a>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            {{-- Cart Items --}}
            <div class="lg:col-span-2 space-y-4">
                @foreach($cartItems as $item)
                    <div class="bg-white rounded-2xl border border-gray-100 p-4 shadow-sm">
                        <div class="flex items-start gap-4">
                            <a href="{{ route('products.show', $item->product->slug) }}" class="shrink-0">
                                <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}"
                                     class="w-24 h-24 object-cover rounded-xl bg-gray-100">
                            </a>

                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1 min-w-0 pr-4">
                                        <a href="{{ route('products.show', $item->product->slug) }}" class="font-semibold text-gray-900 hover:text-gray-600 transition-colors line-clamp-1">
                                            {{ $item->product->name }}
                                        </a>
                                        <div class="flex items-center gap-3 mt-1 text-sm text-gray-500">
                                            @if($item->size)
                                                <span>Size: {{ $item->size }}</span>
                                            @endif
                                            @if($item->color)
                                                <span>Color: {{ $item->color }}</span>
                                            @endif
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1">
                                            ${{ number_format($item->product->sale_price ?? $item->product->price, 2) }} each
                                        </p>
                                    </div>

                                    {{-- Remove --}}
                                    <form action="{{ route('cart.remove', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-500 p-1 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>

                                <div class="flex items-center justify-between mt-4">
                                    {{-- Quantity --}}
                                    <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center border border-gray-300 rounded-xl">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="quantity" value="{{ max(1, $item->quantity - 1) }}"
                                                class="px-3 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-l-xl transition-colors {{ $item->quantity <= 1 ? 'opacity-50 cursor-not-allowed' : '' }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                                        </button>
                                        <span class="px-4 py-2 text-center text-sm font-medium min-w-[48px]">{{ $item->quantity }}</span>
                                        <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}"
                                                class="px-3 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-r-xl transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                        </button>
                                    </form>

                                    {{-- Subtotal --}}
                                    <p class="text-lg font-bold text-gray-900">
                                        ${{ number_format(($item->product->sale_price ?? $item->product->price) * $item->quantity, 2) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Order Summary --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sticky top-24">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Summary</h2>

                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Subtotal ({{ $cartItems->sum('quantity') }} items)</span>
                            <span class="font-medium">${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Shipping</span>
                            <span class="font-medium {{ $total >= 50 ? 'text-green-600' : '' }}">
                                {{ $total >= 50 ? 'Free' : '$9.99' }}
                            </span>
                        </div>
                        <hr class="border-gray-200">
                        <div class="flex justify-between">
                            <span class="text-lg font-semibold">Total</span>
                            <span class="text-lg font-bold text-gray-900">${{ number_format($total + ($total >= 50 ? 0 : 9.99), 2) }}</span>
                        </div>
                    </div>

                    @if($total < 50)
                        <div class="bg-blue-50 rounded-xl p-3 mb-4 border border-blue-100">
                            <p class="text-sm text-blue-700">
                                🚚 Add ${{ number_format(50 - $total, 2) }} more for free shipping!
                            </p>
                        </div>
                    @endif

                    <a href="{{ route('checkout.index') }}"
                       class="block w-full bg-gray-900 text-white text-center py-3.5 rounded-xl font-semibold hover:bg-gray-800 transition-all duration-200 shadow-lg hover:shadow-xl">
                        Proceed to Checkout
                    </a>

                    <div class="mt-6 space-y-3 pt-4 border-t border-gray-100">
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            Secure checkout
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-500">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8"/></svg>
                            Free returns within 30 days
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- Empty Cart --}}
        <div class="text-center py-24">
            <svg class="w-24 h-24 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
            </svg>
            <h1 class="text-3xl font-bold text-gray-900 mb-3">Your cart is empty</h1>
            <p class="text-gray-500 text-lg mb-8">Looks like you haven't added anything yet.</p>
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 bg-gray-900 text-white px-8 py-3.5 rounded-xl font-semibold hover:bg-gray-800 transition-all shadow-lg">
                Continue Shopping
            </a>
        </div>
    @endif
</div>
@endsection
