<?php $__env->startSection('title','Facebook pages'); ?>
<?php $__env->startSection('content'); ?>
    <?php if(\App\Settings::where('userId',Auth::user()->id)->value('appId') == ""): ?>
        <h1>You need to configure your facebook settings first</h1>
        <a href="<?php echo e(url('/settings/software')); ?>">Go to settings</a>
    <?php else: ?>
        <div class="panel panel-success">

            <div class="panel-body">
                <div class="list-group">

                    <?php foreach($pages as $page): ?>
                        <li class="list-group-item"><a target="_blank"
                                                       href="<?php echo e(url('/settings/pages')); ?>/<?php echo e($page->pageId); ?>"><?php echo e($page->pageName); ?></a>
                            <div class="btn-group pull-right">
                                <a class="btn btn-primary btn-xs" href="<?php echo e(url('/settings/pages').'/'.$page->pageId); ?>"
                                   target="_blank"><i class="fa fa-cogs"></i> Config</a>

                                <button id="<?php echo e($page->id); ?>" class="btn btn-xs btn-danger"><i
                                            class="fa fa-trash"></i> Delete
                                </button>
                            </div>
                        </li>
                    <?php endforeach; ?>


                </div>

            </div>
        </div>
    <?php endif; ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $('.btn-danger').click(function () {
            var pageId = $(this).attr('id');
            $.ajax({
                url: '<?php echo e(url('/delete/page')); ?>',
                type: 'POST',
                data: {
                    'pageId': pageId
                },
                success: function (data) {
                    if (data == "success") {
                        location.reload();
                    } else {
                        alert(data);
                    }
                },
                error: function (data) {
                    alert("Something went wrong");
                    console.log(data.responseText);
                }

            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>