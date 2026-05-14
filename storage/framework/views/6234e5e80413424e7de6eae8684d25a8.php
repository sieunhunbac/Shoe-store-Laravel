
<?php if(session('success')): ?>
    <div class="bg-green-50 border-l-4 border-green-500 p-4 mx-4 sm:mx-6 lg:mx-8 mt-4 rounded-r-lg" id="flash-success">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <p class="text-sm text-green-700"><?php echo e(session('success')); ?></p>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-green-500 hover:text-green-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="bg-red-50 border-l-4 border-red-500 p-4 mx-4 sm:mx-6 lg:mx-8 mt-4 rounded-r-lg" id="flash-error">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="text-sm text-red-700"><?php echo e(session('error')); ?></p>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-red-500 hover:text-red-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="bg-red-50 border-l-4 border-red-500 p-4 mx-4 sm:mx-6 lg:mx-8 mt-4 rounded-r-lg">
        <ul class="list-disc list-inside text-sm text-red-700">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH D:\Laravel\shoe-store\resources\views/partials/flash.blade.php ENDPATH**/ ?>