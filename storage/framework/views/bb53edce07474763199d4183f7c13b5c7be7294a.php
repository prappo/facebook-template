<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo e(url('bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(url('bower_components/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Ionicons -->

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(url('dist/css/AdminLTE.min.css')); ?>">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="<?php echo e(url('dist/css/skins/skin-black.min.css')); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="<?php echo e(url('/css/style.css')); ?>">
    <?php /* <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet"> */ ?>
    <?php /*data table*/ ?>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo e(url('/home')); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>M</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Monitor</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">


                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img <?php if(Auth::user()->image == ""): ?> src="<?php echo e(url('/images/avatar.png')); ?>"
                                 <?php else: ?> src="<?php echo e(Auth::user()->image); ?>" <?php endif; ?> class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->


                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo e(url('/profile')); ?>" class="btn btn-primary btn-flat"><i
                                                class="fa fa-user"></i> Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo e(url('/logout')); ?>" class="btn btn-warning btn-flat"><i
                                                class="fa fa-sign-out"></i> Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img <?php if(Auth::user()->image == ""): ?> src="<?php echo e(url('/images/avatar.png')); ?>"
                         <?php else: ?> src="<?php echo e(Auth::user()->image); ?>" <?php endif; ?> class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo e(\Auth::user()->name); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Active</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">

                <!-- Optionally, you can add icons to the links -->


                <?php if(Auth::user()->type == "admin"): ?>)
                <li <?php if(Request::is('home')): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-home"></i>
                        <span>Home</span></a></li>
                <li class="treeview <?php if(Request::is('user/add') || Request::is('user/list')): ?> active <?php endif; ?>">
                    <a href="#"><i class="fa fa-users"></i> <span> Users</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php if(Request::is('user/add')): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('/user/add')); ?>"><i
                                        class="fa fa-plus"></i> Add User</a></li>

                        <li <?php if(Request::is('user/list')): ?> class="active" <?php endif; ?>><a
                                    href="<?php echo e(url('/user/list')); ?>"><i class="fa fa-list"></i> Users List</a>
                        </li>
                    </ul>
                </li>


                <li <?php if(Request::is('profile')): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('/profile')); ?>"><i
                                class="fa fa-user"></i>
                        <span>Profile</span></a></li>


                <?php else: ?>
                    <?php /*User options start */ ?>
                    <li <?php if(Request::is('home')): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('/home')); ?>"><i
                                    class="fa fa-home"></i>
                            <span>Home</span></a></li>


                    <li class="treeview <?php if(Request::is('settings/pages') || Request::is('bot/settings') || Request::is('profile') || Request::is('settings/software')): ?> active <?php endif; ?>">
                        <a href="#"><i class="fa fa-gears"></i> <span> Settings</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if(Request::is('settings/software')): ?> class="active" <?php endif; ?>><a
                                        href="<?php echo e(url('/settings/software')); ?>"><i
                                            class="fa fa-gear"></i> Software</a></li>

                          
                            <li <?php if(Request::is('profile')): ?> class="active" <?php endif; ?>><a
                                        href="<?php echo e(url('/profile')); ?>"><i class="fa fa-user"></i> Profile</a>
                            </li>
                        </ul>
                    </li>


                    <?php /* User option end */ ?>
                <?php endif; ?>

                <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->

            <?php echo $__env->yieldContent('content'); ?>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Version <b>2018.v5</b>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy;
            <script>document.write(new Date().getFullYear())</script>
            All rights reserved.
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo e(url('bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(url('bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(url('dist/js/adminlte.min.js')); ?>"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
<?php /*data table*/ ?>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
<script src="<?php echo e(url('/js/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(url('/js/vfs_fonts.js')); ?>"></script>


<?php echo $__env->yieldContent('js'); ?>
<script>
    $(document).ready(function () {
        var table = $('#mytable').DataTable({
            dom: '<""flB>tip',
            buttons: [
                {
                    extend: 'excel',
                    text: '<button class="btn btn-success btn-xs fak"><i class="fa fa-file-excel-o"></i> Export all to excel</button>'
                },
                {
                    extend: 'csv',
                    text: '<button class="btn btn-warning btn-xs fak"><i class="fa fa-file-o"></i> Export all to csv</button>'
                },
                {
                    extend: 'print',
                    text: '<button class="btn btn-default btn-xs fak"><i class="fa fa-print"></i> Print all</button>'
                },
            ]
        });

        var table1 = $('#mytable1').DataTable({
            dom: '<""flB>tip',
            buttons: [
                {
                    extend: 'excel',
                    text: '<button class="btn btn-success btn-xs fak"><i class="fa fa-file-excel-o"></i> Excel</button>'
                },
                {
                    extend: 'csv',
                    text: '<button class="btn btn-warning btn-xs fak"><i class="fa fa-file-o"></i> CSV</button>'
                },
                {
                    extend: 'print',
                    text: '<button class="btn btn-default btn-xs fak"><i class="fa fa-print"></i> Print</button>'
                },
            ]
        });

        var table2 = $('#mytable2').DataTable({
            dom: '<""flB>tip',
            buttons: [
                {
                    extend: 'excel',
                    text: '<button class="btn btn-success btn-xs fak"><i class="fa fa-file-excel-o"></i> Excel</button>'
                },
                {
                    extend: 'csv',
                    text: '<button class="btn btn-warning btn-xs fak"><i class="fa fa-file-o"></i> CSV</button>'
                },
                {
                    extend: 'print',
                    text: '<button class="btn btn-default btn-xs fak"><i class="fa fa-print"></i> Print</button>'
                },
            ]
        });


        $('#massMsg').click(function () {
            swal({
                title: "Mass Messaging!",
                text: "Send message to your customers, This will send message to all customers of your all facebook pages",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Write something",
                showLoaderOnConfirm: true,
            }, function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(url('/notify')); ?>',
                    data: {
                        'msg': inputValue
                    },
                    success: function (data) {
                        if (data.search('message_id') != -1) {
                            swal('Success', 'Message sent to all customers', 'success');
                        }
                        else {
                            swal('Error', data, 'error');
                        }
                    }
                });
            });
        })
    });

    $('.themeName').click(function () {
        var theme = $(this).attr('data-name');
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url('/update/theme')); ?>',
            data: {
                'theme': theme
            },
            success: function (data) {
                if (data == "success") {
                    location.reload();
                } else {
                    alert("Sorry ! Can't change the theme");
                }
            },
            error: function (data) {
                alert("Something went wrong");
                console.log(data.responseText);

            }
        })
    });


</script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>