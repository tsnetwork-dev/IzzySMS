<div class="input-field">
    <input type="text" style="text-transform:uppercase" name="operadora" class="validate" value="<?php echo e(isset($chip->operadora)? $chip->operadora :''); ?>">
    <label>Operadora</label>
</div>
<div class="input-field">
    <input type="number" name="porta" class="validate" value="<?php echo e(isset($chip->Porta)? $chip->Porta :''); ?>">
    <label>Porta</label>
</div>
<div class="input-field">
    <input type="number" name="IMEI" class="validate" value="<?php echo e(isset($chip->IMEI)? $chip->IMEI :''); ?>">
    <label>IMEI</label>
</div>
<div class="input-field">
    <input type="number" name="IMSI" class="validate" value="<?php echo e(isset($chip->IMSI)? $chip->IMSI :''); ?>">
    <label>IMSI</label>

</div>
<div class="input-field">
    <input type="number" name="diario" class="validate" value="<?php echo e(isset($chip->diario)? $chip->diario :''); ?>">
    <label>Limite Diário</label>
</div>
<div class="input-field">
    <input type="number" name="mensal" class="validate" value="<?php echo e(isset($chip->mensal)? $chip->mensal :''); ?>">
    <label>Limiete Mensal</label>
</div>
 <div class="switch">
    <label>
      Off
      <input type="checkbox" checked="<?php echo e(isset($chip->Habilitado)? True:False); ?>">
      <span class="lever"></span>
      On
    </label>
  </div
