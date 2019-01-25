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
        <?php echo $__env->make('layouts._admin._nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <main class="py-4">
            <?php if(Session::has('mensagem')): ?>
            <div class="container">
                <div class="row">
                    <div class="card <?php echo e(Session::get('mensagem')['class']); ?>">
                        <div align="center" class="card-content ">
                            <?php echo e(Session::get('mensagem')['msg']); ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <script type="text/javascript" src="<?php echo e(asset('lib/materialize/dist/js/materialize.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('lib/jquery/dist/jquery.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/init.js')); ?>"></script>

    </div>
</body>
</html>
