<?php if(auth()->check()): ?>
<nav class="col-md-2 sidebar">
    <div class="user-box text-center pt-5 pb-3">
        <div class="user-img">
            <img src="<?php echo e(auth()->user()->present()->avatar); ?>"
                 width="90"
                 height="90"
                 alt="user-img"
                 class="rounded-circle img-thumbnail img-responsive">
        </div>
        <h5 class="my-3">
            <a href="<?php echo e(route('profile')); ?>"><?php echo e(auth()->user()->present()->nameOrEmail); ?></a>
        </h5>

        <ul class="list-inline mb-2">
            <li class="list-inline-item">
                <a href="<?php echo e(route('profile')); ?>" title="<?php echo app('translator')->get('My Profile'); ?>">
                    <i class="fas fa-cog"></i>
                </a>
            </li>

            <li class="list-inline-item">
                <a href="<?php echo e(route('auth.logout')); ?>" class="text-custom" title="<?php echo app('translator')->get('Logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <?php $__currentLoopData = \Vanguard\Plugins\Vanguard::availablePlugins(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('partials.sidebar.items', ['item' => $plugin->sidebar()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</nav>
<?php else: ?>
<nav class="col-md-2 sidebar">
    <div class="user-box text-center pt-5 pb-3">
        <div class="user-img">
		<a href="login">
            <img src="assets/img/profile.png"
                 width="90"
                 height="90"
                 alt="user-img"
                 class="rounded-circle img-thumbnail img-responsive">
		</a>
        </div>
		
		<h5 class="my-3">
            <a href="login"><i class="fas fa-sign-in-alt"></i> <?php echo app('translator')->get('Login'); ?></a>
        </h5>
    </div>
</nav>
<?php endif; ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/partials/sidebar/main.blade.php ENDPATH**/ ?>