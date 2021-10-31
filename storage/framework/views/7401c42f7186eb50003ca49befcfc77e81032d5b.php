<?php $__env->startSection('page-title', trans('Login')); ?>

<?php $__env->startSection('content'); ?>

<div class="col-md-8 col-lg-6 col-xl-5 mx-auto my-10p" id="login">
    <div class="text-center">
        <img src="<?php echo e(url('assets/img/trealet-logo.png')); ?>" alt="<?php echo e(setting('app_name')); ?>" height="100">
    </div>

    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title text-center mt-4 text-uppercase">
                <?php echo app('translator')->get('Login'); ?>
            </h5>

            <div class="p-4">
                <?php echo $__env->make('auth.social.buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form role="form" action="<?= url('login') ?>" method="POST" id="login-form" autocomplete="off" class="mt-3">

                    <input type="hidden" value="<?= csrf_token() ?>" name="_token">

                    <?php if(Request::has('to')): ?>
                        <input type="hidden" value="<?php echo e(Request::get('to')); ?>" name="to">
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="username" class="sr-only"><?php echo app('translator')->get('Email or Username'); ?></label>
                        <input type="text"
                                name="username"
                                id="username"
                                class="form-control input-solid"
                                placeholder="<?php echo app('translator')->get('Email or Username'); ?>"
                                value="<?php echo e(old('username')); ?>">
                    </div>

                    <div class="form-group password-field">
                        <label for="password" class="sr-only"><?php echo app('translator')->get('Password'); ?></label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control input-solid"
                               placeholder="<?php echo app('translator')->get('Password'); ?>">
                    </div>


                    <?php if(setting('remember_me')): ?>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" value="1"/>
                            <label class="custom-control-label font-weight-normal" for="remember">
                                <?php echo app('translator')->get('Remember me?'); ?>
                            </label>
                        </div>
                    <?php endif; ?>


                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-login">
                            <?php echo app('translator')->get('Log In'); ?>
                        </button>
                    </div>
                </form>

                <?php if(setting('forgot_password')): ?>
                    <a href="<?= route('password.request') ?>" class="forgot"><?php echo app('translator')->get('I forgot my password'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="text-center text-muted">
        <?php if(setting('reg_enabled')): ?>
            <?php echo app('translator')->get("Don't have an account?"); ?>
            <a class="font-weight-bold" href="<?= url("register") ?>"><?php echo app('translator')->get('Sign Up'); ?></a>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo HTML::script('assets/js/as/login.js'); ?>

    <?php echo JsValidator::formRequest('Vanguard\Http\Requests\Auth\LoginRequest', '#login-form'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/auth/login.blade.php ENDPATH**/ ?>