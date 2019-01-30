@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="center">Editar Chip</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                <a href="{{route('admin.chipeira')}}" class="breadcrumb">Chipeiras Cadastradas</a>
                <a href="{{ route('admin.chip',$chip->Chipeira_id) }}" class="breadcrumb">Chipeira</a>
                <a  class="breadcrumb">Editar Chip</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{route('admin.chip.atualizar',$chip->id)}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="put">
          @include('admin.chip._form')

          <button class="btn blue">Atualizar</button>
        </form>
    </div>
</div>

@endsection
