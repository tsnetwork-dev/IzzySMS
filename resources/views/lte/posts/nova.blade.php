@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="center">Enviar SMS</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper deep-purple">
                <div class="col s12">
                <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                <a href="{{route('admin.posts')}}" class="breadcrumb">Lista de Mensagens</a>
                <a  class="breadcrumb">Enviar SMS</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <form action="{{route('admin.posts.enviar')}}" method="post">
          {{csrf_field()}}
          @include('admin.posts._form')

          <button class="btn green"><i class="material-icons left small">send</i>Enviar</button>
        </form>
    </div>
</div>


@endsection
