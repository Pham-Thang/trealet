

<?php $__env->startSection('page-title', 'Play details'); ?>
<?php $__env->startSection('page-heading', 'Play details'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        The details of your Trealet
    </li>
<?php $__env->stopSection(); ?>

<?php
	$h = "https://" . $_SERVER["HTTP_HOST"].'/';
	$score = NULL;	
	$play_selected = false;
?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	<h1><?php echo e($tr['title']); ?></h1>
	<div> - Creator: <?php echo e($creator->get_fullname()); ?></div>
	<div> - Created at: <?php echo e($tr['created_at']); ?></div>
	
	<?php if(isset($players)): ?>
		<div class="card"><div class="card-body"><div class="table-responsive" id="users-table-wrapper">
		<h2><?php echo e($players->count()); ?> Plays:</h2>
		<?php $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($player['id']!=$pl_id): ?>
				<a href="trealet-play-details?tr=<?php echo e($tr['id_str']); ?>&pl=<?php echo e($player['id']); ?>"><span class="badge badge-lg badge-dark"><?php echo e($player->get_fullname()); ?></span></a>
			<?php else: ?>
				<?php
				$play_selected = true;
				?>
				<a href="trealet-play-details?tr=<?php echo e($tr['id_str']); ?>&pl=<?php echo e($player['id']); ?>"><span class="badge badge-lg badge-success"><?php echo e($player->get_fullname()); ?></span><a>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div></div>
	<?php endif; ?>
	
<?php if($play_selected || !isset($players)): ?>
	<div class="card"><div class="card-body">
		<div class="table-responsive" id="users-table-wrapper">
			<table class="table table-borderless table-striped">
				<thead>
				<tr>
					<th class="min-width-80"><?php echo app('translator')->get('Order'); ?></th>
					<th class="min-width-80"><?php echo app('translator')->get('Type'); ?></th>
					<th class="min-width-80"><?php echo app('translator')->get('Input at'); ?></th>
					<th class="min-width-200"><?php echo app('translator')->get('Content'); ?></th>
				</tr>
				</thead>
				<tbody>
					<?php if(count($utts)): ?>
						<?php $__currentLoopData = $utts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
							if($utt->type=='score')
							{
								$score = $utt;
							}
							else{
							?>
								<tr>
									<td class="align-middle"><?php echo e($utt->no_in_json); ?></td>
									<td class="align-middle"><?php echo e($utt->type); ?></td>
									<td class="align-middle"><?php echo e($utt->created_at->format('y-m-d h:m')); ?></td>
									<td class="align-middle">
										<?php if($utt->type=='picture'): ?>
										<img src='<?php echo e($h.$utt->data); ?>'>
										<?php elseif($utt->type=='audio'): ?>
										<audio controls>  
											<source src='<?php echo e($h.$utt->data); ?>' type="audio/mpeg">
										</audio>
										<?php else: ?>
											<?php echo e($utt->data); ?>

										<?php endif; ?>
									</td>
								</tr>
							<?php
							}
							?>
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

	<?php echo $__env->make('trealets.partials.scores', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\NDT\PycharmProjects\trealet\audiences\resources\views/trealets/trealet-play-details.blade.php ENDPATH**/ ?>