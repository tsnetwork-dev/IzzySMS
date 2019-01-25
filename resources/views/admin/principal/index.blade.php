@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="center">IzzySMS - Painel de Controle</h2>

    <div class="row">
      <div class="col s12 m12">
        <div id="pop_div3" >
           <?= $lava->render('AreaChart', 'Diario', 'pop_div3') ?>
        </div>  
      </div>
        
  </div>

<div class="row">
  
  
</div>

	<div class="row">
        <div class="col s12 m3">
          <div class="card green darken-1">
            <div class="card-content white-text">
              <span class="card-title"><i class="material-icons center medium">add_alert</i>Campanhas</span>              
            </div>
            <div class="card-action">
              <a class="white-text" href="{{route('admin.campanha')}}">Acessar</a>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card blue darken-1">
            <div class="card-content white-text">
              <span class="card-title"><i class="material-icons center medium">phone_android</i>Chipeiras</span>
              
            </div>
            <div class="card-action">
              <a class="white-text" href="{{route('admin.chipeira')}}">Acessar</a>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card orange darken-1">
            <div class="card-content white-text">
              <span class="card-title"><i class="material-icons center medium">account_balance</i>Credores</span>
              
            </div>
            <div class="card-action">
              <a class="white-text" href="{{route('admin.credor')}}">Acessar</a>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
      <div class="card deep-purple ">
        <div class="card-content white-text">
          <span class="card-title"><i class="material-icons center medium">perm_phone_msg</i>Bilhetagem</span>              
        </div>
        <div class="card-action">
          <a class="white-text" href="{{route('admin.posts')}}">Acessar</a>
        </div>
      </div>
    </div>
    <div class="col s12 m3">
      <div class="card deep-orange">
        <div class="card-content white-text">
          <span class="card-title"><i class="material-icons center medium">people</i>Usuários</span>              
        </div>
        <div class="card-action">
          <a class="white-text" href="{{route('admin.usuarios')}}">Acessar</a>
        </div>
      </div>
    </div>

    <div class="col s12 m3">
      <div class="card #607d8b blue-grey">
        <div class="card-content white-text">
          <span class="card-title"><i class="material-icons center medium">pie_chart</i>Estatísticas</span>              
        </div>
        <div class="card-action">
          <a class="white-text" href="{{route('admin.usuarios')}}">Acessar</a>
        </div>
      </div>
    </div>

    <div class="col s12 m3">
          <div class="card #00695c teal darken-3">
            <div class="card-content white-text">
              <span class="card-title"><i class="material-icons center medium">work</i>Construção</span>              
            </div>
            <div class="card-action">
              <a class="white-text" href="{{route('admin.usuarios')}}">Acessar</a>
            </div>
          </div>
        </div>

   <div class="col s12 m3">
      <div class="card #1a237e indigo darken-4">
        <div class="card-content white-text">
          <span class="card-title"><i class="material-icons center medium">warning</i>Construção</span>              
        </div>
        <div class="card-action">
          <a class="white-text" href="{{route('admin.usuarios')}}">Acessar</a>
        </div>
      </div>
    </div>     

  	</div>

	</div>
	

</div>



@endsection
