@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="center">Nova Carteira</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper orange darken-1">
                <div class="col s12">
                <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                <a href="{{route('admin.credor')}}" class="breadcrumb">Lista de Carteira</a>
                <a  class="breadcrumb">Nova Carteira</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{route('admin.credor.salvar')}}" method="post">
          {{csrf_field()}}
          @include('admin.credor._form')

          <button class="btn green"><i class="material-icons left small">Save</i>Salvar</button>
        </form>
    </div>
</div>


@endsection
