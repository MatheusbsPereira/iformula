<!DOCTYPE html>

<html lang="pt_BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--======== CSS ========-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    {{-- <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/rg-1.3.0/sl-1.5.0/datatables.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

    <!--======== Scripts ========-->
    <script defer src="{{ asset('scripts/bootstrap.js') }}"></script>
    <script defer src="{{ asset('scripts/sidebar.js') }}"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/rg-1.3.0/sl-1.5.0/datatables.min.js">
    </script>

    <!--======== CSS Boxicons ========-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <title>ifórmula - @yield('titulo')</title>
</head>

<body class="{{ $theme == 'dark' ? 'dark' : ''}}">
    <script src="{{ asset('scripts/dark-theme.js') }}"></script>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img draggable="false" src="{{ asset('images/logo.png') }}" alt="Foto de perfil" />
                </span>

                <div class="text header-text">
                    <span class="name">{{ Auth::user()->name }}</span>
                    <span class="access">Contratante</span>
                </div>
            </div>

            <i class="toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{ route('home') }}">
                            <i class="bx bx-home-alt-2 icon"></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('nutriente.index') }}">
                            <i class="bx bx-atom icon"></i>
                            <span class="text nav-text">Nutrientes</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('ingrediente.index') }}">
                            <i class="bx bx-baguette icon"></i>
                            <span class="text nav-text">Ingredientes</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-bug-alt icon"></i>
                            <span class="text nav-text">Animais</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-book-open icon"></i>
                            <span class="text nav-text">Rações</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="nav-link">
                    <a href="#">
                        <i class="bx bx-log-out icon"></i>
                        <span class="text nav-text">Sair</span>
                    </a>
                </li>
                <li class="mode">
                    <div class="moon-sun">
                        <i class="bx bx-moon icon moon"></i>
                        <i class="bx bx-sun icon sun"></i>
                    </div>
                    <span class="mode-text text">Modo notuno</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>
    
    <main class="py-4">
        @yield('content')
    </main>

</body>

</html>
