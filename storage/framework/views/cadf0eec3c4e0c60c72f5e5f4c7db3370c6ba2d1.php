<?php $__env->startComponent('mail.html.message'); ?>

    # <?php echo app('translator')->get('Hello!'); ?>

    <?php echo app('translator')->get('New user was just registered on :app website.', ['app' => setting('app_name')]); ?>


    <?php echo app('translator')->get('To view the user details just visit the link below.'); ?>







    <?php echo app('translator')->get('Regards'); ?>,<br>
    <?php echo e(setting('app_name')); ?>


<?php if (isset($__componentOriginal6d4e6018bb0a6b305b74a68fe93c2fc7250cec68)): ?>
<?php $component = $__componentOriginal6d4e6018bb0a6b305b74a68fe93c2fc7250cec68; ?>
<?php unset($__componentOriginal6d4e6018bb0a6b305b74a68fe93c2fc7250cec68); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\NDT\PycharmProjects\trealet\audiences\resources\views/mail/send-invite.blade.php ENDPATH**/ ?>