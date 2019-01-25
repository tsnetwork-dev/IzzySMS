<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="center">Chipeiras Cadastradas</h2>

        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                    <a href="<?php echo e(route('admin.principal')); ?>" class="breadcrumb">Inicio</a>
                    <a href="#" class="breadcrumb">Chipeiras Cadastradas</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <?php $__currentLoopData = $chipeiras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chipeira): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col s12 m4">
                    <div class="card blue lighten-4">
                        <div class="card-image waves-effect waves-block waves-light">
                            <i class="large material-icons">phonelink_setup</i>
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><?php echo e($chipeira->Modelo); ?><i class="material-icons right">more_vert</i></span>
                            <p><a href="<?php echo e(route('admin.chipeira.editar',$chipeira->id)); ?>"><?php echo e($chipeira->ip); ?></a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?php echo e($chipeira->ip); ?><i class="material-icons right">close</i></span>
                            <p><b>Númeoro de Série: </b><?php echo e($chipeira->Serial); ?><br>
                            <b>Portas: </b><?php echo e($chipeira->Portas); ?><br>
                            <b>Data de Criação: </b><?php echo e(date ('d/m/Y H:i:s',strtotime($chipeira->created_at))); ?><br>
                            <b>Data de Atualização: </b><?php echo e(date ('d/m/Y H:i:s',strtotime($chipeira->updated_at))); ?></p>
                            <span><a href="http://<?php echo e($chipeira->ip); ?>/">Acessar Equipamento</a></span>
                        </div>
                    </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <div class="row">
                <a class="btn blue" href="<?php echo e(route('admin.chipeira.adicionar')); ?>">Adicionar</a>
        </div>
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>