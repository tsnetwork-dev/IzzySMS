@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="center">Atualizar Chipeira</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue darken-1">
                <div class="col s12">
                <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                <a href="{{route('admin.chipeira')}}" class="breadcrumb">Chipeiras Cadastradas</a>
                <a  class="breadcrumb">Atualizar Chipeira</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{route('admin.chipeira.atualizar',$chipeira->id)}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="put">
          @include('admin.chipeira._form')
          <button class="btn blue">Atualizar</button>
        </form>
    </div>
    <div class="row">
        <a class="btn green" href="{{route('admin.chip',$chipeira->id)}}">Chips</a>
    </div>
</div>


@endsection
