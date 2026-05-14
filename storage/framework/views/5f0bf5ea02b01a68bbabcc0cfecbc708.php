<?php $__env->startSection('page-title', 'Add Category'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl">
    <a href="<?php echo e(route('admin.categories.index')); ?>" class="text-sm text-gray-500 hover:text-gray-900 flex items-center gap-1 mb-6 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Back to Categories
    </a>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <form action="<?php echo e(route('admin.categories.store')); ?>" method="POST" class="space-y-5">
            <?php echo csrf_field(); ?>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Category Name *</label>
                <input type="text" name="name" id="name" required value="<?php echo e(old('name')); ?>"
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-sm text-red-600 mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="3"
                          class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm resize-none"><?php echo e(old('description')); ?></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors">
                Create Category
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\shoe-store\resources\views/admin/categories/create.blade.php ENDPATH**/ ?>