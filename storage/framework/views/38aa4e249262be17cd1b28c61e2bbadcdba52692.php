<?php $__env->startSection('content'); ?>
<div class="container">
<h2 class="center">Criar nova Campanha</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper green darken-1">
                <div class="col s12">
                <a href="<?php echo e(route('admin.principal')); ?>" class="breadcrumb">Inicio</a>
                <a href="<?php echo e(route('admin.campanha')); ?>" class="breadcrumb">Lista de Campanhas</a>
                <a  class="breadcrumb">Criar Nova CampanhaS</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="<?php echo e(route('admin.campanha.salvar')); ?>" method="post" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <?php echo $__env->make('admin.campanha._form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <button class="btn green"><i class="material-icons left small">send</i>Salvar</button>
        </form>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>