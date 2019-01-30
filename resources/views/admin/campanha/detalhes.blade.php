@extends('layouts.app')

@section('content')

<div class="container">
<h2 class="center">Status Campanha</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper green darken-1">
                <div class="col s12">
                <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                <a href="{{route('admin.campanha')}}" class="breadcrumb">Lista de Campanhas</a>
                <a  class="breadcrumb">Status da Campanha</a>
                </div>
            </div>
        </nav>
    </div>

    <div  align="center" class="row">
        {{ $telefones->links() }}
    </div>

    <div class="row">
        <form action="#" method="get">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            @include('admin.campanha._detalhes')
        </form>
    </div>

    <div class="row">

    </div>

</div>
@endsection
