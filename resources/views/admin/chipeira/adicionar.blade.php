@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="center">Lista de Usuários</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue darken-1">
                <div class="col s12">
                <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                <a href="{{route('admin.chipeira')}}" class="breadcrumb">Chipeiras Cadastradas</a>
                <a  class="breadcrumb">Adicionar Chipeira</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{route('admin.chipeira.salvar')}}" method="post">
          {{csrf_field()}}
          @include('admin.chipeira._form')

          <button class="btn blue">Adicionar</button>
        </form>
    </div>
</div>


@endsection
