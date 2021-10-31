

<?php $__env->startSection('page-title', 'Streamline Edit'); ?>
<?php $__env->startSection('page-heading', 'Streamline Edit'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
	You can edit your streamline trealet here
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    




<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        .options {
            margin-top: 20px;
            padding: 20px;
            background: rgba(191, 191, 191, 0.15);
        }

        .options .caption {
            font-size: 18px;
            font-weight: 500;
        }

        .option {
            margin-top: 10px;
        }

        .option > span {
            margin-right: 10px;
        }

        .option > .dx-selectbox {
            display: inline-block;
            vertical-align: middle;
            max-width: 350px;
            width: 100%;
        }


    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\NDT\PycharmProjects\trealet\audiences\resources\views/trealets/streamline-edit.blade.php ENDPATH**/ ?>