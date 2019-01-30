<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="center">Campanhas</h2>

        <div class="row">
            <nav>
                <div class="nav-wrapper green darken-1">
                    <div class="col s12">
                    <a href="<?php echo e(route('admin.principal')); ?>" class="breadcrumb">Inicio</a>
                    <a href="#" class="breadcrumb">Campanhas</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Credor</th>
                        <th>Campanha</th>
                        <th>Telefones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $campanhas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campanha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($campanha->id); ?></td>
                            <td><?php echo e(date ('d/m/Y H:i:s', strtotime($campanha->Data))); ?></td>
                            <td><?php echo e($campanha->cd_credor); ?></td>
                            <td><?php echo e($campanha->nome_campanha); ?></td>
                            <td><b><?php echo e($campanha->total); ?></b></td>
                            <td>
                                <a class="btn-floating  btn-flat btn-small waves-effect waves-light green darken-1" href="<?php echo e(route('admin.campanha.campanha',$campanha->id)); ?>"><i class="material-icons">assignment_turned_in</i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </tbody>
            </table>

        </div>
        <div class="row">
                <a class="btn blue" href="<?php echo e(route('admin.campanha.nova')); ?>">Adicionar</a>
        </div>
</div>

<div align="center" class="row ">
        <?php echo e($campanhas->links()); ?>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>