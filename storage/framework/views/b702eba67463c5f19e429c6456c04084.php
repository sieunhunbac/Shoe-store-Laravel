<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-blue-50 rounded-xl">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
        </div>
        <p class="text-sm text-gray-500 mb-1">Total Products</p>
        <p class="text-3xl font-bold text-gray-900"><?php echo e($totalProducts); ?></p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-green-50 rounded-xl">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
        </div>
        <p class="text-sm text-gray-500 mb-1">Total Orders</p>
        <p class="text-3xl font-bold text-gray-900"><?php echo e($totalOrders); ?></p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-purple-50 rounded-xl">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
        <p class="text-sm text-gray-500 mb-1">Total Revenue</p>
        <p class="text-3xl font-bold text-gray-900">$<?php echo e(number_format($totalRevenue, 2)); ?></p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-yellow-50 rounded-xl">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
        <p class="text-sm text-gray-500 mb-1">Pending Orders</p>
        <p class="text-3xl font-bold text-gray-900"><?php echo e($pendingOrders); ?></p>
    </div>
</div>


<div class="bg-white rounded-2xl border border-gray-100 shadow-sm">
    <div class="p-6 border-b border-gray-100">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900">Latest Orders</h2>
            <a href="<?php echo e(route('admin.orders.index')); ?>" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors">View All →</a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50">
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Order ID</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Customer</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Amount</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $latestOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">#<?php echo e(str_pad($order->id, 6, '0', STR_PAD_LEFT)); ?></td>
                        <td class="py-4 px-6 text-sm text-gray-700"><?php echo e($order->customer_name); ?></td>
                        <td class="py-4 px-6 text-sm font-semibold text-gray-900">$<?php echo e(number_format($order->total_amount, 2)); ?></td>
                        <td class="py-4 px-6">
                            <span class="inline-block px-2.5 py-1 text-xs font-medium rounded-full <?php echo e($order->status_badge); ?>">
                                <?php echo e(ucfirst($order->status)); ?>

                            </span>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500"><?php echo e($order->created_at->format('M d, Y')); ?></td>
                        <td class="py-4 px-6">
                            <a href="<?php echo e(route('admin.orders.show', $order)); ?>" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors">View</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="py-8 text-center text-gray-500">No orders yet</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\shoe-store\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>