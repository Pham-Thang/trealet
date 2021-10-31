<tr>
    <td class="align-middle"><?php echo e($tr->id_str); ?></a>
    </td>
    <td class="align-middle"><?php echo e($tr->title); ?></td>
    <td class="align-middle"><?php echo e($tr->type); ?></td>
    <td class="align-middle"><?php echo e($tr->created_at->format('y-m-d h:m')); ?></td>
    <td class="align-middle"><?php echo e($tr->state); ?></td>
	<td class="align-middle"><?php echo e($tr->open_at); ?></td>
	<td class="align-middle"><?php echo e($tr->close_at); ?></td>
	<td class="align-middle"><?php echo e($tr->published); ?></td>
    <td class="text-center align-middle">
        <div class="dropdown show d-inline-block">
            <a class="btn btn-icon"
               href="#" role="button" id="dropdownMenuLink"
               data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
				<a href="#" class="dropdown-item text-gray-500">
				<?php if(!$tr->published): ?>
                    <i class="fas fa-eye mr-2"></i>
                    <?php echo app('translator')->get('Publish'); ?>
				<?php else: ?>
					<i class="fas fa-eye-slash mr-2"></i>
                    <?php echo app('translator')->get('Publish'); ?>
				<?php endif; ?>
                </a>
				<a href="trealet-play-details?tr=<?php echo e($tr->id_str); ?>" class="dropdown-item text-gray-500">
                    <i class="fas fa-th-list mr-2"></i>
                    <?php echo app('translator')->get('Check plays'); ?>
                </a>
                <a href="#" class="dropdown-item text-gray-500">
                    <i class="fas fa-play mr-2"></i>
                    <?php echo app('translator')->get('Play'); ?>
                </a>
				<a href="#" class="dropdown-item text-gray-500">
                    <i class="fas fa-clone mr-2"></i>
                    <?php echo app('translator')->get('Make a copy'); ?>
                </a>
            </div>
        </div>

        <a href="#"
           class="btn btn-icon edit"
           title="<?php echo app('translator')->get('Edit Trealet'); ?>"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>

        <a href="#"
           class="btn btn-icon"
           title="<?php echo app('translator')->get('Delete Trealet'); ?>"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="<?php echo app('translator')->get('Please Confirm'); ?>"
           data-confirm-text="<?php echo app('translator')->get('Are you sure that you want to delete this trealet?'); ?>"
           data-confirm-delete="<?php echo app('translator')->get('Yes, delete it!'); ?>">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/trealets/partials/trealet-row.blade.php ENDPATH**/ ?>