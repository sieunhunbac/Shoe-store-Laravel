
<div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
    <a href="<?php echo e(route('products.show', $product->slug)); ?>" class="block relative">
        <div class="aspect-square overflow-hidden bg-gray-100">
            <img src="<?php echo e($product->image_url); ?>"
                 alt="<?php echo e($product->name); ?>"
                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                 loading="lazy">
        </div>

        
        <?php if($product->sale_price): ?>
            <span class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-2.5 py-1 rounded-full">
                SALE
            </span>
        <?php endif; ?>

        
        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
            <span class="bg-white text-gray-900 px-6 py-2.5 rounded-lg font-medium text-sm shadow-lg transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                View Details
            </span>
        </div>
    </a>

    <div class="p-4 space-y-3">
        <?php if($product->category): ?>
            <span class="text-xs font-medium text-gray-400 uppercase tracking-wider"><?php echo e($product->category->name); ?></span>
        <?php endif; ?>

        <a href="<?php echo e(route('products.show', $product->slug)); ?>">
            <h3 class="font-semibold text-gray-900 line-clamp-1 hover:text-gray-600 transition-colors"><?php echo e($product->name); ?></h3>
        </a>

        <div class="flex items-center gap-2">
            <?php if($product->sale_price): ?>
                <span class="text-lg font-bold text-red-600">$<?php echo e(number_format($product->sale_price, 2)); ?></span>
                <span class="text-sm text-gray-400 line-through">$<?php echo e(number_format($product->price, 2)); ?></span>
            <?php else: ?>
                <span class="text-lg font-bold text-gray-900">$<?php echo e(number_format($product->price, 2)); ?></span>
            <?php endif; ?>
        </div>

        <form action="<?php echo e(route('cart.add')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
            <input type="hidden" name="quantity" value="1">
            <?php if($product->size): ?>
                <input type="hidden" name="size" value="<?php echo e(explode(',', $product->size)[0]); ?>">
            <?php endif; ?>
            <input type="hidden" name="color" value="<?php echo e($product->color); ?>">
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
<?php /**PATH D:\Laravel\shoe-store\resources\views/partials/_product-card.blade.php ENDPATH**/ ?>