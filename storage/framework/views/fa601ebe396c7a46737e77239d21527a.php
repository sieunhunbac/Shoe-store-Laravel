<?php $__env->startSection('page-title', 'Orders'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50">
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Order ID</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Customer</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Email</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Total</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Date</th>
                    <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50">
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">#<?php echo e(str_pad($order->id, 6, '0', STR_PAD_LEFT)); ?></td>
                        <td class="py-4 px-6 text-sm text-gray-700"><?php echo e($order->customer_name); ?></td>
                        <td class="py-4 px-6 text-sm text-gray-500"><?php echo e($order->customer_email); ?></td>
                        <td class="py-4 px-6 text-sm font-semibold text-gray-900">$<?php echo e(number_format($order->total_amount, 2)); ?></td>
                        <td class="py-4 px-6">
                            <span class="inline-block px-2.5 py-1 text-xs font-medium rounded-full <?php echo e($order->status_badge); ?>">
                                <?php echo e(ucfirst($order->status)); ?>

                            </span>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500"><?php echo e($order->created_at->format('M d, Y')); ?></td>
                        <td class="py-4 px-6">
                            <a href="<?php echo e(route('admin.orders.show', $order)); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="py-8 text-center text-gray-500">No orders found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6"><?php echo e($orders->links('partials._pagination')); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\shoe-store\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>