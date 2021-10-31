

<?php $__env->startSection('page-title', 'Streamline'); ?>
<?php $__env->startSection('page-heading', 'Streamline'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
	<?php echo e($tr->title); ?>

    </li>
<?php $__env->stopSection(); ?>

<?php
	$nij = 0;
	$css_display='';
	$css_input='';
	$trealet_id = $tr->id_str;	
?>


<?php if(!@scored): ?>
	<?php $__env->startSection('trealet-desc',$d['desc']); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
	<center><h1><?php echo e($tr['title']); ?></h1>
	<h4 class='text-muted'>(<?php echo e($creator->get_fullname()); ?>)</h4></center>
	<?php if($scored): ?>
		<div class="alert alert-info">
		<h3>Bạn nhận được phản hồi từ hệ thống. Hãy bấm vào <a href="trealet-play-details?tr=<?php echo e($trealet_id); ?>">đây</a> để xem nhận xét.</h3>
		</div>
	<?php else: ?>
		<div class="card">
		<h4 class="card-header">Lời giới thiệu</h4>
		<div class="card-body"><?php echo e($d['desc']); ?></p></div>	
		</div>
		<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('trealets.partials.item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php
				$nij++;
			?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/trealets/streamline-play.blade.php ENDPATH**/ ?>