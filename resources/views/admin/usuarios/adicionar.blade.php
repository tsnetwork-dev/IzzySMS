@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="center">Lista de Usuários</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper deep-orange">
                <div class="col s12">
                <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                <a href="{{route('admin.principal')}}" class="breadcrumb">Lista de Usuários</a>
                <a  class="breadcrumb">Adicionar Usuário</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{route('admin.usuarios.salvar')}}" method="post">
          {{csrf_field()}}
          @include('admin.usuarios._form')

          <button class="btn blue">Adicionar</button>
        </form>
    </div>
</div>


@endsection
