@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="center">Criar nova Campanha</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper green darken-1">
                <div class="col s12">
                <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                <a href="{{route('admin.campanha')}}" class="breadcrumb">Lista de Campanhas</a>
                <a  class="breadcrumb">Criar Nova Campanha</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{route('admin.campanha.salvar')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          @include('admin.campanha._form')

          <button class="btn green"><i class="material-icons left small">send</i>Salvar</button>
        </form>
    </div>
</div>


@endsection
