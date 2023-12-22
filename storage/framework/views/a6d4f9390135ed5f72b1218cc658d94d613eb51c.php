<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta content='<?php echo e(__("message.System Name")); ?>' name="description"/>
    <meta content='<?php echo e(__("message.System Name")); ?>' name="author"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo e(url('/')); ?>"/>
    <meta property="og:title" content='<?php echo e(__("message.System Name")); ?>'/>
    <meta property="og:image" content="<?php echo e(Session::get('favicon')); ?>"/>
    <meta property="og:image:width" content="250px"/>
    <meta property="og:image:height" content="250px"/>
    <meta property="og:site_name" content='<?php echo e(__("message.System Name")); ?>'/>
    <meta property="og:description" content='<?php echo e(__("message.meta_description")); ?>'/>
    <meta property="og:keyword" content='<?php echo e(__("message.Meta Keyword")); ?>'/>
    <link href="<?php echo e(asset('/admin_design/layouts/vertical/assets/libs/dropzone/min/dropzone.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link rel="shortcut icon" href="<?php echo e(Session::get('favicon')); ?>"/>
    <link href="<?php echo e(asset('/admin_design/layouts/vertical/assets/css/bootstrap.min.css')); ?>" id="bootstrap-style"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/admin_design/layouts/vertical/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet"
          href="<?php echo e(asset('/admin_design/layouts/vertical/assets/libs/twitter-bootstrap-wizard/prettify.css')); ?>"/>
    <?php if(__("message.RTL")==0): ?>
        <link href="<?php echo e(asset('/admin_design/layouts/vertical/assets/css/app-rtl.min.css')); ?>" id="app-style"
              rel="stylesheet" type="text/css"/>
    <?php else: ?>
        <link href="<?php echo e(asset('/admin_design/layouts/vertical/assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet"
              type="text/css"/>
    <?php endif; ?>
    <link
        href="<?php echo e(asset('/admin_design/layouts/vertical/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>"
        rel="stylesheet" type="text/css"/>
    <link
        href="<?php echo e(asset('/admin_design/layouts/vertical/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>"
        rel="stylesheet" type="text/css"/>
    <link
        href="<?php echo e(asset('/admin_design/layouts/vertical/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>"
        rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('/admin_design/layouts/vertical/assets/libs/select2/css/select2.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('admin_design/layouts/vertical/assets/css/toaster.min.css')); ?>"/>
    <script type="text/javascript"
            src='https://maps.google.com/maps/api/js?key=<?php echo e(Config::get("mapdetail.key")); ?>&sensor=false&libraries=places'></script>
    <link href="<?php echo e(asset('admin_design/layouts/vertical/assets/css/font-awesome.min.css')); ?>"/>
    <script src="<?php echo e(asset('admin_design/layouts/vertical/assets/js/font-awesome.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('admin_design/layouts/vertical/assets/css/sweetalert.min.css')); ?>">
    <?php echo $__env->yieldContent('css'); ?>

    <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body>
<div id="layout-wrapper">
    <?php echo $__env->make('admin.included.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.included.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('admin.included.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</div>
<?php echo $__env->make('admin.included.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    function disablebtn() {
        alert("This Action Disable In Demo");
    }
</script>

<?php echo $__env->make('admin.inc.toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('footer'); ?>
<?php echo \Livewire\Livewire::scripts(); ?>

</body>
</html>
<?php /**PATH /home/eslam/Documents/DoctorAppointments/resources/views/admin/layout.blade.php ENDPATH**/ ?>