<?php $__env->startSection('page-title', __('Announcements')); ?>
<?php $__env->startSection('page-heading', __('Announcements')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->get('Announcements'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="d-flex mb-4">
        <a href="<?php echo e(route('announcements.create')); ?>" class="btn btn-primary btn-rounded ml-auto">
            <i class="fas fa-plus mr-2"></i>
            <?php echo app('translator')->get('Create Announcement'); ?>
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-borderless table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="min-width-150"><?php echo app('translator')->get('Creator'); ?></th>
                        <th class="min-width-150"><?php echo app('translator')->get('Title'); ?></th>
                        <th class="min-width-150"><?php echo app('translator')->get('Created At'); ?></th>
                        <th class="text-center min-width-150"><?php echo app('translator')->get('Action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($announcements)): ?>
                        <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 40px;">
                                    <a href="<?php echo e(route('users.show', $announcement->creator)); ?>">
                                        <img
                                            class="rounded-circle img-responsive"
                                            width="40"
                                            src="<?php echo e($announcement->creator->present()->avatar); ?>"
                                            alt="<?php echo e($announcement->creator->present()->name); ?>">
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <?php if (\Auth::user()->hasPermission('users.manage')) : ?>
                                        <a href="<?php echo e(route('users.show', $announcement->creator)); ?>">
                                            <?php echo e($announcement->creator->username ?: __('N/A')); ?>

                                        </a>
                                    <?php else: ?>
                                        <span><?php echo e($announcement->creator->username ?: __('N/A')); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="align-middle">
                                    <a href="<?php echo e(route('announcements.show', $announcement)); ?>">
                                        <?php echo e(\Illuminate\Support\Str::limit($announcement->title, 50)); ?>

                                    </a>
                                </td>
                                <td class="align-middle">
                                    <?php echo e($announcement->created_at->format(config('app.date_format'))); ?>

                                </td>
                                <td class="text-center align-middle">
                                    <a href="<?php echo e(route('announcements.edit', $announcement)); ?>"
                                       class="btn btn-icon edit"
                                       title="<?php echo app('translator')->get('Edit Announcement'); ?>"
                                       data-toggle="tooltip" data-placement="top">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="<?php echo e(route('announcements.destroy', $announcement)); ?>"
                                       class="btn btn-icon"
                                       title="<?php echo app('translator')->get('Delete Announcement'); ?>"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       data-method="DELETE"
                                       data-confirm-title="<?php echo app('translator')->get('Please Confirm'); ?>"
                                       data-confirm-text="<?php echo app('translator')->get('Are you sure that you want to delete this announcement?'); ?>"
                                       data-confirm-delete="<?php echo app('translator')->get('Yes, delete it!'); ?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7"><em><?php echo app('translator')->get('No announcements found.'); ?></em></td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php echo $announcements->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/vendor/vanguardapp/announcements/src/../resources/views/index.blade.php ENDPATH**/ ?>