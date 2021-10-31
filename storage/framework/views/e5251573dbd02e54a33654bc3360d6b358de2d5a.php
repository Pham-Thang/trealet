<?php $__env->startSection('page-title', __('Roles')); ?>
<?php $__env->startSection('page-heading', $edit ? $role->name : __('Create New Role')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('roles.index')); ?>"><?php echo app('translator')->get('Roles'); ?></a>
    </li>
    <li class="breadcrumb-item active">
        <?php echo e(__($edit ? 'Edit' : 'Create')); ?>

    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($edit): ?>
    <?php echo Form::open(['route' => ['roles.update', $role], 'method' => 'PUT', 'id' => 'role-form']); ?>

<?php else: ?>
    <?php echo Form::open(['route' => 'roles.store', 'id' => 'role-form']); ?>

<?php endif; ?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5 class="card-title">
                    <?php echo app('translator')->get('Role Details'); ?>
                </h5>
                <p class="text-muted">
                    <?php echo app('translator')->get('A general role information.'); ?>
                </p>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="name"><?php echo app('translator')->get('Name'); ?></label>
                    <input type="text"
                           class="form-control input-solid"
                           id="name"
                           name="name"
                           placeholder="<?php echo app('translator')->get('Role Name'); ?>"
                           value="<?php echo e($edit ? $role->name : old('name')); ?>">
                </div>
                <div class="form-group">
                    <label for="display_name"><?php echo app('translator')->get('Display Name'); ?></label>
                    <input type="text"
                           class="form-control input-solid"
                           id="display_name"
                           name="display_name"
                           placeholder="<?php echo app('translator')->get('Display Name'); ?>"
                           value="<?php echo e($edit ? $role->display_name : old('display_name')); ?>">
                </div>
                <div class="form-group">
                    <label for="description"><?php echo app('translator')->get('Description'); ?></label>
                    <textarea name="description"
                              id="description"
                              class="form-control input-solid"><?php echo e($edit ? $role->description : old('description')); ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">
    <?php echo e(__($edit ? 'Update Role' : 'Create Role')); ?>

</button>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if($edit): ?>
        <?php echo JsValidator::formRequest('Vanguard\Http\Requests\Role\UpdateRoleRequest', '#role-form'); ?>

    <?php else: ?>
        <?php echo JsValidator::formRequest('Vanguard\Http\Requests\Role\CreateRoleRequest', '#role-form'); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/trealet.com/audiences/resources/views/role/add-edit.blade.php ENDPATH**/ ?>