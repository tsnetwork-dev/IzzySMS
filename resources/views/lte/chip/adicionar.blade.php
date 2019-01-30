@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="center">Cadastrar Chip</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                <a href="{{route('admin.chipeira')}}" class="breadcrumb">Cadastro de Chipeiras</a>
                <a href="{{route('admin.chip',$chipeira->id)}}" class="breadcrumb">Chips Cadastrados</a>
                <a  class="breadcrumb">Cadastro de Chip</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{route('admin.chip.salvar',$chipeira->id)}}" method="post">
          {{csrf_field()}}
          @include('admin.chip._form')

          <button class="btn blue">Adicionar</button>
        </form>
    </div>
</div>


@endsection
