<?php $__env->startComponent('mail::message'); ?>

# <?php echo app('translator')->get('Hello!'); ?>

<?php echo app('translator')->get('New user was just registered on :app website.', ['app' => setting('app_name')]); ?>


<?php echo app('translator')->get('To view the user details just visit the link below.'); ?>


<?php $__env->startComponent('mail::button', ['url' => route('users.show', $user)]); ?>
    <?php echo app('translator')->get('View User'); ?>
<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>


<?php echo app('translator')->get('Regards'); ?>,<br>
<?php echo e(setting('app_name')); ?>


<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /var/www/html/trealet.com/audiences/resources/views/mail/user-registered.blade.php ENDPATH**/ ?>