<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title','GFEcommerce - 2022')
    </title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/css/estilos.css" rel="stylesheet">
    <link href="/css/plantilla.css" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="/imagenes/naranja.png">
    @yield('css')
</head>
<body>
    <div id="divHambur" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid" id="navbarHeader">
            <label for="hambur" class="btn btn-dark navbar-brand"><i class="fa fa-solid fa-bars"></i></label>
        </div>
    </div>
    <div class="d-flex">
        <input type="checkbox" class="hambur" id="hambur">
        <div id="sidebar-container" class="text-white">
            <div class="logo">
                <img src="/imagenes/naranja.png" alt="">    
                <strong>Tienda Cafenort</strong>
            </div>
            <div class="menu">
                <div class="link">
                    <a href="" class="d-block text-light p-3"><i class="fa fa-solid fa-users p-1"></i><span>Clientes</span></a>
                </div>
                <div class="link">
                    <a href="" class="d-block text-light p-3"><i class="fa fa-solid fa-receipt p-1"></i><span>Categorias</span></a>
                </div>
                <div class="link">
                    <a href="" class="d-block text-light p-3"><i class="fa fa-solid fa-list p-1"></i></i><span>Productos</span></a>
                </div>
                <div class="link">
                    <a href="" class="d-block text-light p-3"><i class="fa fa-solid fa-image p-1"></i><span>Catalogo</span></a>
                </div>
                <!-- <div class="link">
                    <a href="/registrar" class="d-block text-light p-3"><i class="fa fa-solid fa-user p-1"></i><span>Usuarios</span></a>
                </div> -->
                <div class="link">
                    <a href="{{url('/listaventas')}}" class="d-block text-light p-3"><i class="fa fa-solid fa-file-invoice p-1"></i><span>Reporte Ventas</span></a>
                </div>
                <!-- <div class="link">
                    <a href="#" class="d-block text-light p-3">Configuracion</a>
                </div> -->
            </div>
        </div>
        <!-- <main>
            <div id="divIniciarSesion" class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <div class="nav-link dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (Route::has('login'))
                                        @auth
                                            {{ Auth::user()->name }} ({{ Auth::user()->email }})
                                        @else
                                            Iniciar Sesion
                                        @endauth
                                    @endif
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @if (Route::has('login'))
                                        @auth
                                            <li class="block px-4 py-2 text-xs">Administrar Cuenta</li>
                                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Perfil</a></li>
                                            <li>
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <button type="submit" class="dropdown-item">Cerrar Sesion</button>
                                            </form>
                                            </li>
                                        @else
                                            <li class="block px-4 py-2 text-xs">Administrar Cuenta</li>
                                            <li><a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesion</a></li>
                                        @endauth
                                    @endif
                                </ul>
                            </div>      
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container text-center" id="container-admin">
                @yield('container-admin')
            </div>
        </main> -->
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9a61bee9db.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/brands.js" crossorigin="anonymous"></script>
    @yield('js')
</body>
</html>