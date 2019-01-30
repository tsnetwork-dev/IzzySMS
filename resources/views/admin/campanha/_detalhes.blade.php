    <div class="row">
            <table clas="responsive-table">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Mensagem</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($telefones as $telefone)
                        <tr>
                            <td>{{ date('d/m/Y H:i:s',strtotime($telefone->enviado))}}</td>
                            <td>{{$telefone->mensagem}}</td>
                            <td>{{$telefone->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
<div class="row">

</div>

