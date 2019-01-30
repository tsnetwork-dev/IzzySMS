<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="center">Mensagem Enviadas</h2>

        <div class="row">
            <nav>
                <div class="nav-wrapper deep-purple">
                    <div class="col s12">
                    <a href="<?php echo e(route('admin.principal')); ?>" class="breadcrumb">Inicio</a>
                    <a href="<?php echo e(route('admin.posts')); ?>" class="breadcrumb">Bilhetagem</a>
                    <a href="#" class="breadcrumb">Mensagens Enviadas</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Destino</th>
                        <th>Mensagem</th>
                        <th>Observações</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $mensagem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(date ('d/m/Y H:i:s', strtotime($msg->enviado))); ?></td>
                            <td><?php echo e($msg->destino); ?></td>
                            <td><?php echo e($msg->mensagem); ?></td>
                            <td><?php echo e($msg->obs); ?></td>
                            <td><?php echo e($msg->status); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>

            <h5>Total de Mensagens: <?php echo e($totais); ?></h5>

        </div>
        <div align="center" class="row ">
            <?php echo e($mensagem->links()); ?>

        </div>

        <div class="row">
                <a class="btn blue" href="<?php echo e(route('admin.posts.nova')); ?>">Adicionar</a>
        </div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>