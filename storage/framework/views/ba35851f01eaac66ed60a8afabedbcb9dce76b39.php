<script>
    var users = <?php echo json_encode(array_values($usersPerMonth), 15, 512) ?>;
    var months = <?php echo json_encode(array_keys($usersPerMonth), 15, 512) ?>;
    var trans = {
        chartLabel: "<?php echo e(__('Registration History')); ?>",
        new: "<?php echo e(__('new')); ?>",
        user: "<?php echo e(__('user')); ?>",
        users: "<?php echo e(__('users')); ?>"
    };
</script>
<?php echo HTML::script('assets/js/chart.min.js'); ?>

<?php echo HTML::script('assets/js/as/dashboard-admin.js'); ?>

<?php /**PATH /var/www/html/trealet.com/audiences/resources/views/plugins/dashboard/widgets/registration-history-scripts.blade.php ENDPATH**/ ?>