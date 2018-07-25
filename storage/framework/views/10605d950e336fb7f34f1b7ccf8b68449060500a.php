<?php $__env->startSection('title',"$page->pageName"); ?>
<?php $__env->startSection('content'); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">Settings for page : <?php echo e($page->pageName); ?></div>
        <div class="panel-body">
            <div class="form-horizontal">

                <div class="form-group">
                    <label for="title" class="col-md-4 control-label">Shop Title <b style="color:red">*</b></label>

                    <div class="col-md-6">
                        <input type="text"
                               value="<?php echo e($page->shopTitle); ?>"
                               class="form-control" id="shopTitle">

                    </div>
                </div>

                <div class="form-group">
                    <label for="subTitle" class="col-md-4 control-label">Shop Sub Title <b style="color:red">*</b></label>

                    <div class="col-md-6">
                        <input type="text" value="<?php echo e($page->shopSubTitle); ?>"
                               class="form-control" id="shopSubTitle">

                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="col-md-4 control-label">Phone <b style="color:red">*</b></label>

                    <div class="col-md-6">
                        <input type="text" value="<?php echo e($page->phone); ?>"
                               class="form-control" id="phone">

                    </div>
                </div>

                <div class="form-group">
                    <label for="map" class="col-md-4 control-label">Map Data</label>

                    <div class="col-md-6">
                        <input type="text" value="<?php echo e($page->map); ?>"
                               class="form-control" id="map">

                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Email <b style="color:red">*</b></label>

                    <div class="col-md-6">
                        <input type="email" value="<?php echo e($page->email); ?>"
                               class="form-control" id="email">

                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="col-md-4 control-label">Address <b style="color:red">*</b></label>

                    <div class="col-md-6">
                        <input type="text" value="<?php echo e($page->address); ?>"
                               class="form-control" id="address">

                    </div>
                </div>

                <div class="form-group">
                    <label for="afterOrderMsg" class="col-md-4 control-label">After order Message</label>

                    <div class="col-md-6">
                        <input type="text" value="<?php echo e($page->afterOrderMsg); ?>"
                               class="form-control" id="afterOrderMsg">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"></label>

                    <div class="col-md-6">
                        <?php if($page->logo == ""): ?>

                            <img width="100" src="<?php echo e(url('/images/logo.png')); ?>">
                        <?php else: ?>
                            <img width="100" src="<?php echo e(url('/uploads')); ?>/<?php echo e($page->logo); ?>">
                        <?php endif; ?>

                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <label for="pageToken" class="col-md-4 control-label">Page Token</label>

                    <div class="col-md-6">
                        <input style="color: green;font-weight: 900" type="text" value="<?php echo e($page->pageToken); ?>"
                               class="form-control" id="pageToken">

                    </div>
                </div>

                <hr>



                <div class="form-group">

                    <br>
                    <label for="image" class="col-md-4 control-label">Logo</label>

                    <div class="col-md-6">
                        <form id="uploadimage" method="post" enctype="multipart/form-data">
                            <label>Select Your Image</label><br/>
                            <input type="file" name="file"
                                   id="file"/><br>
                            <input class="btn btn-xs btn-success" type="submit" value="Upload"
                                   id="imgUploadBtn"/>
                            <input type="hidden" value="<?php echo e($page->logo); ?>"
                                   id="image">
                            <div id="imgMsg"></div>
                        </form>

                    </div>
                </div>

                <div class="form-group">
                    <label for="currency" class="col-md-4 control-label">Currency</label>

                    <div class="col-md-6">
                        <select class="form-control" id="currency">
                            <option <?php if ($page->currency == "USD") {
                                echo "selected";
                            } ?> >USD
                            </option>
                            <option <?php if ($page->currency == "EURO") {
                                echo "selected";
                            } ?> >EURO
                            </option>
                            <option <?php if ($page->currency == "BDT") {
                                echo "selected";
                            } ?> >BDT
                            </option>

                            <option <?php if ($page->currency == "GBP") {
                                echo "selected";
                            } ?> >GBP
                            </option>
                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label for="tax" class="col-md-4 control-label">Tax</label>

                    <div class="col-md-6">
                        <input type="text" value="<?php echo e($page->tax); ?>"
                               class="form-control" id="tax">

                    </div>
                </div>


                <div class="form-group">
                    <label for="shipping" class="col-md-4 control-label">Shipping Cost</label>

                    <div class="col-md-6">
                        <input type="text" value="<?php echo e($page->shipping); ?>"
                               class="form-control" id="shipping">

                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="paymentMethod" class="col-md-4 control-label">Payment Method</label>

                    <div class="col-md-6">
                        <select class="form-control" id="paymentMethod">
                            <option value="paypal">PayPal</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label for="paypalClientId" class="col-md-4 control-label">PayPal Client ID</label>

                    <div class="col-md-6">
                        <input type="text" value="<?php echo e($page->paypalClientId); ?>"
                               class="form-control" id="paypalClientId">

                    </div>
                </div>

                <div class="form-group">
                    <label for="paypalClientSecret" class="col-md-4 control-label">PayPal Client
                        Secret</label>

                    <div class="col-md-6">
                        <input type="text"
                               value="<?php echo e($page->paypalClientSecret); ?>"
                               class="form-control" id="paypalClientSecret">

                    </div>
                </div>

                <hr>




                <?php if(\App\Http\Controllers\PackagesController::isMyPackage('woo')): ?>
                    <?php /* woo commerce settings start*/ ?>
                    <div class="form-group">
                        <label for="wpUrl" class="col-md-4 control-label">WordPress URL</label>

                        <div class="col-md-6">
                            <input type="text" value="<?php echo e($page->wpUrl); ?>"
                                   class="form-control" id="wpUrl">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="wooConsumerKey" class="col-md-4 control-label">WooCommerce Consumer
                            Key</label>

                        <div class="col-md-6">
                            <input type="text"
                                   value="<?php echo e($page->wooConsumerKey); ?>"
                                   class="form-control" id="wooConsumerKey">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="wooConsumerSecret" class="col-md-4 control-label">WooCommerce
                            Secret</label>

                        <div class="col-md-6">
                            <input type="text"
                                   value="<?php echo e($page->wooConsumerSecret); ?>"
                                   class="form-control" id="wooConsumerSecret">

                        </div>
                    </div>
                <?php endif; ?>

                <?php /* woo commerce settings end*/ ?>


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button id="update" class="btn btn-primary">
                            <i class="fa fa-btn fa-save"></i> Update
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
    <script>
        if ($('#lang').val() == 'no') {
            $('#gt').hide();
        }
        $("#uploadimage").on('submit', (function (e) {
            e.preventDefault();
            $('#imgMsg').html("Please wait ...");
            $.ajax({
                url: "<?php echo e(url('/iup')); ?>",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data['status'] == 'success') {
                        $('#image').val(data['fileName']);
                        $('#imgMsg').html("Your file uploaded and it's name : " + data['fileName']);
                        swal('Success!', 'Image File succefully uploaded', 'success');
                        $('#imagePreview').attr('src', 'uploads/' + data['fileName']);

                    }
                    else {
                        swal('Error!', data, 'error');
                        $('#imgMsg').html("Something went wrong can't upload image");

                    }
                }
            });
        }));


        $('#update').click(function () {
            $.ajax({
                type: 'POST',
                url: "<?php echo e(url('/settings/pages')); ?>",
                data: {
                    'pageId': "<?php echo e($page->pageId); ?>",
                    'shopTitle': $('#shopTitle').val(),
                    'shopSubTitle': $('#shopSubTitle').val(),
                    'logo': $('#image').val(),
                    'email': $('#email').val(),
                    'phone': $('#phone').val(),
                    'currency': $('#currency').val(),
                    'tax': $('#tax').val(),
                    'shipping': $('#shipping').val(),
                    'address': $('#address').val(),
                    'paymentMethod': $('#paymentMethod').val(),
                    'paypalClientId': $('#paypalClientId').val(),
                    'paypalClientSecret': $('#paypalClientSecret').val(),
                    'afterOrderMsg': $('#afterOrderMsg').val(),
                    'map': $('#map').val(),
                    'mgApiKey': $('#mgApiKey').val(),
                    'mgDomain': $('#mgDomain').val(),
                    'mgEmail': $('#mgEmail').val(),
                    <?php if(\App\Http\Controllers\PackagesController::isMyPackage('woo')): ?>
                    'wpUrl': $('#wpUrl').val(),
                    'wooConsumerKey': $('#wooConsumerKey').val(),
                    'wooConsumerSecret': $('#wooConsumerSecret').val(),
                    <?php endif; ?>

                },
                success: function (data) {
                    if (data == 'success') {
                        swal('Success', 'Updated', 'success');
                        location.reload();
                    }
                    else {
                        swal("Error", data, 'error');
                    }

                }
            });
        });


    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>