<?php $__env->startSection('content'); ?>

<div class="container">
<h2 class="center">Status Campanha</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper green darken-1">
                <div class="col s12">
                <a href="<?php echo e(route('admin.principal')); ?>" class="breadcrumb">Inicio</a>
                <a href="<?php echo e(route('admin.campanha')); ?>" class="breadcrumb">Lista de Campanhas</a>
                <a  class="breadcrumb">Status da Campanha</a>
                </div>
            </div>
        </nav>
    </div>

    <div  align="center" class="row">
        <?php echo e($telefones->links()); ?>

    </div>

    <div class="row">
        <form action="<?php echo e(route('admin.campanha.enviar',$campanha->id)); ?>" method="get">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="_method" value="put">
            <?php echo $__env->make('admin.campanha._status', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <button class="btn blue">Enviar Campanha</button><br>
        </form>
    </div>

    <div class="row">

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>