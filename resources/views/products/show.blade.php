@extends('layouts.app')

@section('title', $product->name . ' - ShoeStore')
@section('description', $product->description)

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-8">
        <a href="{{ route('home') }}" class="hover:text-gray-900 transition-colors">Home</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <a href="{{ route('products.index') }}" class="hover:text-gray-900 transition-colors">Products</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="text-gray-900 font-medium">{{ $product->name }}</span>
    </nav>

    {{-- Product Detail --}}
    <div class="grid lg:grid-cols-2 gap-12 mb-16">
        {{-- Product Image --}}
        <div class="space-y-4">
            <div class="rounded-2xl overflow-hidden shadow-lg bg-gray-100">
                <img src="{{ $product->image_url }}"
                     alt="{{ $product->name }}"
                     class="w-full h-auto max-h-[550px] object-cover">
            </div>
        </div>

        {{-- Product Info --}}
        <div class="space-y-6">
            @if($product->category)
                <span class="inline-block text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-100 px-3 py-1 rounded-full">
                    {{ $product->category->name }}
                </span>
            @endif

            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900">{{ $product->name }}</h1>

            {{-- Rating --}}
            <div class="flex items-center gap-2">
                <div class="flex items-center gap-0.5">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    @endfor
                </div>
                <span class="text-sm text-gray-500">(4.8) • 127 reviews</span>
            </div>

            {{-- Price --}}
            <div class="flex items-center gap-3">
                @if($product->sale_price)
                    <span class="text-3xl font-bold text-red-600">${{ number_format($product->sale_price, 2) }}</span>
                    <span class="text-xl text-gray-400 line-through">${{ number_format($product->price, 2) }}</span>
                    <span class="bg-red-100 text-red-700 text-sm font-semibold px-2.5 py-0.5 rounded-full">
                        -{{ round((1 - $product->sale_price / $product->price) * 100) }}%
                    </span>
                @else
                    <span class="text-3xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                @endif
            </div>

            {{-- Description --}}
            <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>

            {{-- Stock --}}
            <div class="flex items-center gap-2">
                @if($product->stock > 0)
                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                    <span class="text-sm text-green-700 font-medium">In Stock ({{ $product->stock }} available)</span>
                @else
                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                    <span class="text-sm text-red-700 font-medium">Out of Stock</span>
                @endif
            </div>

            <hr class="border-gray-200">

            {{-- Add to Cart Form --}}
            <form action="{{ route('cart.add') }}" method="POST" class="space-y-5">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="color" value="{{ $product->color }}">

                {{-- Size Selector --}}
                @if(count($sizes) > 0)
                    <div>
                        <label class="text-sm font-semibold text-gray-900 mb-3 block">Size</label>
                        <div class="flex flex-wrap gap-2">
                            @foreach($sizes as $index => $size)
                                <label class="cursor-pointer">
                                    <input type="radio" name="size" value="{{ trim($size) }}" class="hidden peer" {{ $index === 0 ? 'checked' : '' }}>
                                    <span class="inline-block px-4 py-2.5 border-2 border-gray-200 rounded-xl text-sm font-medium text-gray-700 peer-checked:border-gray-900 peer-checked:bg-gray-900 peer-checked:text-white transition-all duration-200 hover:border-gray-400">
                                        {{ trim($size) }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Color --}}
                @if($product->color)
                    <div>
                        <label class="text-sm font-semibold text-gray-900 mb-2 block">Color</label>
                        <span class="inline-block px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700">{{ $product->color }}</span>
                    </div>
                @endif

                {{-- Quantity --}}
                <div>
                    <label class="text-sm font-semibold text-gray-900 mb-3 block">Quantity</label>
                    <div class="flex items-center border border-gray-300 rounded-xl w-fit">
                        <button type="button" onclick="changeQty(-1)" class="px-4 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-l-xl transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                        </button>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}"
                               class="w-16 text-center py-2.5 border-x border-gray-300 font-medium text-sm focus:outline-none" readonly>
                        <button type="button" onclick="changeQty(1)" class="px-4 py-2.5 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-r-xl transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 pt-2">
                    <button type="submit" {{ $product->stock < 1 ? 'disabled' : '' }}
                            class="flex-1 bg-gray-900 text-white py-3.5 rounded-xl font-semibold hover:bg-gray-800 transition-all duration-200 flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                        </svg>
                        Add to Cart
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Features --}}
    <div class="bg-gray-50 rounded-2xl p-8 mb-16 border border-gray-100">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="flex items-start gap-4">
                <div class="p-3 bg-white rounded-xl shadow-sm">
                    <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Free Shipping</h3>
                    <p class="text-sm text-gray-500">On orders over $50</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <div class="p-3 bg-white rounded-xl shadow-sm">
                    <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Warranty</h3>
                    <p class="text-sm text-gray-500">1 year guarantee</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <div class="p-3 bg-white rounded-xl shadow-sm">
                    <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Easy Returns</h3>
                    <p class="text-sm text-gray-500">30-day return policy</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Related Products --}}
    @if($relatedProducts->count() > 0)
        <div class="mb-8">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Related Products</h2>
                <a href="{{ route('products.index', ['category' => $product->category_id]) }}" class="text-sm font-medium text-gray-900 hover:text-gray-600 flex items-center gap-1 transition-colors">
                    View All
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                    @include('partials._product-card', ['product' => $related])
                @endforeach
            </div>
        </div>
    @endif
</div>

@push('scripts')
<script>
function changeQty(delta) {
    const input = document.getElementById('quantity');
    let val = parseInt(input.value) + delta;
    const max = parseInt(input.max);
    if (val < 1) val = 1;
    if (val > max) val = max;
    input.value = val;
}
</script>
@endpush
@endsection
