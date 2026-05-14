{{-- Product Card Partial --}}
<div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
    <a href="{{ route('products.show', $product->slug) }}" class="block relative">
        <div class="aspect-square overflow-hidden bg-gray-100">
            <img src="{{ $product->image_url }}"
                 alt="{{ $product->name }}"
                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                 loading="lazy">
        </div>

        {{-- Sale Badge --}}
        @if($product->sale_price)
            <span class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-2.5 py-1 rounded-full">
                SALE
            </span>
        @endif

        {{-- Quick View Overlay --}}
        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
            <span class="bg-white text-gray-900 px-6 py-2.5 rounded-lg font-medium text-sm shadow-lg transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                View Details
            </span>
        </div>
    </a>

    <div class="p-4 space-y-3">
        @if($product->category)
            <span class="text-xs font-medium text-gray-400 uppercase tracking-wider">{{ $product->category->name }}</span>
        @endif

        <a href="{{ route('products.show', $product->slug) }}">
            <h3 class="font-semibold text-gray-900 line-clamp-1 hover:text-gray-600 transition-colors">{{ $product->name }}</h3>
        </a>

        <div class="flex items-center gap-2">
            @if($product->sale_price)
                <span class="text-lg font-bold text-red-600">${{ number_format($product->sale_price, 2) }}</span>
                <span class="text-sm text-gray-400 line-through">${{ number_format($product->price, 2) }}</span>
            @else
                <span class="text-lg font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
            @endif
        </div>

        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="1">
            @if($product->size)
                <input type="hidden" name="size" value="{{ explode(',', $product->size)[0] }}">
            @endif
            <input type="hidden" name="color" value="{{ $product->color }}">
            <button type="submit"
                    class="w-full bg-gray-900 text-white py-2.5 rounded-xl text-sm font-semibold hover:bg-gray-800 transition-all duration-200 flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                </svg>
                Add to Cart
            </button>
        </form>
    </div>
</div>
