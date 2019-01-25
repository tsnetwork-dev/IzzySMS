@extends('layouts.app')

@section('content')

<div class="container">
<h2 class="center">Enviar Campanha</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper green darken-1">
                <div class="col s12">
                <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                <a href="{{route('admin.principal')}}" class="breadcrumb">Lista de Campanhas</a>
                <a  class="breadcrumb">Enviar Campanha</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
      
    </div>    

    <div class="row">
        <form action="{{route('admin.campanha.enviar',$campanha->id)}}" method="get">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="put">  
          @include('admin.campanha._lista')
          <button class="btn blue">Enviar Campanha</button><br>
        </form>
    </div>
</div>


@endsection
