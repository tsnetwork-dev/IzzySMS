<div class="input-field">
    <input type="text" style="text-transform:uppercase" name="model" class="validate" value="{{isset($chipeira->Modelo)? $chipeira->Modelo :''}}">
    <label>Modelo</label>
</div>
<div class="input-field">
    <input type="text" name="ip" class="validate" value="{{isset($chipeira->ip)? $chipeira->ip :''}}">
    <label>Endereço Ip</label>
</div>
<div class="input-field">
    <input type="text" name="serial" class="validate" value="{{isset($chipeira->Serial)? $chipeira->Serial :''}}">
    <label>Número de Série</label>
</div>
<div class="input-field">
    <input type="text" name="portas" class="validate" value="{{isset($chipeira->Portas)? $chipeira->Portas :''}}">
    <label>Quantidade de Portas</label>
</div>
