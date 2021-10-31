<div class="col-md-3">
    <div class="card">
        <div class="card-body">
            <a href="<?php echo e(route('profile')); ?>" class="text-center no-decoration">
                <div class="icon my-3">
                    <i class="fas fa-user fa-2x"></i>
                </div>
                <p class="lead mb-0"><?php echo app('translator')->get('Update Profile'); ?></p>
            </a>
        </div>
    </div>
</div>

<?php if(config('session.driver') == 'database'): ?>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <a href="<?php echo e(route('profile.sessions')); ?>" class="text-center  no-decoration">
                    <div class="icon my-3">
                        <i class="fa fa-list fa-2x"></i>
                    </div>
                    <p class="lead mb-0"><?php echo app('translator')->get('My Sessions'); ?></p>
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="col-md-3">
    <div class="card">
        <div class="card-body">
            <a href="<?php echo e(route('profile.activity')); ?>" class="text-center no-decoration">
                <div class="icon my-3">
                    <i class="fas fa-server fa-2x"></i>
                </div>
                <p class="lead mb-0"><?php echo app('translator')->get('Activity Log'); ?></p>
            </a>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card">
        <div class="card-body">
            <a href="<?php echo e(route('auth.logout')); ?>" class="text-center no-decoration">
                <div class="icon my-3">
                    <i class="fas fa-sign-out-alt fa-2x"></i>
                </div>
                <p class="lead mb-0"><?php echo app('translator')->get('Logout'); ?></p>
            </a>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/trealet.com/audiences/resources/views/plugins/dashboard/widgets/user-actions.blade.php ENDPATH**/ ?>