<div class="input-field">
    <input type="text" style="text-transform:uppercase" name="operadora" class="validate" value="{{isset($campanha->nome_campanha)? $campanha->nome_campanha :''}}">
    <label>Campanha</label>
</div>

<div class="input-field">
    <input type="text" style="text-transform:uppercase" name="operadora" class="validate" value="{{isset($campanha->Data)? $campanha->Data :''}}">
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
                @foreach ($telefones as $telefone)
                    <tr>
                        <td>{{$telefone->id}}</td>
                        <td>{{$telefone->telefone}}</td>
                        <td>{{$telefone->mensagem}}</td>
                        <td><a class="btn-floating  btn-flat btn-small waves-effect waves-lightred red" href="#"><i class="material-icons">delete</i></a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>
