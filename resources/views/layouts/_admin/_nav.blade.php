<nav>
    <div class="nav-wrapper blue">
        <div class="container">
            <a href="#!" class="brand-logo"><img class="responsive-img" width=100px heigth=50px src="{{asset('img/logoIzzy.png')}}"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{route('admin.principal')}}">Inicio</a></li>
                @if(Auth::guest())
                    <li><a href="{{route('admin.login')}}">Login</a></li>
                @else
                    <li><a class='dropdown-trigger blue' data-target='dropdown1' href="#">{{Auth::user()->name}}</a></li>
                    <ul id="dropdown1" class="dropdown-content">
                        
                          <li><a href="{{route('admin.usuarios')}}">Usuários</a></li>
                        
                        <li><a href="{{route('admin.login')}}">Sair</a></li>
                    </ul>
                @endif

            </ul>
            
            </nav>

            <ul class="sidenav" id="mobile-demo">
                <li><a href="{{route('admin.principal')}}">Inicio</a></li>
                @if(Auth::guest())
                    <li><a href="{{route('admin.login')}}">Login</a></li>
                @else
                    <li><a href="#">{{Auth::user()->name}}</a></li>
                    <li><a href="{{route('admin.login')}}">Sair</a></li>
                @endif
            </ul>
            </div>
        </div>

          
        </div>
