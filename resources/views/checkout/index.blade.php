@extends('layouts.app')

@section('title', 'Checkout - ShoeStore')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Checkout</h1>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="grid lg:grid-cols-3 gap-8">
            {{-- Customer Info --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6">Shipping Information</h2>

                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="sm:col-span-2">
                            <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                            <input type="text" name="customer_name" id="customer_name" required
                                   value="{{ old('customer_name', auth()->user()->name ?? '') }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm">
                        </div>

                        <div>
                            <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="customer_email" id="customer_email" required
                                   value="{{ old('customer_email', auth()->user()->email ?? '') }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm">
                        </div>

                        <div>
                            <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                            <input type="text" name="customer_phone" id="customer_phone" required
                                   value="{{ old('customer_phone') }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm">
                        </div>

                        <div class="sm:col-span-2">
                            <label for="customer_address" class="block text-sm font-medium text-gray-700 mb-1">Shipping Address *</label>
                            <textarea name="customer_address" id="customer_address" rows="3" required
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm resize-none">{{ old('customer_address') }}</textarea>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="note" class="block text-sm font-medium text-gray-700 mb-1">Order Notes (optional)</label>
                            <textarea name="note" id="note" rows="2"
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm resize-none" placeholder="Any special requests...">{{ old('note') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Payment Method --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Payment Method</h2>
                    <label class="flex items-center gap-3 p-4 border-2 border-gray-900 rounded-xl bg-gray-50 cursor-pointer">
                        <input type="radio" name="payment_method" value="cod" checked class="text-gray-900 focus:ring-gray-900">
                        <div>
                            <p class="font-medium text-gray-900">Cash on Delivery (COD)</p>
                            <p class="text-sm text-gray-500">Pay when you receive your order</p>
                        </div>
                    </label>
                </div>
            </div>

            {{-- Order Summary --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sticky top-24">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Summary</h2>

                    <div class="space-y-4 mb-6">
                        @foreach($cartItems as $item)
                            <div class="flex items-center gap-3">
                                <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}"
                                     class="w-14 h-14 object-cover rounded-lg bg-gray-100">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 line-clamp-1">{{ $item->product->name }}</p>
                                    <p class="text-xs text-gray-500">Qty: {{ $item->quantity }}
                                        @if($item->size) | Size: {{ $item->size }} @endif
                                    </p>
                                </div>
                                <p class="text-sm font-semibold text-gray-900">
                                    ${{ number_format(($item->product->sale_price ?? $item->product->price) * $item->quantity, 2) }}
                                </p>
                            </div>
                        @endforeach
                    </div>

                    <hr class="border-gray-200 mb-4">

                    <div class="space-y-2 mb-6">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Subtotal</span>
                            <span class="font-medium">${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Shipping</span>
                            <span class="font-medium text-green-600">Free</span>
                        </div>
                        <hr class="border-gray-200">
                        <div class="flex justify-between">
                            <span class="font-semibold text-gray-900">Total</span>
                            <span class="text-xl font-bold text-gray-900">${{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <button type="submit"
                            class="w-full bg-gray-900 text-white py-3.5 rounded-xl font-semibold hover:bg-gray-800 transition-all duration-200 shadow-lg hover:shadow-xl">
                        Place Order
                    </button>

                    <p class="text-xs text-gray-400 text-center mt-4">
                        By placing your order, you agree to our Terms & Conditions
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
