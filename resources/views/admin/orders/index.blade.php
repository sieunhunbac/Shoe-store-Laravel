@extends('layouts.admin')

@section('page-title', 'Orders')

@section('content')
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50">
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Order ID</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Customer</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Email</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Total</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Date</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($orders as $order)
                    <tr class="hover:bg-gray-50">
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                        <td class="py-4 px-6 text-sm text-gray-700">{{ $order->customer_name }}</td>
                        <td class="py-4 px-6 text-sm text-gray-500">{{ $order->customer_email }}</td>
                        <td class="py-4 px-6 text-sm font-semibold text-gray-900">${{ number_format($order->total_amount, 2) }}</td>
                        <td class="py-4 px-6">
                            <span class="inline-block px-2.5 py-1 text-xs font-medium rounded-full {{ $order->status_badge }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                        <td class="py-4 px-6">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-8 text-center text-gray-500">No orders found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">{{ $orders->links('partials._pagination') }}</div>
@endsection
