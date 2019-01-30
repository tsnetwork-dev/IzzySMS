@extends('layouts.app')


@section('content')
    <div class="container">
        <h2 class="center">Chipeiras Cadastradas</h2>

        <div class="row">
            <nav>
                <div class="nav-wrapper blue darken-1">
                    <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                    <a href="#" class="breadcrumb">Chipeiras Cadastradas</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            @foreach ($chipeiras as $chipeira)
                <div class="col s12 m4">
                    <div class="card blue lighten-4">
                        <div class="card-image waves-effect waves-block waves-light">
                            <i class="large material-icons">phonelink_setup</i>
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">{{$chipeira->Modelo}}<i class="material-icons right">more_vert</i></span>
                            <p><a href="{{route('admin.chipeira.editar',$chipeira->id)}}">{{$chipeira->ip}}</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">{{$chipeira->ip}}<i class="material-icons right">close</i></span>
                            <p><b>Númeoro de Série: </b>{{$chipeira->Serial}}<br>
                            <b>Portas: </b>{{$chipeira->Portas}}<br>
                            <b>Mensagens Mês:</b> <b class="blue-text">{{ $chipeira->total }}</b><br>

                            <span><a href="http://{{$chipeira->ip}}/">Acessar Equipamento</a></span>
                        </div>
                    </div>
            </div>
            @endforeach

        </div>
        <div class="row">
                <a class="btn blue" href="{{route('admin.chipeira.adicionar')}}">Adicionar</a>
        </div>
</div>




@endsection
