<div class="card overflow-hidden">
    <h6 class="card-header d-flex align-items-center justify-content-between">
        <?php echo app('translator')->get('Latest Registrations'); ?>

        <?php if(count($latestRegistrations)): ?>
            <small class="float-right">
                <a href="<?php echo e(route('users.index')); ?>"><?php echo app('translator')->get('View All'); ?></a>
            </small>
        <?php endif; ?>
    </h6>

    <div class="card-body p-0">
        <?php if(count($latestRegistrations)): ?>
            <ul class="list-group list-group-flush">
                <?php $__currentLoopData = $latestRegistrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item list-group-item-action px-4 py-3">
                        <a href="<?php echo e(route('users.show', $user)); ?>" class="d-flex text-dark no-decoration">
                            <img class="rounded-circle" width="40" height="40" src="<?php echo e($user->present()->avatar); ?>">
                            <div class="ml-2" style="line-height: 1.2;">
                                <span class="d-block p-0"><?php echo e($user->present()->nameOrEmail); ?></span>
                                <small class="text-muted"><?php echo e($user->created_at->diffForHumans()); ?></small>
                            </div>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php else: ?>
            <p class="text-muted"><?php echo app('translator')->get('No records found.'); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /var/www/html/trealet.com/audiences/resources/views/plugins/dashboard/widgets/latest-registrations.blade.php ENDPATH**/ ?>