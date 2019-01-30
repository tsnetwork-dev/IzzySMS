@extends('layouts.app')


@section('content')
    <div class="container">
        <h2 class="center">Chips Cadastrados</h2>

        <div class="row">
            <nav>
                <div class="nav-wrapper blue">
                    <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                    <a href="{{route('admin.chipeira')}}" class="breadcrumb">Chipeiras Cadastradas</a>
                    <a href="{{route('admin.chipeira.editar',$chipeira->id)}}" class="breadcrumb">{{$chipeira->Modelo}}-{{$chipeira->ip}}</a>
                    <a href="#" class="breadcrumb">Cadastro de Chips</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Porta</th>
                        <th>IMEI</th>
                        <th>IMSI</th>
                        <th>Adicionado</th>
                        <th>Atualizado</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chips as $chip)
                        <tr>
                            <td>{{$chip->Porta}}</td>
                            <td>{{$chip->IMEI}}</td>
                            <td>{{$chip->IMSI}}</td>
                            <td>{{date('d/m/Y H:i:s',strtotime($chip->created_at))}}</td>
                            <td>{{date('d/m/Y H:i:s',strtotime($chip->updated_at))}}</td>
                            <td>

                                <a class="btn btn-small btn-floating blue" href="{{route('admin.chip.editar',$chip->id)}}"><i class="material-icons">edit</i></a>
                                
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        <div class="row">
                <a class="btn blue" href="{{route('admin.chip.editar',$chipeira->id)}}">Voltar</a>
        </div>
</div>
@endsection
