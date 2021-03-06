<?php $__env->startSection('content'); ?>
<div class="container">
<h2 class="center">Enviar SMS</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper deep-purple">
                <div class="col s12">
                <a href="<?php echo e(route('admin.principal')); ?>" class="breadcrumb">Inicio</a>
                <a href="<?php echo e(route('admin.posts')); ?>" class="breadcrumb">Lista de Mensagens</a>
                <a  class="breadcrumb">Enviar SMS</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="<?php echo e(route('admin.posts.enviar')); ?>" method="post">
          <?php echo e(csrf_field()); ?>

          <?php echo $__env->make('admin.posts._form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <button class="btn green"><i class="material-icons left small">send</i>Enviar</button>
        </form>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>