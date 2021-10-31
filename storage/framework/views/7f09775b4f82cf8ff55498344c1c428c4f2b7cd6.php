<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="first_name"><?php echo app('translator')->get('Role'); ?></label>
            <?php echo Form::select('role_id', $roles, $edit ? $user->role->id : '',
                ['class' => 'form-control input-solid', 'id' => 'role_id', $profile ? 'disabled' : '']); ?>

        </div>
        <div class="form-group">
            <label for="status"><?php echo app('translator')->get('Status'); ?></label>
            <?php echo Form::select('status', $statuses, $edit ? $user->status : '',
                ['class' => 'form-control input-solid', 'id' => 'status', $profile ? 'disabled' : '']); ?>

        </div>
        <div class="form-group">
            <label for="first_name"><?php echo app('translator')->get('First Name'); ?></label>
            <input type="text" class="form-control input-solid" id="first_name"
                   name="first_name" placeholder="<?php echo app('translator')->get('First Name'); ?>" value="<?php echo e($edit ? $user->first_name : ''); ?>">
        </div>
        <div class="form-group">
            <label for="last_name"><?php echo app('translator')->get('Last Name'); ?></label>
            <input type="text" class="form-control input-solid" id="last_name"
                   name="last_name" placeholder="<?php echo app('translator')->get('Last Name'); ?>" value="<?php echo e($edit ? $user->last_name : ''); ?>">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="birthday"><?php echo app('translator')->get('Date of Birth'); ?></label>
            <div class="form-group">
                <input type="text"
                       name="birthday"
                       id='birthday'
                       value="<?php echo e($edit && $user->birthday ? $user->present()->birthday : ''); ?>"
                       class="form-control input-solid" />
            </div>
        </div>
        <div class="form-group">
            <label for="phone"><?php echo app('translator')->get('Phone'); ?></label>
            <input type="text" class="form-control input-solid" id="phone"
                   name="phone" placeholder="<?php echo app('translator')->get('Phone'); ?>" value="<?php echo e($edit ? $user->phone : ''); ?>">
        </div>
        <div class="form-group">
            <label for="address"><?php echo app('translator')->get('Address'); ?></label>
            <input type="text" class="form-control input-solid" id="address"
                   name="address" placeholder="<?php echo app('translator')->get('Address'); ?>" value="<?php echo e($edit ? $user->address : ''); ?>">
        </div>
        <div class="form-group">
            <label for="address"><?php echo app('translator')->get('Country'); ?></label>
            <?php echo Form::select('country_id', $countries, $edit ? $user->country_id : '', ['class' => 'form-control input-solid']); ?>

        </div>
    </div>

    <?php if($edit): ?>
        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-primary" id="update-details-btn">
                <i class="fa fa-refresh"></i>
                <?php echo app('translator')->get('Update Details'); ?>
            </button>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/html/trealet.com/audiences/resources/views/user/partials/details.blade.php ENDPATH**/ ?>