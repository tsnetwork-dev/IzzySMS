<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="center">Lista de Carteiras</h2>

        <div class="row">
            <nav>
                <div class="nav-wrapper orange darken-1">
                    <div class="col s12">
                    <a href="<?php echo e(route('admin.principal')); ?>" class="breadcrumb">Inicio</a>
                    <a href="#" class="breadcrumb">Lista de Carteiras</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Carteira</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $credores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($credor->cd_credor); ?></td>
                            <td><?php echo e(strtoupper($credor->ds_credor)); ?></td>
                            <td><a class="btn red smal" href="#">Deletar</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>

        </div>
        <div class="row">
                <a class="btn blue" href="<?php echo e(route('admin.credor.novo')); ?>">Adicionar</a>
        </div>
</div>

<div align="center" class="row ">
        <?php echo e($credores->links()); ?>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>