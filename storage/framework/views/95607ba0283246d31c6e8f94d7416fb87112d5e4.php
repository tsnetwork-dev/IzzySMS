<div class="input-field">
    <input type="text" style="text-transform:uppercase" name="model" class="validate" value="<?php echo e(isset($chipeira->Modelo)? $chipeira->Modelo :''); ?>">
    <label>Modelo</label>
</div>
<div class="input-field">
    <input type="text" name="ip" class="validate" value="<?php echo e(isset($chipeira->ip)? $chipeira->ip :''); ?>">
    <label>Endereço Ip</label>
</div>
<div class="input-field">
    <input type="text" name="serial" class="validate" value="<?php echo e(isset($chipeira->Serial)? $chipeira->Serial :''); ?>">
    <label>Número de Série</label>
</div>
<div class="input-field">
    <input type="text" name="portas" class="validate" value="<?php echo e(isset($chipeira->Portas)? $chipeira->Portas :''); ?>">
    <label>Quantidade de Portas</label>
</div>
