<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<tr>
    <td class="align-middle"><?php echo e($tr->id_str); ?></a>
    </td>
    <td class="align-middle"><?php echo e($tr->title); ?></td>
    <td class="align-middle"><?php echo e($tr->type); ?></td>
    <td class="align-middle"><?php echo e($tr->created_at->format('y-m-d h:m')); ?></td>
    <td class="align-middle"><?php echo e($tr->state); ?></td>
    <td class="align-middle"><?php echo e($tr->open_at); ?></td>
    <td class="align-middle"><?php echo e($tr->close_at); ?></td>

    <?php if($tr->published == 0): ?>

        <td class="align-middle">No one</td>
    <?php endif; ?>
    <?php if($tr->published == 1): ?>

        <td class="align-middle">Everyone</td>

    <?php endif; ?>
    <?php if($tr->published == 2): ?>

        <td class="align-middle">Everyone with key</td>
    <?php endif; ?>
        <td class="text-center align-middle">
            <div class="dropdown show d-inline-block">
                <a class="btn btn-icon"
                   href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-h"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">

                    <?php if($tr->role == 1 || $tr->role == 0): ?>
                        <a href="trealet-play-details?tr=<?php echo e($tr->id_str); ?>" class="dropdown-item text-gray-500">
                            <i class="fas fa-th-list mr-2"></i>
                            <?php echo app('translator')->get('Check plays'); ?>
                        </a>
                    <?php endif; ?>

                    <a href="play/<?php echo e($tr->id); ?>" class="dropdown-item text-gray-500">
                        <i class="fas fa-play mr-2"></i>
                        <?php echo app('translator')->get('Play'); ?>
                    </a>
                    <?php if($tr->role == 1 || $tr->role == 0): ?>
                        <a href="duplicate/<?php echo e($tr->id); ?>" class="dropdown-item text-gray-500">
                            <i class="fas fa-clone mr-2"></i>
                            <?php echo app('translator')->get('Make a copy'); ?>
                        </a>
                    <?php endif; ?>
                    <?php if($tr->role == 0 ): ?>
                        <a href="invite/<?php echo e($tr->id); ?>" class="dropdown-item text-gray-500">
                            <i class="fas fa-users   mr-2"></i>
                            <?php echo app('translator')->get('Share'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <?php if($tr->role == 1 || $tr->role == 0 ): ?>
                <a href="show_edit_trealet/<?php echo e($tr->id); ?>"
                   class="btn btn-icon edit"
                   title="<?php echo app('translator')->get('Edit Trealet'); ?>"
                   data-toggle="tooltip" data-placement="top">
                    <i class="fas fa-edit"></i>
                </a>
            <?php endif; ?>
            <?php if($tr->role == 0 ): ?>
                <a href='delete/<?php echo e($tr->id); ?>'
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
            <?php endif; ?>
        </td>
</tr>
<style>
    .custom-select{
        background-color: unset;
        border: unset;
        color: black;
    }
</style>

<?php /**PATH C:\Users\NDT\PycharmProjects\trealet\audiences\resources\views/trealets/partials/trealet-row.blade.php ENDPATH**/ ?>