<?php $__env->startSection('page-title', __('Add User')); ?>
<?php $__env->startSection('page-heading', __('Create New User')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('users.index')); ?>"><?php echo app('translator')->get('Users'); ?></a>
    </li>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->get('Create'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo Form::open(['route' => 'users.store', 'files' => true, 'id' => 'user-form']); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        <?php echo app('translator')->get('User Details'); ?>
                    </h5>
                    <p class="text-muted font-weight-light">
                        <?php echo app('translator')->get('A general user profile information.'); ?>
                    </p>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->make('user.partials.details', ['edit' => false, 'profile' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        <?php echo app('translator')->get('Login Details'); ?>
                    </h5>
                    <p class="text-muted font-weight-light">
                        <?php echo app('translator')->get('Details used for authenticating with the application.'); ?>
                    </p>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->make('user.partials.auth', ['edit' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                <?php echo app('translator')->get('Create User'); ?>
            </button>
        </div>
    </div>
<?php echo Form::close(); ?>


<br>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo HTML::script('assets/js/as/profile.js'); ?>

    <?php echo JsValidator::formRequest('Vanguard\Http\Requests\User\CreateUserRequest', '#user-form'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/user/add.blade.php ENDPATH**/ ?>