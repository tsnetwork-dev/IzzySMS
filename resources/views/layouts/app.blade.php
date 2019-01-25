<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('lib/materialize/dist/css/materialize.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
    <div id="app">
        @include('layouts._admin._nav')
        <main class="py-4">
            @if(Session::has('mensagem'))
            <div class="container">
                <div class="row">
                    <div class="card {{Session::get('mensagem')['class']}}">
                        <div align="center" class="card-content ">
                            {{Session::get('mensagem')['msg']}}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @yield('content')
        </main>

        <script type="text/javascript" src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/init.js')}}"></script>

    </div>
</body>
</html>
