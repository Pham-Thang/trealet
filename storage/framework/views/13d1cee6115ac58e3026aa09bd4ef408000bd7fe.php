<?php $__env->startSection('page-title', __('Authentication Settings')); ?>
<?php $__env->startSection('page-heading', __('Authentication')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item text-muted">
        <?php echo app('translator')->get('Settings'); ?>
    </li>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->get('Authentication'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Nav tabs -->
<ul class="nav nav-pills mb-4 mt-2" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a href="#auth"
           class="nav-link active"
           id="pills-home-tab"
           data-toggle="pill"
           aria-controls="pills-home"
           aria-selected="true">
            <i class="fa fa-lock"></i>
            <?php echo app('translator')->get('Authentication'); ?>
        </a>
    </li>
    <li class="nav-item">
        <a href="#registration"
           class="nav-link"
           id="pills-home-tab"
           data-toggle="pill"
           aria-controls="pills-home"
           aria-selected="true">
            <i class="fa fa-user-plus"></i>
            <?php echo app('translator')->get('Registration'); ?>
        </a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="auth">
        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('settings.partials.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('settings.partials.two-factor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-6">
                <?php echo $__env->make('settings.partials.throttling', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="registration">
        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('settings.partials.registration', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-6">
                <?php echo $__env->make('settings.partials.recaptcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/settings/auth.blade.php ENDPATH**/ ?>