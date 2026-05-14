@extends('layouts.app')

@section('title', 'All Products - ShoeStore')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">All Products</h1>
            <p class="text-gray-500 mt-1">{{ $products->total() }} products found</p>
        </div>

        {{-- Filters --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 mb-8">
            <form action="{{ route('products.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-end">
                {{-- Search --}}
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search shoes..."
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm">
                </div>

                {{-- Category --}}
                <div class="w-full md:w-48">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select name="category" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 text-sm bg-white">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Sort --}}
                <div class="w-full md:w-48">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                    <select name="sort" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 text-sm bg-white">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-gray-900 text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">
                        Filter
                    </button>
                    <a href="{{ route('products.index') }}" class="border border-gray-300 text-gray-700 px-4 py-2.5 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        {{-- Products Grid --}}
        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($products as $product)
                    @include('partials._product-card', ['product' => $product])
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-10">
                {{ $products->links('partials._pagination') }}
            </div>
        @else
            <div class="text-center py-20">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No products found</h3>
                <p class="text-gray-500 mb-6">Try adjusting your filters or search terms</p>
                <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 bg-gray-900 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-800 transition-colors">
                    View All Products
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
