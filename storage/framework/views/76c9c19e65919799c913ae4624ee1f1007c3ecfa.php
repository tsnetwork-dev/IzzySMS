<div class="input-field">
    <input type="text" style="text-transform:uppercase" name="operadora" class="validate" value="<?php echo e(isset($campanha->nome_campanha)? $campanha->nome_campanha :''); ?>">
    <label>Campanha</label>
</div>

<div class="input-field">
    <input type="text" style="text-transform:uppercase" name="operadora" class="validate" value="<?php echo e(isset($campanha->Data)? $campanha->Data :''); ?>">
    <label>Criada em:</label>
</div>

<div class="row">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Telefone</th>
                    <th>Mensagem</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $telefones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $telefone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($telefone->id); ?></td>
                        <td><?php echo e($telefone->telefone); ?></td>
                        <td><?php echo e($telefone->mensagem); ?></td>
                        <td><a class="btn-floating  btn-flat btn-small waves-effect waves-lightred red" href="#"><i class="material-icons">delete</i></a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>

    </div>
</div>
