<?php $__env->startSection('content'); ?>

<div class="container">
<h2 class="center">Detalhes da Campanha</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper green darken-1">
                <div class="col s12">
                <a href="<?php echo e(route('admin.principal')); ?>" class="breadcrumb">Inicio</a>
                <a href="<?php echo e(route('admin.campanha')); ?>" class="breadcrumb">Lista de Campanhas</a>
                <a  class="breadcrumb">Enviar Campanha</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col s12 m12">
            <div id="pop_div" >
                <?= $lava->render('ColumnChart', 'Campanha', 'pop_div') ?>
            </div>
        </div>
<div class="row">
    <?php $__currentLoopData = $telefones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $telefone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col s12 m3">
            <div class="chip">
                <i class="material-icons Tiny">phone_android</i>
                <?php echo e($telefone->telefone); ?>

            </div>
            <br>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="center" >
        <?php echo e($telefones->links()); ?>

    </div>
</div>


    <div class="row">
        <div class="col s12 m4">
            <a class="btn-small  blue" href="<?php echo e(route('admin.campanha.envio',$id)); ?>">Verificar</a>
        </div>
        <div class="col s12 m4">
            <a class="btn-small  blue" href="<?php echo e(route('admin.campanha.status',$id)); ?>">Status</a>
        </div>

        <div class="col s12 m4">
            <a class="btn-small  blue" href="<?php echo e(route('admin.campanha.enviar',$id)); ?>">Enviar</a>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>