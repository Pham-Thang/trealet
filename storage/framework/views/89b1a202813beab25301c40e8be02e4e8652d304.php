<div class="card">
    <h6 class="card-header d-flex align-items-center justify-content-between">
        <?php echo app('translator')->get('Latest Activity'); ?>

        <?php if(count($activities)): ?>
            <small>
                <a href="<?php echo e(route('activity.user', $user->id)); ?>"
                   class="edit"
                   data-toggle="tooltip"
                   data-placement="top"
                   title="<?php echo app('translator')->get('Complete Activity Log'); ?>">
                    <?php echo app('translator')->get('View All'); ?>
                </a>
            </small>
        <?php endif; ?>
    </h6>

    <div class="card-body">
        <?php if(count($activities)): ?>
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th><?php echo app('translator')->get('Action'); ?></th>
                    <th><?php echo app('translator')->get('Date'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($activity->description); ?></td>
                        <td><?php echo e($activity->created_at->format(config('app.date_time_format'))); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-muted font-weight-light">
                <em><?php echo app('translator')->get('No activity from this user yet.'); ?></em>
            </p>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /var/www/html/trealet.com/audiences/vendor/vanguardapp/activity-log/src/../resources/views/recent-activity.blade.php ENDPATH**/ ?>