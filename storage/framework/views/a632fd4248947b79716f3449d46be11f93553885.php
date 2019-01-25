<?php $__env->startSection('content'); ?>
<div class="container">
<h2 class="center">Atualizar Chipeira</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue darken-1">
                <div class="col s12">
                <a href="<?php echo e(route('admin.principal')); ?>" class="breadcrumb">Inicio</a>
                <a href="<?php echo e(route('admin.chipeira')); ?>" class="breadcrumb">Chipeiras Cadastradas</a>
                <a  class="breadcrumb">Atualizar Chipeira</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="<?php echo e(route('admin.chipeira.atualizar',$chipeira->id)); ?>" method="post">
          <?php echo e(csrf_field()); ?>

          <input type="hidden" name="_method" value="put">
          <?php echo $__env->make('admin.chipeira._form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <button class="btn blue">Atualizar</button>
        </form>
    </div>
    <div class="row">
        <a class="btn green" href="<?php echo e(route('admin.chip',$chipeira->id)); ?>">Chips</a>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>