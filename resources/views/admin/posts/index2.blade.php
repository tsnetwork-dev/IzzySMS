@extends('layouts.app')


@section('content')
    <div class="container" >
        <h2 class="center">Gráficos de Mensagens</h2>
    </div>

    <div id="pop_div" align="center" style="width: 700px; height: 00px">
    	 <?= $lava->render('PieChart', 'Mensagens', 'pop_div') ?>
    </div>
    
   
    
    

@endsection

