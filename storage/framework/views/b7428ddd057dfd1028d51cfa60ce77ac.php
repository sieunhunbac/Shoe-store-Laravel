<?php $__env->startSection('page-title', 'Categories'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between mb-6">
    <h2 class="text-lg font-semibold text-gray-900">All Categories</h2>
    <a href="<?php echo e(route('admin.categories.create')); ?>" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
        + Add Category
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <table class="w-full">
        <thead>
            <tr class="bg-gray-50">
                <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">#</th>
                <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Name</th>
                <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Slug</th>
                <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Products</th>
                <th class="text-left py-3 px-6 text-xs font-semibold text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 text-sm text-gray-500"><?php echo e($category->id); ?></td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900"><?php echo e($category->name); ?></td>
                    <td class="py-4 px-6 text-sm text-gray-500"><?php echo e($category->slug); ?></td>
                    <td class="py-4 px-6 text-sm text-gray-700"><?php echo e($category->products_count); ?></td>
                    <td class="py-4 px-6">
                        <div class="flex items-center gap-2">
                            <a href="<?php echo e(route('admin.categories.edit', $category)); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Edit</a>
                            <form action="<?php echo e(route('admin.categories.destroy', $category)); ?>" method="POST" class="inline" onsubmit="return confirm('Delete this category?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">No categories found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="mt-6"><?php echo e($categories->links('partials._pagination')); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\shoe-store\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>