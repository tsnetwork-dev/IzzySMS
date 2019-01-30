@extends('layouts.app')

@section('content')

<div class="container">
<h2 class="center">Enviar Campanha</h2>
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

    <div  align="center" class="row">
        {{ $telefones->links() }}
    </div>

    <div class="row">

    </div>

    <div class="row">

    </div>

</div>
@endsection
