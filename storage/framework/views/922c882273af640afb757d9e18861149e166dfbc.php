<?php $__env->startSection('page-title', __('Sign Up')); ?>

<?php if(setting('registration.captcha.enabled')): ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
<?php endif; ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-8 col-lg-6 col-xl-5 mx-auto my-10p">
        <div class="text-center">
            <img src="<?php echo e(url('assets/img/vanguard-logo.png')); ?>" alt="<?php echo e(setting('app_name')); ?>" height="50">
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title text-center mt-4 text-uppercase">
                    <?php echo app('translator')->get('Register'); ?>
                </h5>

                <div class="p-4">
                    <?php echo $__env->make('auth.social.buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('partials/messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <form role="form" action="<?= url('register') ?>" method="post" id="registration-form" autocomplete="off" class="mt-3">
                        <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                        <div class="form-group">
                            <input type="email"
                                   name="email"
                                   id="email"
                                   class="form-control input-solid"
                                   placeholder="<?php echo app('translator')->get('Email'); ?>"
                                   value="<?php echo e(old('email')); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text"
                                   name="username"
                                   id="username"
                                   class="form-control input-solid"
                                   placeholder="<?php echo app('translator')->get('Username'); ?>"
                                   value="<?php echo e(old('username')); ?>">
                        </div>
                        <div class="form-group">
                            <input type="password"
                                   name="password"
                                   id="password"
                                   class="form-control input-solid"
                                   placeholder="<?php echo app('translator')->get('Password'); ?>">
                        </div>
                         <div class="form-group">
                            <input type="password"
                                   name="password_confirmation"
                                   id="password_confirmation"
                                   class="form-control input-solid"
                                   placeholder="<?php echo app('translator')->get('Confirm Password'); ?>">
                        </div>

                        <?php if(setting('tos')): ?>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="tos" id="tos" value="1"/>
                                <label class="custom-control-label font-weight-normal" for="tos">
                                    <?php echo app('translator')->get('I accept'); ?>
                                    <a href="#tos-modal" data-toggle="modal"><?php echo app('translator')->get('Terms of Service'); ?></a>
                                </label>
                            </div>
                        <?php endif; ?>

                        
                        <?php if(setting('registration.captcha.enabled')): ?>
                            <div class="form-group my-4">
                                <?php echo app('captcha')->display(); ?>

                            </div>
                        <?php endif; ?>
                        

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-login">
                                <?php echo app('translator')->get('Register'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="text-center text-muted">
            <?php if(setting('reg_enabled')): ?>
                <?php echo app('translator')->get('Already have an account?'); ?>
                <a class="font-weight-bold" href="<?= url("login") ?>"><?php echo app('translator')->get('Login'); ?></a>
            <?php endif; ?>
        </div>

    </div>

    <?php if(setting('tos')): ?>
        <div class="modal fade" id="tos-modal" tabindex="-1" role="dialog" aria-labelledby="tos-label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tos-label"><?php echo app('translator')->get('Terms of Service'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo $__env->make('auth.tos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <?php echo app('translator')->get('Close'); ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo JsValidator::formRequest('Vanguard\Http\Requests\Auth\RegisterRequest', '#registration-form'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/auth/register.blade.php ENDPATH**/ ?>