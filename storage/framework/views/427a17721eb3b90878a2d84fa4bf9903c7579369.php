<?php $__env->startSection('page-title', __('My Profile')); ?>
<?php $__env->startSection('page-heading', __('My Profile')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->get('My Profile'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"
                           id="details-tab"
                           data-toggle="tab"
                           href="#details"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">
                            <?php echo app('translator')->get('User Details'); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           id="authentication-tab"
                           data-toggle="tab"
                           href="#login-details"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">
                            <?php echo app('translator')->get('Login Details'); ?>
                        </a>
                    </li>
                    <?php if(setting('2fa.enabled')): ?>
                        <li class="nav-item">
                            <a class="nav-link"
                               id="authentication-tab"
                               data-toggle="tab"
                               href="#2fa"
                               role="tab"
                               aria-controls="home"
                               aria-selected="true">
                                <?php echo app('translator')->get('Two-Factor Authentication'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>

                <div class="tab-content mt-4" id="nav-tabContent">
                    <div class="tab-pane fade show active px-2"
                         id="details"
                         role="tabpanel"
                         aria-labelledby="nav-home-tab">
                        <form action="<?php echo e(route('profile.update.details')); ?>" method="POST" id="details-form">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('user.partials.details', ['profile' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </form>
                    </div>

                    <div class="tab-pane fade px-2"
                         id="login-details"
                         role="tabpanel"
                         aria-labelledby="nav-profile-tab">
                        <form action="<?php echo e(route('profile.update.login-details')); ?>"
                              method="POST"
                              id="login-details-form">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('user.partials.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </form>
                    </div>

                    <?php if(setting('2fa.enabled')): ?>
                        <div class="tab-pane fade px-2" id="2fa" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <?php $route = Authy::isEnabled($user) ? 'disable' : 'enable'; ?>

                            <form action="<?php echo e(route("two-factor.{$route}")); ?>" method="POST" id="two-factor-form">
                                <?php echo csrf_field(); ?>
                                <?php echo $__env->make('user.partials.two-factor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route("profile.update.avatar")); ?>"
                      method="POST"
                      id="avatar-form"
                      enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo $__env->make('user.partials.avatar', ['updateUrl' => route('profile.update.avatar-external')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo HTML::script('assets/js/as/btn.js'); ?>

    <?php echo HTML::script('assets/js/as/profile.js'); ?>

    <?php echo JsValidator::formRequest('Vanguard\Http\Requests\User\UpdateDetailsRequest', '#details-form'); ?>

    <?php echo JsValidator::formRequest('Vanguard\Http\Requests\User\UpdateProfileLoginDetailsRequest', '#login-details-form'); ?>


    <?php if(setting('2fa.enabled')): ?>
        <?php echo JsValidator::formRequest('Vanguard\Http\Requests\TwoFactor\EnableTwoFactorRequest', '#two-factor-form'); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/user/profile.blade.php ENDPATH**/ ?>