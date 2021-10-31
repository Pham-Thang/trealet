<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-1">
            <?php echo app('translator')->get('Google reCAPTCHA'); ?>
        </h5>

        <small class="text-muted d-block mb-4">
            <?php echo app('translator')->get('Enable/Disable Google reCAPTCHA during the registration.'); ?>
        </small>

        <?php if(! (config('captcha.secret') && config('captcha.sitekey'))): ?>
            <div class="alert alert-info">
                <?php echo app('translator')->get('To utilize Google reCAPTCHA, please get your'); ?> <code><?php echo app('translator')->get('Site Key'); ?></code>
                <?php echo app('translator')->get('and'); ?> <code><?php echo app('translator')->get('Secret Key'); ?></code>
                <?php echo app('translator')->get('from'); ?>
                <a href="https://www.google.com/recaptcha/intro/index.html" target="_blank">
                    <strong><?php echo app('translator')->get('reCAPTCHA Website'); ?></strong>
                </a>,
                <?php echo app('translator')->get('and update your'); ?> <code>RECAPTCHA_SITEKEY</code> <?php echo app('translator')->get('and'); ?>
                <code>RECAPTCHA_SECRETKEY</code> <?php echo app('translator')->get('environment variables inside'); ?> <code>.env</code>
                <?php echo app('translator')->get('file'); ?>.
            </div>
        <?php else: ?>
            <?php if(setting('registration.captcha.enabled')): ?>
                <?php echo Form::open(['route' => 'settings.registration.captcha.disable', 'id' => 'captcha-settings-form']); ?>

                <button type="submit" class="btn btn-danger">
                    <?php echo app('translator')->get('Disable'); ?>
                </button>
                <?php echo Form::close(); ?>

            <?php else: ?>
                <?php echo Form::open(['route' => 'settings.registration.captcha.enable', 'id' => 'captcha-settings-form']); ?>

                <button type="submit" class="btn btn-primary">
                    <?php echo app('translator')->get('Enable'); ?>
                </button>
                <?php echo Form::close(); ?>

            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /var/www/html/trealet.com/audiences/resources/views/settings/partials/recaptcha.blade.php ENDPATH**/ ?>