<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e(__('Verify Your Email Address')); ?></h5>

                        <?php if(session('resent')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(__('A fresh verification link has been sent to your email address.')); ?>

                            </div>
                        <?php endif; ?>

                        <?php echo e(__('Before proceeding, please check your email for a verification link.')); ?>

                        <?php echo e(__('If you did not receive the email')); ?>,
                        <form action="<?php echo e(route('verification.resend')); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="d-inline btn btn-link p-0">
                                <?php echo e(__('click here to request another')); ?>

                            </button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/auth/verify.blade.php ENDPATH**/ ?>