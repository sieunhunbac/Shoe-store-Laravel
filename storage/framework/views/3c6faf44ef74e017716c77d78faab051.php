<?php $__env->startSection('title', 'All Products - ShoeStore'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">All Products</h1>
            <p class="text-gray-500 mt-1"><?php echo e($products->total()); ?> products found</p>
        </div>

        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 mb-8">
            <form action="<?php echo e(route('products.index')); ?>" method="GET" class="flex flex-col md:flex-row gap-4 items-end">
                
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search shoes..."
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm">
                </div>

                
                <div class="w-full md:w-48">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select name="category" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 text-sm bg-white">
                        <option value="">All Categories</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e(request('category') == $category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                
                <div class="w-full md:w-48">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                    <select name="sort" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 text-sm bg-white">
                        <option value="newest" <?php echo e(request('sort') == 'newest' ? 'selected' : ''); ?>>Newest</option>
                        <option value="price_low" <?php echo e(request('sort') == 'price_low' ? 'selected' : ''); ?>>Price: Low to High</option>
                        <option value="price_high" <?php echo e(request('sort') == 'price_high' ? 'selected' : ''); ?>>Price: High to Low</option>
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="bg-gray-900 text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">
                        Filter
                    </button>
                    <a href="<?php echo e(route('products.index')); ?>" class="border border-gray-300 text-gray-700 px-4 py-2.5 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        
        <?php if($products->count() > 0): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('partials._product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div class="mt-10">
                <?php echo e($products->links('partials._pagination')); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-20">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No products found</h3>
                <p class="text-gray-500 mb-6">Try adjusting your filters or search terms</p>
                <a href="<?php echo e(route('products.index')); ?>" class="inline-flex items-center gap-2 bg-gray-900 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-800 transition-colors">
                    View All Products
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\shoe-store\resources\views/products/index.blade.php ENDPATH**/ ?>