<?php $__env->startSection('page-title', $user->present()->nameOrEmail); ?>
<?php $__env->startSection('page-heading', $user->present()->nameOrEmail); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('users.index')); ?>"><?php echo app('translator')->get('Users'); ?></a>
    </li>
    <li class="breadcrumb-item active">
        <?php echo e($user->present()->nameOrEmail); ?>

    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-5 col-xl-4 <?php if(! isset($activities)): ?> mx-auto <?php endif; ?>">
        <div class="card">
            <h6 class="card-header d-flex align-items-center justify-content-between">
                <?php echo app('translator')->get('Details'); ?>

                <small>
                    <?php if (can_be_impersonated($user, )) : ?>
                    <a href="<?php echo e(route('impersonate', $user)); ?>"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="<?php echo app('translator')->get('Impersonate User'); ?>">
                        <?php echo app('translator')->get('Impersonate'); ?>
                    </a>
                    <span class="text-muted">|</span>
                    <?php endif; ?>

                    <a href="<?php echo e(route('users.edit', $user)); ?>"
                       class="edit"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="<?php echo app('translator')->get('Edit User'); ?>">
                        <?php echo app('translator')->get('Edit'); ?>
                    </a>
                </small>
            </h6>
            <div class="card-body">
               <div class="d-flex align-items-center flex-column pt-3">
                    <div>
                        <img class="rounded-circle img-thumbnail img-responsive mb-4"
                             width="130"
                             height="130" src="<?php echo e($user->present()->avatar); ?>">
                    </div>

                    <?php if($name = $user->present()->name): ?>
                        <h5><?php echo e($user->present()->name); ?></h5>
                    <?php endif; ?>

                    <a href="mailto:<?php echo e($user->email); ?>" class="text-muted font-weight-light mb-2">
                        <?php echo e($user->email); ?>

                    </a>
                </div>

                <ul class="list-group list-group-flush mt-3">
                    <?php if($user->phone): ?>
                        <li class="list-group-item">
                            <strong><?php echo app('translator')->get('Phone'); ?>:</strong>
                            <a href="telto:<?php echo e($user->phone); ?>"><?php echo e($user->phone); ?></a>
                        </li>
                    <?php endif; ?>
                    <li class="list-group-item">
                        <strong><?php echo app('translator')->get('Birthday'); ?>:</strong>
                        <?php echo e($user->present()->birthday); ?>

                    </li>
                    <li class="list-group-item">
                        <strong><?php echo app('translator')->get('Address'); ?>:</strong>
                        <?php echo e($user->present()->fullAddress); ?>

                    </li>
                    <li class="list-group-item">
                        <strong><?php echo app('translator')->get('Last Logged In'); ?>:</strong>
                        <?php echo e($user->present()->lastLogin); ?>

                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php if(isset($activities)): ?>
        <div class="col-lg-7 col-xl-8">
            <?php echo $__env->make("user-activity::recent-activity", ['activities' => $activities], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/user/view.blade.php ENDPATH**/ ?>