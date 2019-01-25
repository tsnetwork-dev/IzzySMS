<?php $__env->startSection('content'); ?>
<div class="container">
<h2 class="center">Cadastrar Chip</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                <a href="<?php echo e(route('admin.principal')); ?>" class="breadcrumb">Inicio</a>
                <a href="<?php echo e(route('admin.chipeira')); ?>" class="breadcrumb">Cadastro de Chipeiras</a>
                <a href="<?php echo e(route('admin.chip',$chipeira->id)); ?>" class="breadcrumb">Chips Cadastrados</a>
                <a  class="breadcrumb">Cadastro de Chip</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="<?php echo e(route('admin.chip.salvar',$chipeira->id)); ?>" method="post">
          <?php echo e(csrf_field()); ?>

          <?php echo $__env->make('admin.chip._form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <button class="btn blue">Adicionar</button>
        </form>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>