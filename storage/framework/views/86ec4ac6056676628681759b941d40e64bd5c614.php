<?php $__env->startSection('page-contents'); ?>
	<table id="table_div" class="display" cellspacing="0" width="100%"></table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inline-javascript'); ?>
    <?php echo $__env->make(
        'pragmarx/tracker::_datatables',
        array(
            'datatables_ajax_route' => route('tracker.stats.api.users'),
            'datatables_columns' =>
            '
                { "data" : "user_id",    "title" : "'.trans('tracker::tracker.email').'", "orderable": true, "searchable": false },
                { "data" : "updated_at", "title" : "'.trans('tracker::tracker.last_seen').'", "orderable": true, "searchable": false },
            '
        )
    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($stats_layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ploi/demo.davidkohen.com/vendor/pragmarx/tracker/src/views/users.blade.php ENDPATH**/ ?>