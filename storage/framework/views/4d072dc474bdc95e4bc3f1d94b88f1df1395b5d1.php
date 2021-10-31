<?php $__env->startSection('page-title', $user->present()->nameOrEmail . ' - ' . __('Active Sessions')); ?>

<?php $__env->startSection('page-heading'); ?>
    <?php echo app('translator')->get('Sessions'); ?> (<?php echo e($user->present()->nameOrEmail); ?>)
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <?php if(isset($adminView)): ?>
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('users.index')); ?>"><?php echo app('translator')->get('Users'); ?></a>
        </li>

        <li class="breadcrumb-item">
            <a href="<?php echo e(route('users.show', $user->id)); ?>">
                <?php echo e($user->present()->nameOrEmail); ?>

            </a>
        </li>
    <?php endif; ?>

    <li class="breadcrumb-item active">
        <?php echo app('translator')->get('Sessions'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('IP Address'); ?></th>
                        <th><?php echo app('translator')->get('Device'); ?></th>
                        <th><?php echo app('translator')->get('Browser'); ?></th>
                        <th><?php echo app('translator')->get('Last Activity'); ?></th>
                        <th class="text-center"><?php echo app('translator')->get('Action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($sessions)): ?>
                        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($session->ip_address); ?></td>
                                <td>
                                    <?php echo e($session->device ?: __('Unknown')); ?> (<?php echo e($session->platform ?: __('Unknown')); ?>)
                                </td>
                                <td><?php echo e($session->browser ?: __('Unknown')); ?></td>
                                <td><?php echo e($session->last_activity->format(config('app.date_time_format'))); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(isset($profile) ? route('profile.sessions.invalidate', $session->id) : route('user.sessions.invalidate', [$user->id, $session->id])); ?>"
                                       class="btn btn-icon"
                                       title="<?php echo app('translator')->get('Invalidate Session'); ?>"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       data-method="DELETE"
                                       data-confirm-title="<?php echo app('translator')->get('Please Confirm'); ?>"
                                       data-confirm-text="<?php echo app('translator')->get('Are you sure that you want to invalidate this session?'); ?>"
                                       data-confirm-delete="<?php echo app('translator')->get('Yes, proceed!'); ?>">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6"><em><?php echo app('translator')->get('No records found.'); ?></em></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/user/sessions.blade.php ENDPATH**/ ?>