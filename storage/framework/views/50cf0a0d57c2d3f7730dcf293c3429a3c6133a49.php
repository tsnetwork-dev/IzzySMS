<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="center">Chips Cadastrados</h2>

        <div class="row">
            <nav>
                <div class="nav-wrapper blue">
                    <div class="col s12">
                    <a href="<?php echo e(route('admin.principal')); ?>" class="breadcrumb">Inicio</a>
                    <a href="<?php echo e(route('admin.chipeira')); ?>" class="breadcrumb">Chipeiras Cadastradas</a>
                    <a href="<?php echo e(route('admin.chipeira.editar',$chipeira->id)); ?>" class="breadcrumb"><?php echo e($chipeira->Modelo); ?>-<?php echo e($chipeira->ip); ?></a>
                    <a href="#" class="breadcrumb">Cadastro de Chips</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Porta</th>
                        <th>IMEI</th>
                        <th>IMSI</th>
                        <th>Adicionado</th>
                        <th>Atualizado</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $chips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($chip->Porta); ?></td>
                            <td><?php echo e($chip->IMEI); ?></td>
                            <td><?php echo e($chip->IMSI); ?></td>
                            <td><?php echo e(date('d/m/Y H:i:s',strtotime($chip->created_at))); ?></td>
                            <td><?php echo e(date('d/m/Y H:i:s',strtotime($chip->updated_at))); ?></td>
                            <td>

                                <a class="btn btn-small btn-floating blue" href="<?php echo e(route('admin.chip.editar',$chip->id)); ?>"><i class="material-icons">edit</i></a>
                                
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>

        </div>
        <div class="row">
                <a class="btn blue" href="<?php echo e(route('admin.chip.habilitar',$chipeira->id)); ?>">Habilitar</a>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>