<script>
    var labels = <?php echo json_encode(array_keys($activities), 15, 512) ?>;
    var activities = <?php echo json_encode(array_values($activities), 15, 512) ?>;
    var trans = {
        chartLabel: "<?php echo e(__('Registration History')); ?>",
        action: "<?php echo e(__('action')); ?>",
        actions: "<?php echo e(__('actions')); ?>"
    };
</script>
<?php echo HTML::script('assets/js/chart.min.js'); ?>

<?php echo HTML::script('assets/js/as/dashboard-default.js'); ?>

<?php /**PATH /var/www/html/trealet.com/audiences/vendor/vanguardapp/activity-log/src/../resources/views/widgets/user-activity-scripts.blade.php ENDPATH**/ ?>