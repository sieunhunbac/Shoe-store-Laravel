<?php $__env->startSection('title', 'My Orders - ShoeStore'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">My Orders</h1>

    <?php if($orders->count() > 0): ?>
        <div class="space-y-4">
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="p-6">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-4">
                            <div>
                                <p class="font-semibold text-gray-900">Order #<?php echo e(str_pad($order->id, 6, '0', STR_PAD_LEFT)); ?></p>
                                <p class="text-sm text-gray-500"><?php echo e($order->created_at->format('M d, Y - h:i A')); ?></p>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="inline-block px-3 py-1 text-sm font-medium rounded-full <?php echo e($order->status_badge); ?>">
                                    <?php echo e(ucfirst($order->status)); ?>

                                </span>
                                <span class="text-lg font-bold text-gray-900">$<?php echo e(number_format($order->total_amount, 2)); ?></span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-center justify-between py-2 border-t border-gray-100">
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900"><?php echo e($item->product_name); ?></p>
                                            <p class="text-xs text-gray-500">
                                                Qty: <?php echo e($item->quantity); ?> × $<?php echo e(number_format($item->product_price, 2)); ?>

                                                <?php if($item->size): ?> | Size: <?php echo e($item->size); ?> <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-900">$<?php echo e(number_format($item->subtotal, 2)); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-8">
            <?php echo e($orders->links('partials._pagination')); ?>

        </div>
    <?php else: ?>
        <div class="text-center py-20">
            <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            <h2 class="text-xl font-semibold text-gray-900 mb-2">No orders yet</h2>
            <p class="text-gray-500 mb-6">Start shopping to see your orders here!</p>
            <a href="<?php echo e(route('products.index')); ?>" class="bg-gray-900 text-white px-8 py-3 rounded-xl font-semibold hover:bg-gray-800 transition-colors">
                Start Shopping
            </a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\shoe-store\resources\views/orders/my-orders.blade.php ENDPATH**/ ?>