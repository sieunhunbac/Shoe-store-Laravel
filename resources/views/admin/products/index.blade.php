@extends('layouts.admin')

@section('page-title', 'Products')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h2 class="text-lg font-semibold text-gray-900">All Products</h2>
    <a href="{{ route('admin.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
        + Add Product
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50">
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Image</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Name</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Category</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Price</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Stock</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-6">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded-lg bg-gray-100">
                        </td>
                        <td class="py-3 px-6">
                            <p class="text-sm font-medium text-gray-900">{{ $product->name }}</p>
                            <p class="text-xs text-gray-500">{{ $product->slug }}</p>
                        </td>
                        <td class="py-3 px-6 text-sm text-gray-700">{{ $product->category->name ?? '-' }}</td>
                        <td class="py-3 px-6">
                            @if($product->sale_price)
                                <p class="text-sm font-medium text-red-600">${{ number_format($product->sale_price, 2) }}</p>
                                <p class="text-xs text-gray-400 line-through">${{ number_format($product->price, 2) }}</p>
                            @else
                                <p class="text-sm font-medium text-gray-900">${{ number_format($product->price, 2) }}</p>
                            @endif
                        </td>
                        <td class="py-3 px-6 text-sm {{ $product->stock < 10 ? 'text-red-600 font-medium' : 'text-gray-700' }}">{{ $product->stock }}</td>
                        <td class="py-3 px-6">
                            <span class="inline-block px-2.5 py-1 text-xs font-medium rounded-full {{ $product->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                                {{ ucfirst($product->status) }}
                            </span>
                        </td>
                        <td class="py-3 px-6">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-8 text-center text-gray-500">No products found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">{{ $products->links('partials._pagination') }}</div>
@endsection
