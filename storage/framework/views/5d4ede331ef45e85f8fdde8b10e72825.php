<?php $__env->startSection('title', 'Sign In - ShoeStore'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-[70vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Welcome back</h1>
            <p class="text-gray-500 mt-2">Sign in to your account</p>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
            <form action="<?php echo e(route('login')); ?>" method="POST" class="space-y-5">
                <?php echo csrf_field(); ?>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" required autofocus
                           value="<?php echo e(old('email')); ?>"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm"
                           placeholder="your@email.com">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-sm text-red-600 mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent text-sm"
                           placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-gray-900 focus:ring-gray-900">
                        <span class="text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <button type="submit"
                        class="w-full bg-gray-900 text-white py-3 rounded-xl font-semibold hover:bg-gray-800 transition-all duration-200 shadow-lg hover:shadow-xl">
                    Sign In
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Don't have an account?
                <a href="<?php echo e(route('register')); ?>" class="font-semibold text-gray-900 hover:text-gray-700 transition-colors">Sign Up</a>
            </p>
        </div>

        
        <div class="mt-6 bg-blue-50 rounded-xl p-4 border border-blue-100">
            <p class="text-sm font-medium text-blue-900 mb-2">Demo Credentials:</p>
            <p class="text-xs text-blue-700"><strong>Admin:</strong> admin@example.com / password</p>
            <p class="text-xs text-blue-700"><strong>Customer:</strong> customer@example.com / password</p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\shoe-store\resources\views/auth/login.blade.php ENDPATH**/ ?>