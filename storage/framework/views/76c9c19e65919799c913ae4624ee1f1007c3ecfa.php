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
                    <th>Mensagem</th>
                    <th>CPF/CNPJ</th>
                    <th>Cód. Devedor</th>
                    <th>Observações</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $telefones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $telefone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($telefone->telefone); ?></td>
                        <td><?php echo e($telefone->mensagem); ?></td>
                        <td><?php echo e($telefone->cpf_cnpj); ?></td>
                        <td><?php echo e($telefone->cd_devedor); ?></td>
                        <td><?php echo e($telefone->obs); ?></td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <h5>Total de Números na Campanha: <?php echo e($totais->total); ?></h>
</div>
