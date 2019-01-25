@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="center">IzzySMS - Painel de Controle</h2>
	<div class="row">
        <div class="col s12 m4">
          <div class="card green darken-1">
            <div class="card-content white-text">
              <span class="card-title"><i class="material-icons left medium">add_alert</i>Campanhas</span>
              <p><br>Criar Campanha</p>
            </div>
            <div class="card-action">
              <a class="white-text" href="{{route('admin.campanha')}}">Acessar</a>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card blue darken-1">
            <div class="card-content white-text">
              <span class="card-title"><i class="material-icons left medium">phone_android</i>Chipeiras</span>
              <p><br>Cadastro de Equipamentos</p>
            </div>
            <div class="card-action">
              <a class="white-text" href="{{route('admin.chipeira')}}">Acessar</a>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card orange darken-1">
            <div class="card-content white-text">
              <span class="card-title"><i class="material-icons left medium">account_balance</i>Credores</span>
              <p><br>Carteiras</p>
            </div>
            <div class="card-action">
              <a class="white-text" href="{{route('admin.credor')}}">Acessar</a>
            </div>
          </div>
        </div>
	</div>
	<div class="row">
        <div class="col s12 m6">
          <div class="card deep-purple ">
            <div class="card-content white-text">
              <span class="card-title"><i class="material-icons left medium">perm_phone_msg</i>Bilhetagem</span>
              <p>SMS Enviados</p>
              <p>SMS Recebidos</p>
            </div>
            <div class="card-action">
              <a class="white-text" href="{{route('admin.posts')}}">Acessar</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card deep-orange">
            <div class="card-content white-text">
              <span class="card-title"><i class="material-icons left medium">people</i>Usuários</span>
              <p><br>Lista de usuários</p>
            </div>
            <div class="card-action">
              <a class="white-text" href="{{route('admin.usuarios')}}">Acessar</a>
            </div>
          </div>
        </div>

	</div>
	<div class="row">
	@can('papel_listar')
		<div class="col s12 m6">
          <div class="card red darken-1">
            <div class="card-content white-text">
              <span class="card-title"><i class="material-icons left medium">assignment</i>Relatórios</span>
              <p><br>Relatórios por Equipamento</p>
            </div>
            <div class="card-action">
              <a class="white-text" href="#">Acessar</a>
            </div>
          </div>
        </div>
    @endcan


	</div>

</div>

</div>

@endsection
