

<?php $__env->startSection('page-title', 'Search a trealet to play'); ?>
<?php $__env->startSection('page-heading', 'Search a trealet to play'); ?>
	
	
<?php $__env->startSection('content'); ?>

	<div class="card">
	<h4 class="card-header">Nhập từ khóa để tìm trealets</h4>

	<div class="card-body">	<center><input id="search" type="text" placeholder="" style='width:70%' autofocus/> 
	<button type="submit" class="btn btn-dark" name='search' id='search'>Tìm</button>
	</center>
	</div>	
	</div>

	<?php $__currentLoopData = $trs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php
		$play_tr = $tr->type.'?tr='.$tr->id_str;
	?>
        <div class="user media d-flex align-items-center">
			<a href='<?php echo e($play_tr); ?>'>
            <div class="d-flex justify-content-center flex-column">
				<h5 class="mb-0"><?php echo e($tr->title); ?></h5>
                <small class="text-muted"><?php echo e($tr->creator); ?></small>
            </div>
			</a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/trealets/trealets-search.blade.php ENDPATH**/ ?>