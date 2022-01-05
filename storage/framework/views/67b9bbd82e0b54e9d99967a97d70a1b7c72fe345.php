<!doctype html>
<html class="no-js h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" id="bootstrap-stylesheet" data-version="1.1.0" href="<?php echo e(asset('styles/bootstrap.min.css')); ?>">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="<?php echo e(asset('styles/dashboard.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('styles/extras.1.1.0.min.css')); ?>">
    <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>
    <?php echo toastr_css(); ?>
    <?php echo $__env->yieldContent('css'); ?>
</head>

<body class="h-100">


<?php echo $__env->make("layouts.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make("layouts.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="<?php echo e(asset('scripts/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('scripts/shards.min.js')); ?>"></script>
<script src="<?php echo e(asset('scripts/jquery.sharrre.min.js')); ?>"></script>


<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<?php echo toastr_js(); ?>
<?php echo app('toastr')->render(); ?>
<?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\cowcash\resources\views/layouts/master.blade.php ENDPATH**/ ?>