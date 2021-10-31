<div class="card widget">
    <div class="card-body">
        <div class="row">
            <div class="p-3 text-primary flex-1">
                <i class="fa fa-users fa-3x"></i>
            </div>

            <div class="pr-3">
                <h2 class="text-right"><?php echo e(number_format($count)); ?></h2>
                <div class="text-muted"><?php echo app('translator')->get('Total Users'); ?></div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/trealet.com/audiences/resources/views/plugins/dashboard/widgets/total-users.blade.php ENDPATH**/ ?>