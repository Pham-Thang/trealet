

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

</head>

<?php $__env->startSection('page-title', 'My Group'); ?>
<?php $__env->startSection('page-heading', 'My Group'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        You can manage creators here.
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card"><div class="card-body">
            <h3>Creator</h3>
            <div class="table-responsive" id="users-table-wrapper">
                <table class="table table-borderless table-striped">
                    <thead>
                    <tr>
                        <th class="min-width-80"><?php echo app('translator')->get('ID'); ?></th>
                        <th class="min-width-200"><?php echo app('translator')->get('Email'); ?></th>
                        <th class="min-width-80"><?php echo app('translator')->get('UserName'); ?></th>
                        <th class="min-width-80"><?php echo app('translator')->get('Phone'); ?></th>
                        <th class="min-width-80"><?php echo app('translator')->get('Address'); ?></th>
                        <th class="min-width-80"><?php echo app('translator')->get('Status'); ?></th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($members)): ?>
                        <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="align-middle"><?php echo e($member->id); ?></td>
                                <td class="align-middle"><?php echo e($member->email); ?></td>
                                <td class="align-middle"><?php echo e($member->username); ?></td>
                                <td class="align-middle"><?php echo e($member->phone); ?></td>
                                <td class="align-middle"><?php echo e($member->address); ?></td>
                                <td class="align-middle"><?php echo e($member->status); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9"><em><?php echo app('translator')->get('No records found.'); ?></em></td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                Invite a user by email...
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalLong_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa quyền</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add user</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/invite_creator/<?php echo e($trealet_id); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="modal-body">
                                Search a email...

                                <div class="form-group" style="margin-top: 20px" autocomplete="off">

                                    <input type="text"  name="email" id="search" class="form-control input-lg" placeholder="" />


                                    <script type="text/javascript">
                                        var route = "<?php echo e(url('autocomplete-search')); ?>";
                                        $( document ).ready(function() {
                                            $('input').attr('autocomplete','off');
                                        });
                                        $('#search').typeahead({
                                            source: function (query, process) {
                                                return $.get(route, {
                                                    query: query
                                                }, function (data) {
                                                    return process(data);
                                                });
                                            },

                                        });
                                    </script>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Invite</button>
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>




                    <?php $__env->stopSection(); ?>

                    <?php $__env->startSection('styles'); ?>
                        <style>
                            .button-action{
                                text-align: center;
                            }
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\NDT\PycharmProjects\trealet\audiences\resources\views/trealets/trealet-share.blade.php ENDPATH**/ ?>