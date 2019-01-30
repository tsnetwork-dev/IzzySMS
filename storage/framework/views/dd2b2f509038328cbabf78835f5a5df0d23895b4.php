<div class="input-field">
        <input type="text" style="text-transform:uppercase" name="operadora" class="validate" value="<?php echo e(isset($campanha->nome_campanha)? $campanha->nome_campanha :''); ?>">
        <label>Campanha</label>
    </div>

    <div class="input-field">
        <input type="text" style="text-transform:uppercase" name="operadora" class="validate" value="<?php echo e(isset($campanha->Data)? $campanha->Data :''); ?>">
        <label>Criada em:</label>
    </div>

    <div class="row">
            <table clas="responsive-table">
                <thead>
                    <tr>
                        <th>Telefone</th>
                        <th>Quantidade</th>
                        <th>Detalhes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $telefones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $telefone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($telefone->destino); ?></td>
                            <td><?php echo e($telefone->total); ?></td>
                            <td>
                                <a class="btn btn-small btn-floating blue" href="<?php echo e(route('admin.campanha.detalhe',[$telefone->destino,$telefone->campanha_id])); ?>"><i class="material-icons">edit</i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

    </div>
