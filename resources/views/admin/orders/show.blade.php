@extends('layouts.admin')

@section('page-title', 'Order #' . str_pad($order->id, 6, '0', STR_PAD_LEFT))

@section('content')
<a href="{{ route('admin.orders.index') }}" class="text-sm text-gray-500 hover:text-gray-900 flex items-center gap-1 mb-6 transition-colors">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
    Back to Orders
</a>

<div class="grid lg:grid-cols-3 gap-6">
    {{-- Order Details --}}
    <div class="lg:col-span-2 space-y-6">
        {{-- Customer Info --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <h3 class="font-semibold text-gray-900 mb-4">Customer Information</h3>
            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500">Name</p>
                    <p class="font-medium text-gray-900">{{ $order->customer_name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-medium text-gray-900">{{ $order->customer_email }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Phone</p>
                    <p class="font-medium text-gray-900">{{ $order->customer_phone }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Payment Method</p>
                    <p class="font-medium text-gray-900">{{ strtoupper($order->payment_method) }}</p>
                </div>
                <div class="sm:col-span-2">
                    <p class="text-sm text-gray-500">Shipping Address</p>
                    <p class="font-medium text-gray-900">{{ $order->customer_address }}</p>
                </div>
                @if($order->note)
                    <div class="sm:col-span-2">
                        <p class="text-sm text-gray-500">Note</p>
                        <p class="font-medium text-gray-900">{{ $order->note }}</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Order Items --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h3 class="font-semibold text-gray-900">Order Items</h3>
            </div>
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Product</th>
                        <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Price</th>
                        <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Qty</th>
                        <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Size</th>
                        <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($order->items as $item)
                        <tr>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900">{{ $item->product_name }}</td>
                            <td class="py-4 px-6 text-sm text-gray-700">${{ number_format($item->product_price, 2) }}</td>
                            <td class="py-4 px-6 text-sm text-gray-700">{{ $item->quantity }}</td>
                            <td class="py-4 px-6 text-sm text-gray-700">{{ $item->size ?? '-' }}</td>
                            <td class="py-4 px-6 text-sm font-semibold text-gray-900">${{ number_format($item->subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-gray-50">
                        <td colspan="4" class="py-4 px-6 text-sm font-semibold text-gray-900 text-right">Total:</td>
                        <td class="py-4 px-6 text-lg font-bold text-gray-900">${{ number_format($order->total_amount, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- Status Update --}}
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sticky top-24">
            <h3 class="font-semibold text-gray-900 mb-4">Order Status</h3>

            <div class="mb-4">
                <span class="inline-block px-3 py-1.5 text-sm font-medium rounded-full {{ $order->status_badge }}">
                    {{ ucfirst($order->status) }}
                </span>
            </div>

            <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Update Status</label>
                    <select name="status" id="status" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm bg-white">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>Shipping</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2.5 rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors">
                    Update Status
                </button>
            </form>

            <hr class="my-4 border-gray-200">

            <div class="space-y-2 text-sm text-gray-500">
                <p><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y h:i A') }}</p>
                <p><strong>Last Updated:</strong> {{ $order->updated_at->format('M d, Y h:i A') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
