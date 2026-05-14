<?php $__env->startSection('title', 'ShoeStore - Step Into Style'); ?>

<?php $__env->startSection('content'); ?>

<section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1556906781-9a412961c28c?w=1920')] bg-cover bg-center"></div>
    </div>
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold tracking-widest uppercase text-gray-400 mb-4">New Collection 2025</p>
            <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight leading-none mb-6">
                Step Into<br>
                <span class="bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent">Style</span>
            </h1>
            <p class="text-lg text-gray-300 mb-8 max-w-xl leading-relaxed">
                Discover our latest collection of premium sneakers — comfort, design, and performance in every pair.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="<?php echo e(route('products.index')); ?>"
                   class="inline-flex items-center gap-2 bg-white text-gray-900 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Shop Now
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="<?php echo e(route('products.index', ['sort' => 'newest'])); ?>"
                   class="inline-flex items-center gap-2 border-2 border-white/30 text-white px-8 py-4 rounded-lg font-semibold hover:bg-white/10 transition-all duration-200">
                    New Arrivals
                </a>
            </div>
        </div>
    </div>
</section>


<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Shop by Category</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Find the perfect pair for every occasion</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-6">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('products.index', ['category' => $category->id])); ?>"
                   class="group relative bg-white rounded-2xl p-6 text-center shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 hover:-translate-y-1">
                    <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-2xl flex items-center justify-center group-hover:bg-gray-900 transition-colors duration-300">
                        <svg class="w-8 h-8 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1"><?php echo e($category->name); ?></h3>
                    <p class="text-sm text-gray-500"><?php echo e($category->products_count); ?> products</p>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<?php if($featuredProducts->count() > 0): ?>
<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-10">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">On Sale</h2>
                <p class="text-gray-500 mt-1">Don't miss these amazing deals</p>
            </div>
            <a href="<?php echo e(route('products.index')); ?>" class="text-sm font-medium text-gray-900 hover:text-gray-600 transition-colors flex items-center gap-1">
                View All
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('partials._product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>


<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">New Arrivals</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Discover our latest collection of premium sneakers</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $newArrivals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('partials._product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo e(route('products.index')); ?>"
               class="inline-flex items-center gap-2 bg-gray-900 text-white px-8 py-3.5 rounded-lg font-semibold hover:bg-gray-800 transition-all duration-200 shadow-md hover:shadow-lg">
                View All Products
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>


<section class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="flex items-start gap-4 p-6 bg-white rounded-2xl shadow-sm">
                <div class="p-3 bg-gray-100 rounded-xl">
                    <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Free Shipping</h3>
                    <p class="text-sm text-gray-500">On orders over $50</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-6 bg-white rounded-2xl shadow-sm">
                <div class="p-3 bg-gray-100 rounded-xl">
                    <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">1 Year Warranty</h3>
                    <p class="text-sm text-gray-500">Quality guarantee</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-6 bg-white rounded-2xl shadow-sm">
                <div class="p-3 bg-gray-100 rounded-xl">
                    <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Easy Returns</h3>
                    <p class="text-sm text-gray-500">30-day return policy</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\shoe-store\resources\views/home.blade.php ENDPATH**/ ?>