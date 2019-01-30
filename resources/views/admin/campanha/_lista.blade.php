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
                    <th>Mensagem</th>
                    <th>CPF/CNPJ</th>
                    <th>Cód. Devedor</th>
                    <th>Observações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($telefones as $telefone)
                    <tr>
                        <td>{{$telefone->telefone}}</td>
                        <td>{{$telefone->mensagem}}</td>
                        <td>{{$telefone->cpf_cnpj }}</td>
                        <td>{{$telefone->cd_devedor }}</td>
                        <td>{{ $telefone->obs }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h5>Total de Números na Campanha: {{ $totais->total}}</h>
</div>
