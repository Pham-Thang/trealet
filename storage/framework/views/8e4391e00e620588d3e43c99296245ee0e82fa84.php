<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-1"><?php echo app('translator')->get('Two-Factor Authentication'); ?></h5>

        <small class="text-muted d-block mb-4">
            <?php echo app('translator')->get('Enable/Disable Two-Factor Authentication for the application.'); ?>
        </small>

        <?php if(! config('services.authy.key')): ?>
            <div class="alert alert-info">
                <?php echo app('translator')->get('In order to enable Two-Factor Authentication you have to register and create new application on'); ?>
                <a href="https://www.authy.com/" target="_blank"><strong><?php echo app('translator')->get('Authy website'); ?></strong></a>,
                <?php echo app('translator')->get('and update your'); ?> <code>AUTHY_KEY</code>
                <?php echo app('translator')->get('environment variable inside'); ?> <code>.env</code> <?php echo app('translator')->get('file'); ?>.
            </div>
        <?php else: ?>
            <?php if(setting('2fa.enabled')): ?>
                <?php echo Form::open(['route' => 'settings.auth.2fa.disable', 'id' => 'auth-2fa-settings-form']); ?>

                <button type="submit"
                        class="btn btn-danger"
                        data-toggle="loader"
                        data-loading-text="<?php echo app('translator')->get('Disabling...'); ?>">
                    <?php echo app('translator')->get('Disable'); ?>
                </button>
                <?php echo Form::close(); ?>

            <?php else: ?>
                <?php echo Form::open(['route' => 'settings.auth.2fa.enable', 'id' => 'auth-2fa-settings-form']); ?>

                <button type="submit"
                        class="btn btn-primary"
                        data-toggle="loader"
                        data-loading-text="<?php echo app('translator')->get('Enabling...'); ?>">
                    <?php echo app('translator')->get('Enable'); ?>
                </button>
                <?php echo Form::close(); ?>

            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /var/www/html/trealet.com/audiences/resources/views/settings/partials/two-factor.blade.php ENDPATH**/ ?>