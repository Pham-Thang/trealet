<tr>
    <td style="width: 40px;">
        <a href="<?php echo e(route('users.show', $user)); ?>">
            <img
                class="rounded-circle img-responsive"
                width="40"
                src="<?php echo e($user->present()->avatar); ?>"
                alt="<?php echo e($user->present()->name); ?>">
        </a>
    </td>
    <td class="align-middle">
        <a href="<?php echo e(route('users.show', $user)); ?>">
            <?php echo e($user->username ?: __('N/A')); ?>

        </a>
    </td>
    <td class="align-middle"><?php echo e($user->first_name . ' ' . $user->last_name); ?></td>
    <td class="align-middle"><?php echo e($user->email); ?></td>
    <td class="align-middle"><?php echo e($user->created_at->format(config('app.date_format'))); ?></td>
    <td class="align-middle">
        <span class="badge badge-lg badge-<?php echo e($user->present()->labelClass); ?>">
            <?php echo e(trans("app.status.{$user->status}")); ?>

        </span>
    </td>
    <td class="text-center align-middle">
        <div class="dropdown show d-inline-block">
            <a class="btn btn-icon"
               href="#" role="button" id="dropdownMenuLink"
               data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <?php if(config('session.driver') == 'database'): ?>
                    <a href="<?php echo e(route('user.sessions', $user)); ?>" class="dropdown-item text-gray-500">
                        <i class="fas fa-list mr-2"></i>
                        <?php echo app('translator')->get('User Sessions'); ?>
                    </a>
                <?php endif; ?>
                <a href="<?php echo e(route('users.show', $user)); ?>" class="dropdown-item text-gray-500">
                    <i class="fas fa-eye mr-2"></i>
                    <?php echo app('translator')->get('View User'); ?>
                </a>

                <?php if (can_be_impersonated($user, )) : ?>
                    <a href="<?php echo e(route('impersonate', $user)); ?>" class="dropdown-item text-gray-500 impersonate">
                        <i class="fas fa-user-secret mr-2"></i>
                        <?php echo app('translator')->get('Impersonate'); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <a href="<?php echo e(route('users.edit', $user)); ?>"
           class="btn btn-icon edit"
           title="<?php echo app('translator')->get('Edit User'); ?>"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>

        <a href="<?php echo e(route('users.destroy', $user)); ?>"
           class="btn btn-icon"
           title="<?php echo app('translator')->get('Delete User'); ?>"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="<?php echo app('translator')->get('Please Confirm'); ?>"
           data-confirm-text="<?php echo app('translator')->get('Are you sure that you want to delete this user?'); ?>"
           data-confirm-delete="<?php echo app('translator')->get('Yes, delete him!'); ?>">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/user/partials/row.blade.php ENDPATH**/ ?>