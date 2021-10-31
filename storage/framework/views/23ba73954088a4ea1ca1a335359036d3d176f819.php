<?php $__env->startComponent('mail::message'); ?>

# <?php echo app('translator')->get('Hello!'); ?>

<?php echo app('translator')->get('You are receiving this email because someone invited you become their creator'); ?>

<?php $__env->startComponent('mail::button', [ 'url' => route('accept', [$invite->token])]); ?>
    <?php echo app('translator')->get('Accept invite'); ?>
<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>


<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\NDT\PycharmProjects\trealet\audiences\resources\views/mail/invite.blade.php ENDPATH**/ ?>