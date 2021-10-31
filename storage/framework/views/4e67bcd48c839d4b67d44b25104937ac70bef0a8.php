<div class="card">
    <h6 class="card-header"><?php echo app('translator')->get('General'); ?></h6>

    <div class="card-body">
        <?php echo Form::open(['route' => 'settings.auth.update', 'id' => 'registration-settings-form']); ?>


        <div class="form-group mb-4">
            <div class="d-flex align-items-center">
                <div class="switch">
                    <input type="hidden" value="0" name="reg_enabled">

                    <input
                        type="checkbox" name="reg_enabled"
                        id="switch-reg-enabled"
                        class="switch" value="1"
                        <?php echo e(setting('reg_enabled') ? 'checked' : ''); ?>>

                    <label for="switch-reg-enabled"></label>
                </div>
                <div class="ml-3 d-flex flex-column">
                    <label class="mb-0"><?php echo app('translator')->get('Allow Registration'); ?></label>
                </div>
            </div>
        </div>

        <div class="form-group my-4">
            <div class="d-flex align-items-center">
                <div class="switch">
                    <input type="hidden" value="0" name="tos">
                    <?php echo Form::checkbox('tos', 1, setting('tos'), ['class' => 'switch', 'id' => 'switch-tos']); ?>

                    <label for="switch-tos"></label>
                </div>
                <div class="ml-3 d-flex flex-column">
                    <label class="mb-0"><?php echo app('translator')->get('Terms & Conditions'); ?></label>
                    <small class="pt-0 text-muted">
                        <?php echo app('translator')->get('The user has to confirm that he agree with terms and conditions in order to create an account.'); ?>
                    </small>
                </div>
            </div>
        </div>

        <div class="form-group my-4">
            <div class="d-flex align-items-center">
                <div class="switch">
                    <input type="hidden" value="0" name="reg_email_confirmation">
                    <?php echo Form::checkbox('reg_email_confirmation', 1, setting('reg_email_confirmation'), ['class' => 'switch', 'id' => 'switch-reg-email-confirm']); ?>

                    <label for="switch-reg-email-confirm"></label>
                </div>
                <div class="ml-3 d-flex flex-column">
                    <label class="mb-0">
                        <?php echo app('translator')->get('Email Confirmation'); ?>
                    </label>
                    <small class="text-muted">
                        <?php echo app('translator')->get('Require email confirmation from your newly registered users.'); ?>
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
<?php /**PATH /var/www/html/trealet.com/audiences/resources/views/settings/partials/registration.blade.php ENDPATH**/ ?>