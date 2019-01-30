    <div class="row">
            <table clas="responsive-table">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Mensagem</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $telefones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $telefone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(date('d/m/Y H:i:s',strtotime($telefone->enviado))); ?></td>
                            <td><?php echo e($telefone->mensagem); ?></td>
                            <td><?php echo e($telefone->status); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
<div class="row">

</div>

