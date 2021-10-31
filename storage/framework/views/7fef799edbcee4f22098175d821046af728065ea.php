<?php $__env->startSection('page-title', __('Notification Settings')); ?>
<?php $__env->startSection('page-heading', __('Notification Settings')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item text-muted">
        <?php echo app('translator')->get('Settings'); ?>
    </li>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->get('Notifications'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <h5 class="card-header">
                <?php echo app('translator')->get('Email Notifications'); ?>
            </h5>

            <div class="card-body">
                <?php echo Form::open(['route' => 'settings.notifications.update', 'id' => 'notification-settings-form']); ?>


                    <div class="form-group mb-4">
                        <div class="d-flex align-items-center">
                            <div class="switch">
                                <input type="hidden" value="0" name="notifications_signup_email">

                                <input type="checkbox"
                                       name="notifications_signup_email"
                                       class="switch"
                                       value="1"
                                       id="switch-signup-email"
                                       <?php echo e(setting('notifications_signup_email') ? 'checked' : ''); ?>>

                                <label for="switch-signup-email"></label>
                            </div>
                            <div class="ml-3 d-flex flex-column">
                                <label class="mb-0"><?php echo app('translator')->get('Sign-Up Notification'); ?></label>

                                <small class="pt-0 text-muted">
                                    <?php echo app('translator')->get('Send an email to the Administrators when user signs up.'); ?>
                                </small>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">
                        <?php echo app('translator')->get('Update'); ?>
                    </button>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/settings/notifications.blade.php ENDPATH**/ ?>