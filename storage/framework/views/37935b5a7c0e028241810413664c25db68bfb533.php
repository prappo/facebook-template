<?php $__env->startSection('title','Home'); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Sells</span>
                    <span class="info-box-number">$ <?php echo e(\App\Income::where('userId',Auth::user()->id)->sum('money')); ?></span>
                    <a href="<?php echo e(url('/earning/history')); ?>" class="btn btn-primary btn-xs">View Sells History</a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->



        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-file"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Products</span>
                    <span class="info-box-number"><?php echo e(\App\Products::where('userId',Auth::user()->id)->count()); ?></span>
                    <a href="<?php echo e(url('/showproducts')); ?>" class="btn btn-primary btn-xs">View Products</a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Orders</span>
                    <span class="info-box-number"><?php echo e(\App\Orders::distinct()->where('userId',Auth::user()->id)->where('status', 'pending')->get(['sender', 'productid'])->count()); ?></span>
                    <a href="<?php echo e(url('/orders')); ?>" class="btn btn-primary btn-xs">View Orders</a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>


        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Customers</span>
                    <span class="info-box-number"><?php echo e(\App\Customers::where('userId',Auth::user()->id)->count()); ?></span>
                    <a href="<?php echo e(url('/customers')); ?>" class="btn btn-primary btn-xs">View Customers</a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>






<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>