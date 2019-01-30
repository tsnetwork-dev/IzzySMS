<div class="input-field">
    <input type="text" style="text-transform:uppercase" name="operadora" class="validate" value="{{isset($chip->operadora)? $chip->operadora :''}}">
    <label>Operadora</label>
</div>
<div class="input-field">
    <input type="number" name="porta" class="validate" value="{{isset($chip->Porta)? $chip->Porta :''}}">
    <label>Porta</label>
</div>
<div class="input-field">
    <input type="number" name="IMEI" class="validate" value="{{isset($chip->IMEI)? $chip->IMEI :''}}">
    <label>IMEI</label>
</div>
<div class="input-field">
    <input type="number" name="IMSI" class="validate" value="{{isset($chip->IMSI)? $chip->IMSI :''}}">
    <label>IMSI</label>

</div>
<div class="input-field">
    <input type="number" name="diario" class="validate" value="{{isset($chip->diario)? $chip->diario :''}}">
    <label>Limite Diário</label>
</div>
<div class="input-field">
    <input type="number" name="mensal" class="validate" value="{{isset($chip->mensal)? $chip->mensal :''}}">
    <label>Limiete Mensal</label>
</div>
 <div class="switch">
    <label>
      Off
      <input type="checkbox" checked="{{ isset($chip->Habilitado)? True:False }}">
      <span class="lever"></span>
      On
    </label>
  </div
