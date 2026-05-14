@extends('layouts.admin')

@section('page-title', 'Edit Product')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-500 hover:text-gray-900 flex items-center gap-1 mb-6 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Back to Products
    </a>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Product Name *</label>
                    <input type="text" name="name" id="name" required value="{{ old('name', $product->name) }}"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    @error('name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category *</label>
                    <select name="category_id" id="category_id" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm bg-white">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status *</label>
                    <select name="status" id="status" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm bg-white">
                        <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price ($) *</label>
                    <input type="number" name="price" id="price" required min="0" step="0.01" value="{{ old('price', $product->price) }}"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <div>
                    <label for="sale_price" class="block text-sm font-medium text-gray-700 mb-1">Sale Price ($)</label>
                    <input type="number" name="sale_price" id="sale_price" min="0" step="0.01" value="{{ old('sale_price', $product->sale_price) }}"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stock *</label>
                    <input type="number" name="stock" id="stock" required min="0" value="{{ old('stock', $product->stock) }}"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <div>
                    <label for="size" class="block text-sm font-medium text-gray-700 mb-1">Sizes (comma separated)</label>
                    <input type="text" name="size" id="size" value="{{ old('size', $product->size) }}"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                    <input type="text" name="color" id="color" value="{{ old('color', $product->color) }}"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                    @if($product->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Current image" class="w-20 h-20 object-cover rounded-lg">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" accept="image/*"
                           class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700">
                </div>

                <div class="sm:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
                    <textarea name="description" id="description" rows="4" required
                              class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm resize-none">{{ old('description', $product->description) }}</textarea>
                </div>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors">
                Update Product
            </button>
        </form>
    </div>
</div>
@endsection
