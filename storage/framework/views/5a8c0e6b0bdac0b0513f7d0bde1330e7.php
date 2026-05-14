
<?php if($paginator->hasPages()): ?>
    <nav class="flex items-center justify-center gap-2">
        
        <?php if($paginator->onFirstPage()): ?>
            <span class="px-4 py-2 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">Previous</span>
        <?php else: ?>
            <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">Previous</a>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(is_string($element)): ?>
                <span class="px-3 py-2 text-sm text-gray-500"><?php echo e($element); ?></span>
            <?php endif; ?>

            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <span class="px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg"><?php echo e($page); ?></span>
                    <?php else: ?>
                        <a href="<?php echo e($url); ?>" class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">Next</a>
        <?php else: ?>
            <span class="px-4 py-2 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">Next</span>
        <?php endif; ?>
    </nav>
<?php endif; ?>
<?php /**PATH D:\Laravel\shoe-store\resources\views/partials/_pagination.blade.php ENDPATH**/ ?>