<!doctype html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/style_side.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                </button>
            </div>
            <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
                <div class="user-logo">
                    <div class="img" style="background-image: url(images/logo.jpg);"></div>
                    <h3> {{ Auth::user()->name }} {{ Auth::user()->apellido_paterno }}
                        {{ Auth::user()->apellido_materno }}
                    </h3>
                </div>
            </div>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="   {{ route('home')}}"><span class="fa fa-home mr-3"></span> Inicio</a>
                </li>
                <li>
                    <a href="   {{ route('empleados.index')}}"><span class="fa fa-users mr-3 "></span> Empleados</a>
                </li>
                <li>
                    <a href="   {{ route('inventarios.index')}}"><span class="fa fa-cubes mr-3"></span> Inventario</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-bell mr-3 notif"><small
                                class="d-flex align-items-center justify-content-center">5</small></span>
                        Notificaciones</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-calendar mr-3"></span> Eventos</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-cogs mr-3"></span> Configuración</a>
                </li>
                @guest
                @else
                    <li class="nav-item dropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                         document.getElementById('logout-form').submit();">
                            <span class="fa fa-sign-out mr-3"></span> {{ __('Salir') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>


        </nav>


        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <!-- Mensajes de éxito -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Mensajes de error de validación -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="validationAlert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <script>
                // Añadir animación de entrada (slide-down)
                document.addEventListener('DOMContentLoaded', function () {
                    // Mensajes de éxito
                    const successAlert = document.getElementById('successAlert');
                    if (successAlert) {
                        successAlert.classList.add('slide-in');

                        // Animación para desaparecer (fade-out) después de 5 segundos
                        setTimeout(function () {
                            successAlert.classList.remove('slide-in');
                            successAlert.classList.add('fade-out');
                        }, 5000);
                    }

                    // Mensajes de error
                    const validationAlert = document.getElementById('validationAlert');
                    if (validationAlert) {
                        validationAlert.classList.add('slide-in');

                        // Animación para desaparecer (fade-out) después de 5 segundos
                        setTimeout(function () {
                            validationAlert.classList.remove('slide-in');
                            validationAlert.classList.add('fade-out');
                        }, 5000);
                    }
                });
            </script>

            <style>
                /* Animación de deslizamiento desde arriba */
                .slide-in {
                    animation: slideIn 1s ease-out;
                }

                @keyframes slideIn {
                    from {
                        transform: translateY(-100%);
                        opacity: 0;
                    }

                    to {
                        transform: translateY(0);
                        opacity: 1;
                    }
                }

                /* Animación de desvanecimiento */
                .fade-out {
                    animation: fadeOut 1s forwards;
                }

                @keyframes fadeOut {
                    from {
                        opacity: 1;
                    }

                    to {
                        opacity: 0;
                    }
                }
            </style>


            @yield('content')
        </div>
    </div>
    <!-- Agregar FontAwesome -->
    <link href="https://kit.fontawesome.com/a076d05399.js" rel="stylesheet">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/main_side.js') }}"></script>
</body>

</html>