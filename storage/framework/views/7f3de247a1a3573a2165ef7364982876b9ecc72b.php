

<?php $__env->startSection('page-title', 'Trealet plays'); ?>
<?php $__env->startSection('page-heading', 'Trealet plays'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        You have played the following Trealets, click to see the details.
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	<div class="card"><div class="card-body">
		<div class="table-responsive" id="users-table-wrapper">
			<table class="table table-borderless table-striped">
				<thead>
				<tr>
					<th class="min-width-80"><?php echo app('translator')->get('ID'); ?></th>
					<th class="min-width-200"><?php echo app('translator')->get('Title'); ?></th>
					<th class="min-width-80"><?php echo app('translator')->get('Played at'); ?></th>
					<th class="text-center min-width-150"><?php echo app('translator')->get('Action'); ?></th>
				</tr>
				</thead>
				<tbody>
					<?php if(count($utts)): ?>
						<?php $__currentLoopData = $utts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td class="align-middle"><a href="trealet-play-details?tr=<?php echo e($utt->id_str); ?>"><?php echo e($utt->id_str); ?></a></td>
						<td class="align-middle"><?php echo e($utt->title); ?> (<?php echo e($utt->username); ?>)</td>
						<td class="align-middle"><?php echo e($utt->played_at->format('y-m-d h:m')); ?></td>
						<td class="text-center align-middle">
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
					</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<tr>
							<td colspan="4"><em><?php echo app('translator')->get('No records found.'); ?></em></td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        .user.media {
            float: left;
            border: 1px solid #dfdfdf;
            background-color: #fff;
            padding: 15px 20px;
            border-radius: 4px;
            margin-right: 15px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/huy/Desktop/trealet/trealet-project/resources/views/trealets/trealet-plays.blade.php ENDPATH**/ ?>