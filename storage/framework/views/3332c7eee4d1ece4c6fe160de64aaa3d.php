<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?> - ShoeStore</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">

    <div class="flex min-h-screen">
        
        <aside class="w-64 bg-gray-900 text-white flex-shrink-0 hidden lg:block">
            <div class="p-6">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-xl font-bold tracking-tight">
                    SHOE<span class="text-blue-400">STORE</span>
                </a>
                <p class="text-gray-400 text-xs mt-1">Admin Panel</p>
            </div>

            <nav class="mt-4 px-3 space-y-1">
                <a href="<?php echo e(route('admin.dashboard')); ?>"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-colors <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white'); ?>">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="<?php echo e(route('admin.categories.index')); ?>"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-colors <?php echo e(request()->routeIs('admin.categories.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white'); ?>">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    Categories
                </a>
                <a href="<?php echo e(route('admin.products.index')); ?>"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-colors <?php echo e(request()->routeIs('admin.products.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white'); ?>">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    Products
                </a>
                <a href="<?php echo e(route('admin.orders.index')); ?>"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-colors <?php echo e(request()->routeIs('admin.orders.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white'); ?>">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    Orders
                </a>

                <div class="pt-6 mt-6 border-t border-gray-700">
                    <a href="<?php echo e(route('home')); ?>"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Store
                    </a>
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-gray-300 hover:bg-gray-800 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        
        <div class="flex-1 flex flex-col">
            
            <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                <h1 class="text-xl font-semibold text-gray-800"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h1>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600"><?php echo e(auth()->user()->name); ?></span>
                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-sm font-medium">
                        <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

                    </div>
                </div>
            </header>

            <?php echo $__env->make('partials.flash', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <main class="flex-1 p-6">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\Laravel\shoe-store\resources\views/layouts/admin.blade.php ENDPATH**/ ?>