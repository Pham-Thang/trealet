<div class="form-group">
    <label for="email"><?php echo app('translator')->get('Email'); ?></label>
    <input type="email"
           class="form-control input-solid"
           id="email"
           name="email"
           placeholder="<?php echo app('translator')->get('Email'); ?>"
           value="<?php echo e($edit ? $user->email : ''); ?>">
</div>

<div class="form-group">
    <label for="username"><?php echo app('translator')->get('Username'); ?></label>
    <input type="text"
           class="form-control input-solid"
           id="username"
           placeholder="(<?php echo app('translator')->get('optional'); ?>)"
           name="username"
           value="<?php echo e($edit ? $user->username : ''); ?>">
</div>

<div class="form-group">
    <label for="password"><?php echo e($edit ? __("New Password") : __('Password')); ?></label>
    <input type="password"
           class="form-control input-solid"
           id="password"
           name="password"
           <?php if($edit): ?> placeholder="<?php echo app('translator')->get("Leave field blank if you don't want to change it"); ?>" <?php endif; ?>>
</div>

<div class="form-group">
    <label for="password_confirmation"><?php echo e($edit ? __("Confirm New Password") : __('Confirm Password')); ?></label>
    <input type="password"
           class="form-control input-solid"
           id="password_confirmation"
           name="password_confirmation"
           <?php if($edit): ?> placeholder="<?php echo app('translator')->get("Leave field blank if you don't want to change it"); ?>" <?php endif; ?>>
</div>

<?php if($edit): ?>
    <button type="submit" class="btn btn-primary mt-2" id="update-login-details-btn">
        <i class="fa fa-refresh"></i>
        <?php echo app('translator')->get('Update Details'); ?>
    </button>
<?php endif; ?>
<?php /**PATH /var/www/html/trealet.com/audiences/resources/views/user/partials/auth.blade.php ENDPATH**/ ?>