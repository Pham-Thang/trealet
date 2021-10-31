<div class="card widget">
    <div class="card-body">
        <div class="row">
            <div class="p-3 text-info flex-1">
                <i class="fa fa-user fa-3x"></i>
            </div>

            <div class="pr-3">
                <h2 class="text-right"><?php echo e(number_format($count)); ?></h2>
                <div class="text-muted"><?php echo app('translator')->get('Unconfirmed Users'); ?></div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/trealet.com/audiences/resources/views/plugins/dashboard/widgets/unconfirmed-users.blade.php ENDPATH**/ ?>