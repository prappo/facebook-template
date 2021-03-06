<?php $__env->startSection('title','Notifications'); ?>
<?php $__env->startSection('content'); ?>

    <div class="panel panel-success">
        <div class="panel-heading">Notifications
            <button id="delAll" class="btn btn-danger btn-xs"><i class="fa fa-trahs"></i> Delete All
                notifications
            </button>
        </div>

        <div class="panel-body">


            <table id="mytable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Content</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($data as $d): ?>
                    <tr>
                        <td><?php echo e($d->content); ?></td>
                        <td><?php echo e($d->created_at); ?> ( <?php echo e(\Carbon\Carbon::parse($d->created_at)->diffForHumans()); ?> )</td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $('#delAll').click(function () {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete all!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function () {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(url('/notifications/delete')); ?>',
                    data: {},
                    success: function (data) {
                        if (data == 'success') {
                            swal('Success', 'Deleted !', 'success');
                            location.reload();
                        }
                        else {
                            swal('Error', data, 'error');
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }

                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>