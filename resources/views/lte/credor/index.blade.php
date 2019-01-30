@extends('layouts.app')


@section('content')
    <div class="container">
        <h2 class="center">Lista de Carteiras</h2>

        <div class="row">
            <nav>
                <div class="nav-wrapper orange darken-1">
                    <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
                    <a href="#" class="breadcrumb">Lista de Carteiras</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Carteira</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($credores as $credor)
                        <tr>
                            <td>{{$credor->cd_credor}}</td>
                            <td>{{strtoupper($credor->ds_credor)}}</td>
                            <td><a class="btn red smal" href="#">Deletar</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        <div class="row">
                <a class="btn blue" href="{{route('admin.credor.novo')}}">Adicionar</a>
        </div>
</div>

<div align="center" class="row ">
        {{$credores->links()}}
</div>
@endsection

