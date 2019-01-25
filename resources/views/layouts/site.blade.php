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
    <header>
        @include('layouts._site._nav')
    </header>


        <main class="py-4">
            @yield('content')
        </main>

        <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
        <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
        <script src="{{asset('js/init.js')}}"></script>
    </div>
</body>
</html>
