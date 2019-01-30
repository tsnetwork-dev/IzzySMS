@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">Campanhas</h2>

        <div class="row">
            <nav>
                <div class="nav-wrapper green darken-1">
                    <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                    <a href="#" class="breadcrumb">Campanhas</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Credor</th>
                        <th>Campanha</th>
                        <th>Telefones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($campanhas as $campanha)
                        <tr>
                            <td>{{$campanha->id}}</td>
                            <td>{{date ('d/m/Y H:i:s', strtotime($campanha->Data))}}</td>
                            <td>{{$campanha->cd_credor}}</td>
                            <td>{{$campanha->nome_campanha}}</td>
                            <td><b>{{ $campanha->total }}</b></td>
                            <td>
                                <a class="btn-floating  btn-flat btn-small waves-effect waves-light green darken-1" href="{{route('admin.campanha.campanha',$campanha->id)}}"><i class="material-icons">assignment_turned_in</i></a>
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>

        </div>
        <div class="row">
                <a class="btn blue" href="{{route('admin.campanha.nova')}}">Adicionar</a>
        </div>
</div>

<div align="center" class="row ">
        {{$campanhas->links()}}
</div>
@endsection

