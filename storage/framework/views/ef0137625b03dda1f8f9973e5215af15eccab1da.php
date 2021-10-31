

<?php $__env->startSection('page-title', 'My Trealets'); ?>
<?php $__env->startSection('page-heading', 'My Trealets'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        You can create your own Trealets and share it to play
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="row">
		
		<div class="col-md-2"><div class="card widget"><div class="card-body">
		<a href="streamline-edit">New streamline</a>
		</div></div></div>
		
		<div class="col-md-2"><div class="card widget"><div class="card-body">
		New stepquest
		</div></div></div>
		
		<div class="col-md-2"><div class="card widget"><div class="card-body">
		New 360
		</div></div></div>
		
		<div class="col-md-2"><div class="card widget"><div class="card-body">
		New graph
		</div></div></div>
		
		<div class="col-md-2"><div class="card widget"><div class="card-body">
		New maps
		</div></div></div>
	</div>
	<hr>
	<div class="card"><div class="card-body">
		<div class="table-responsive" id="users-table-wrapper">
			<table class="table table-borderless table-striped">
				<thead>
				<tr>
					<th class="min-width-80"><?php echo app('translator')->get('ID'); ?></th>
					<th class="min-width-200"><?php echo app('translator')->get('Title'); ?></th>
					<th class="min-width-80"><?php echo app('translator')->get('Type'); ?></th>
					<th class="min-width-80"><?php echo app('translator')->get('Create at'); ?></th>
					<th class="min-width-80"><?php echo app('translator')->get('State'); ?></th>
					<th class="min-width-80"><?php echo app('translator')->get('Open at'); ?></th>
					<th class="min-width-80"><?php echo app('translator')->get('Close at'); ?></th>
					<th class="min-width-80"><?php echo app('translator')->get('Published'); ?></th>
					<th class="text-center min-width-150"><?php echo app('translator')->get('Action'); ?></th>
				</tr>
				</thead>
				<tbody>
					<?php if(count($trs)): ?>
						<?php $__currentLoopData = $trs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo $__env->make('trealets.partials.trealet-row', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<tr>
							<td colspan="9"><em><?php echo app('translator')->get('No records found.'); ?></em></td>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/trealets/my-trealets.blade.php ENDPATH**/ ?>