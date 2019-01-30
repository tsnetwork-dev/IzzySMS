@extends('layouts.app')

@section('content')

<div class="container">
<h2 class="center">Detalhes da Campanha</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper green darken-1">
                <div class="col s12">
                <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                <a href="{{route('admin.campanha')}}" class="breadcrumb">Lista de Campanhas</a>
                <a  class="breadcrumb">Enviar Campanha</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col s12 m12">
            <div id="pop_div" >
                <?= $lava->render('ColumnChart', 'Campanha', 'pop_div') ?>
            </div>
        </div>
<div class="row">
    @foreach ($telefones as $telefone)
        <div class="col s12 m3">
            <div class="chip">
                <i class="material-icons Tiny">phone_android</i>
                {{ $telefone->telefone }}
            </div>
            <br>
        </div>
    @endforeach

    <div class="center" >
        {{$telefones->links()}}
    </div>
</div>


    <div class="row">
        <div class="col s12 m4">
            <a class="btn-small  blue" href="{{ route('admin.campanha.envio',$id) }}">Verificar</a>
        </div>
        <div class="col s12 m4">
            <a class="btn-small  blue" href="{{ route('admin.campanha.status',$id) }}">Status</a>
        </div>

        <div class="col s12 m4">
            <a class="btn-small  blue" href="{{ route('admin.campanha.enviar',$id) }}">Enviar</a>
        </div>

    </div>

@endsection
