<?php $__env->startSection('title','Update user'); ?>
<?php $__env->startSection('content'); ?>



    <div class="panel panel-success">
        <div class="panel-heading">Update User</div>
        <div class="panel-body">
            <div class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <input id="userId" type="hidden" value="<?php echo e($id); ?>">
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="<?php echo e($name); ?>" id="name">

                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Email</label>

                    <div class="col-md-6">
                        <input type="email" class="form-control" value="<?php echo e($email); ?>" id="email">

                    </div>
                </div>


                <div class="form-group">
                    <label for="newPass" class="col-md-4 control-label"> Password</label>

                    <div class="col-md-6">
                        <input type="password" value="" class="form-control" id="pass">

                    </div>
                </div>



                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button id="update" class="btn btn-success btn-block">
                            <i class="fa fa-btn fa-save"></i> Update User
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>

        $('#update').click(function () {
            var woo = "no", shopify = "no", magento = "no";
            if ($('#woo').is(':checked')) {
                woo = "yes";
            }
            if ($('#shopify').is(':checked')) {
                shopify = "yes";
            }
            if ($('#magento').is(':checked')) {
                magento = "yes";
            }
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url('/user/edit')); ?>',
                data: {
                    'id': $('#userId').val(),
                    'name': $('#name').val(),
                    'email': $('#email').val(),
                    'password': $('#pass').val(),
                    'woo': woo,
                    'shopify': shopify,
                    'magento': magento
                },
                success: function (data) {
                    if (data == 'success') {
                        swal('Success', 'User information updated', 'success');
                    }
                    else {
                        swal('Error', data, 'error');
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>