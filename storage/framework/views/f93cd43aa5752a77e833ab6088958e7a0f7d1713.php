<?php $__env->startComponent('mail::message'); ?>

# <?php echo app('translator')->get('Hello!'); ?>

<?php echo app('translator')->get('You are receiving this email because we received a password reset request for your account.'); ?>

<?php $__env->startComponent('mail::button', ['url' => route('accept', ['token' => $invite->token])]); ?>
    <?php echo app('translator')->get('Confirm'); ?>

<?php /**PATH C:\Users\NDT\PycharmProjects\trealet\audiences\resources\views/mail/invite-creator.blade.php ENDPATH**/ ?>