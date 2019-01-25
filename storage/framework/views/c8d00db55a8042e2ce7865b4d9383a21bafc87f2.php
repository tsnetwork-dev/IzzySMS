<?php $__env->startSection('content'); ?>
<div class="container">
<h2 class="center">Nova Carteira</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper orange darken-1">
                <div class="col s12">
                <a href="<?php echo e(route('admin.principal')); ?>" class="breadcrumb">Inicio</a>
                <a href="<?php echo e(route('admin.credor')); ?>" class="breadcrumb">Lista de Carteira</a>
                <a  class="breadcrumb">Nova Carteira</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="<?php echo e(route('admin.credor.salvar')); ?>" method="post">
          <?php echo e(csrf_field()); ?>

          <?php echo $__env->make('admin.credor._form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <button class="btn green"><i class="material-icons left small">Save</i>Salvar</button>
        </form>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>