<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo e(\App\User::all()->count()); ?></h3>

                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>

            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3><?php echo e(\App\FacebookPages::all()->count()); ?></h3>

                    <p>Facebook Pages</p>
                </div>
                <div class="icon">
                    <i class="fa fa-facebook-square"></i>
                </div>

            </div>
        </div>


    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>