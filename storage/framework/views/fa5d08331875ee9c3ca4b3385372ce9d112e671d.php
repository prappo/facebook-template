<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('content'); ?>

    <form class="login-form" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
        <?php echo e(csrf_field()); ?>



        <label>
            <input id="email" type="email" class="form-control" placeholder="Enter your Email Address" name="email"
                   value="<?php echo e(old('email')); ?>">
        </label>


        <label>
            <input id="password" type="password" class="form-control" placeholder="Enter your Password" name="password">
        </label>


        <?php if($errors->has('email')): ?>
            <span class="help-block">
                                        <strong style="color:red"><?php echo e($errors->first('email')); ?></strong>
                                    </span>
        <?php endif; ?>

        <?php if($errors->has('password')): ?>
            <span class="help-block">
                                        <strong style="color:red"><?php echo e($errors->first('password')); ?></strong>
                                    </span>
        <?php endif; ?>


        <input type="submit" value="Login">


    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>