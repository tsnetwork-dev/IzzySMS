<div class="input-field">
        <input type="text" style="text-transform:uppercase" name="operadora" class="validate" value="{{isset($campanha->nome_campanha)? $campanha->nome_campanha :''}}">
        <label>Campanha</label>
    </div>

    <div class="input-field">
        <input type="text" style="text-transform:uppercase" name="operadora" class="validate" value="{{isset($campanha->Data)? $campanha->Data :''}}">
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
                    @foreach ($telefones as $telefone)
                        <tr>
                            <td>{{$telefone->destino}}</td>
                            <td>{{$telefone->total}}</td>
                            <td>
                                <a class="btn btn-small btn-floating blue" href="{{ route('admin.campanha.detalhe',[$telefone->destino,$telefone->campanha_id]) }}"><i class="material-icons">edit</i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
