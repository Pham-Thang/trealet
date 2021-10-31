<div class="card">
    <h6 class="card-header">
        <?php echo app('translator')->get('General'); ?>
    </h6>

    <div class="card-body">
        <?php echo Form::open(['route' => 'settings.auth.update', 'id' => 'auth-general-settings-form']); ?>


        <div class="form-group mb-4">
            <div class="d-flex align-items-center">
                 <div class="switch">
                     <input type="hidden" value="0" name="remember_me">
                     <?php echo Form::checkbox('remember_me', 1, setting('remember_me'), ['class' => 'switch', 'id' => 'switch-remember-me']); ?>

                     <label for="switch-remember-me"></label>
                 </div>
                <div class="ml-3 d-flex flex-column">
                    <label class="mb-0"><?php echo app('translator')->get('Allow "Remember Me"'); ?></label>
                    <small class="pt-0 text-muted">
                        <?php echo app('translator')->get("Should 'Remember Me' checkbox be displayed on login form?"); ?>
                    </small>
                </div>
            </div>
        </div>

        <div class="form-group my-4">
            <div class="d-flex align-items-center">
                <div class="switch">
                    <input type="hidden" value="0" name="forgot_password">
                    <?php echo Form::checkbox('forgot_password', 1, setting('forgot_password'), ['class' => 'switch', 'id' => 'switch-forgot-pass']); ?>

                    <label for="switch-forgot-pass"></label>
                </div>
                <div class="ml-3 d-flex flex-column">
                    <label class="mb-0"><?php echo app('translator')->get('Forgot Password'); ?></label>
                    <small class="pt-0 text-muted">
                        <?php echo app('translator')->get('Enable/Disable forgot password feature.'); ?>
                    </small>
                </div>
            </div>
        </div>

        <div class="form-group my-4">
            <label for="login_reset_token_lifetime">
                <?php echo app('translator')->get('Reset Token Lifetime'); ?> <br>
                <small class="text-muted">
                    <?php echo app('translator')->get('Number of minutes that the reset token should be considered valid.'); ?>
                </small>
            </label>
            <input type="text" name="login_reset_token_lifetime"
                   class="form-control input-solid" value="<?php echo e(setting('login_reset_token_lifetime', 30)); ?>">
        </div>

        <button type="submit" class="btn btn-primary">
            <?php echo app('translator')->get('Update'); ?>
        </button>

        <?php echo Form::close(); ?>

    </div>
</div>
<?php /**PATH /var/www/html/trealet.com/audiences/resources/views/settings/partials/auth.blade.php ENDPATH**/ ?>