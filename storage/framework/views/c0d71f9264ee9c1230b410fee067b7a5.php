
<header class="sticky top-0 z-50 bg-white/95 backdrop-blur-xl border-b border-gray-200 shadow-sm transition-all duration-300" id="main-header">
    <div class="container mx-auto px-4 sm:px-6 py-4">
        <div class="flex items-center justify-between">
            
            <div class="flex items-center space-x-8 lg:space-x-12">
                <a href="<?php echo e(route('home')); ?>" class="text-2xl font-bold tracking-tight text-gray-900 hover:text-gray-700 transition-colors">
                    SHOE<span class="text-gray-900">STORE</span>
                </a>

                <nav class="hidden md:flex items-center space-x-1">
                    <a href="<?php echo e(route('home')); ?>"
                       class="py-2 px-4 rounded-lg text-sm font-medium transition-all duration-200 <?php echo e(request()->routeIs('home') ? 'bg-gray-900 text-white' : 'text-gray-700 hover:bg-gray-100'); ?>">
                        Home
                    </a>
                    <a href="<?php echo e(route('products.index')); ?>"
                       class="py-2 px-4 rounded-lg text-sm font-medium transition-all duration-200 <?php echo e(request()->routeIs('products.*') ? 'bg-gray-900 text-white' : 'text-gray-700 hover:bg-gray-100'); ?>">
                        Shop
                    </a>
                </nav>
            </div>

            
            <div class="hidden lg:flex flex-1 max-w-md mx-8">
                <form action="<?php echo e(route('products.index')); ?>" method="GET" class="relative w-full">
                    <input type="search" name="search" placeholder="Search shoes..."
                           value="<?php echo e(request('search')); ?>"
                           class="w-full pl-10 pr-4 py-2.5 text-sm border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all bg-gray-50">
                    <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </form>
            </div>

            
            <div class="flex items-center space-x-2 sm:space-x-4">
                
                <a href="<?php echo e(route('cart.index')); ?>"
                   class="relative p-2 rounded-full hover:bg-gray-100 transition-all duration-200 group"
                   id="cart-link">
                    <svg class="h-6 w-6 text-gray-700 group-hover:text-gray-900 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                    </svg>
                    <?php
                        $cartCount = 0;
                        if(auth()->check()) {
                            $cartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
                        } else {
                            $cartCount = \App\Models\Cart::where('session_id', session()->getId())->sum('quantity');
                        }
                    ?>
                    <?php if($cartCount > 0): ?>
                        <span class="absolute -top-1 -right-1 bg-gray-900 text-white text-xs font-bold rounded-full min-w-[20px] h-5 flex items-center justify-center px-1">
                            <?php echo e($cartCount > 99 ? '99+' : $cartCount); ?>

                        </span>
                    <?php endif; ?>
                </a>

                
                <div class="hidden sm:flex items-center space-x-2">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->isAdmin()): ?>
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-sm font-medium text-gray-700 hover:text-gray-900 px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                                Admin
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('orders.my')); ?>" class="text-sm font-medium text-gray-700 hover:text-gray-900 px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                            My Orders
                        </a>
                        <form action="<?php echo e(route('logout')); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="text-sm font-medium text-gray-700 hover:text-gray-900 px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                                Logout
                            </button>
                        </form>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="text-sm font-medium text-gray-700 hover:text-gray-900 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                            Sign In
                        </a>
                        <a href="<?php echo e(route('register')); ?>" class="text-sm font-medium bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors">
                            Sign Up
                        </a>
                    <?php endif; ?>
                </div>

                
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
                        class="md:hidden p-2 rounded-full hover:bg-gray-100 transition-colors">
                    <svg class="h-6 w-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        
        <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 border-t border-gray-200 pt-4">
            <form action="<?php echo e(route('products.index')); ?>" method="GET" class="relative mb-4">
                <input type="search" name="search" placeholder="Search shoes..." value="<?php echo e(request('search')); ?>"
                       class="w-full pl-10 pr-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </form>
            <div class="flex flex-col space-y-2">
                <a href="<?php echo e(route('home')); ?>" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100">Home</a>
                <a href="<?php echo e(route('products.index')); ?>" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100">Shop</a>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('orders.my')); ?>" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100">My Orders</a>
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100">Logout</button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100">Sign In</a>
                    <a href="<?php echo e(route('register')); ?>" class="px-3 py-2 rounded-lg text-sm font-medium bg-gray-900 text-white text-center hover:bg-gray-800">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<?php /**PATH D:\Laravel\shoe-store\resources\views/partials/header.blade.php ENDPATH**/ ?>