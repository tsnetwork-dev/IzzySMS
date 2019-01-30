@extends('layouts.app')


@section('content')
    <div class="container">
        <h2 class="center">Mensagem Enviadas</h2>

        <div class="row">
            <nav>
                <div class="nav-wrapper deep-purple">
                    <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                    <a href="{{route('admin.posts')}}" class="breadcrumb">Bilhetagem</a>
                    <a href="#" class="breadcrumb">Mensagens Enviadas</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Destino</th>
                        <th>Mensagem</th>
                        <th>Observações</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mensagem as $msg)
                        <tr>
                            <td>{{date ('d/m/Y H:i:s', strtotime($msg->enviado))}}</td>
                            <td>{{$msg->destino}}</td>
                            <td>{{$msg->mensagem}}</td>
                            <td>{{$msg->obs}}</td>
                            <td>{{$msg->status}}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <h5>Total de Mensagens: {{ $totais }}</h5>

        </div>
        <div align="center" class="row ">
            {{$mensagem->links()}}
        </div>

        <div class="row">
                <a class="btn blue" href="{{route('admin.posts.nova')}}">Adicionar</a>
        </div>
</div>


@endsection

