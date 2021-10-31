

<?php $__env->startSection('page-title', 'Play details'); ?>
<?php $__env->startSection('page-heading', 'Play details'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        The details of your Trealet
    </li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card"><div class="card-body">
            <?php echo csrf_field(); ?>

            <form action="/edit_trealet/<?php echo e($trealet->id); ?>" method="post" >
                <div><h2>Chỉnh sửa trealet của bạn tại đây!</h2></div>
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="title"><?php echo app('translator')->get('Tên trealet'); ?></label>
                    <input type="text" class="form-control input-solid" id="title"
                           name="title" placeholder="<?php echo app('translator')->get('Tên trealet'); ?>" value="<?php echo e($trealet->title); ?>">
                </div>

                <div class="form-group">
                    <label for="state">State</label>
                    <select name="state" class="form-control" style="width:250px">

                        <option value="0">0</option>
                        <option value="1">1</option>

                    </select>
                </div>
                <div>
                <div class="form-group">

                    <label for="published">Publish</label>

                    <select name="published" class="form-control" style="width:250px" >
                        <?php if($trealet->published == 0): ?>
                            <option value="0" selected>No one</option>
                            <option value="1">Everyone</option>
                            <option value="2">Everyone with key</option>
                            aaaa
                        <?php endif; ?>
                        <?php if($trealet->published == 1): ?>
                            <option value="1" selected>Everyone</option>

                            <option value="2">Everyone with key</option>
                            <option value="0">No one</option>
                        <?php endif; ?>
                        <?php if($trealet->published == 2): ?>
                            <option value="2" selected>Everyone with key</option>
                            <option value="1">Everyone</option>
                            <option value="0">No one</option>
                        <?php endif; ?>

                    </select>
                </div>
                    <div class="form-group" style="width:250px" >
                        <label for="title"><?php echo app('translator')->get('Key '); ?></label>
                        <input type="text" class="form-control input-solid" id="title"
                               name="key" placeholder="<?php echo app('translator')->get(''); ?>"  value="<?php echo e($trealet->pass); ?>" >
                    </div>


                <div class="col-md-12 mt-2" >
                    <button type="submit" class="btn btn-primary" id="update-details-btn" >
                        <i class="fa fa-refresh"></i>
                        <?php echo app('translator')->get('Update Trealet'); ?>
                    </button>


                </div>


            </form>


        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <style>
        .card {
            width: 50%;
        }
        .user.media {
            float: left;
            border: 1px solid #dfdfdf;
            background-color: #fff;
            padding: 15px 20px;
            border-radius: 4px;
            margin-right: 15px;
        }
        .form-control input-solid{
            background-color: white;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\NDT\PycharmProjects\trealet\audiences\resources\views/trealets/edit-trealets.blade.php ENDPATH**/ ?>