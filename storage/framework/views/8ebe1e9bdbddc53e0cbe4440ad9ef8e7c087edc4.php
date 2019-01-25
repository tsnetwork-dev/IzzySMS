<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo e(asset('lib/materialize/dist/css/materialize.css')); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

</head>
<body>
    <div id="app">
    <header>
        <?php echo $__env->make('layouts._site._nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </header>


        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <script src="<?php echo e(asset('lib/materialize/dist/js/materialize.js')); ?>"></script>
        <script src="<?php echo e(asset('lib/jquery/dist/jquery.js')); ?>"></script>
        <script src="<?php echo e(asset('js/init.js')); ?>"></script>
    </div>
</body>
</html>
