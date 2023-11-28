<!DOCTYPE html>

<html lang="pt_BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--======== CSS ========-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"/>
    @yield('scriptcss')
    <!--======== Scripts ========-->
    <script defer src="{{ asset('scripts/bootstrap.js') }}"></script>
    <script defer src="{{ asset('scripts/sidebar.js') }}"></script>

    <!--======== CSS Boxicons ========-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <title>ifórmula - @yield('titulo')</title>
    @livewireStyles
    
</head>

<body class="{{ $theme == 'dark' ? 'dark' : ''}} " x-data="{ showModal: false }" x-bind:class="{ 'overflow-hidden': showModal }">
    <script src="{{ asset('scripts/dark-theme.js') }}"></script>
    <nav class="sidebar close">
        <header>
            <div class="sidebar-top">
                <span class="image">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0.00 0.00 993.00 251.00">
                        <!-- Acento -->
                        <path class="path-acento" d=
                          "M 225.19 62.31 Q 223.13 61.38 224.46 59.33 
                          C 237.34 39.39 248.02 21.83 276.05 29.37 
                          C 279.42 30.28 280.15 32.16 277.69 34.77 
                          C 264.20 49.04 248.20 72.77 225.19 62.31 
                          Z" 
                        />
                        
                        <!-- Pingo do I -->
                        <ellipse cx="0.00" cy="0.00" transform="translate(29.41,47.25) rotate(2.6)" rx="21.34" ry="20.06"/>
                        
                        <!-- Parte cima do I -->
                        <rect x="-17.19" y="-33.05" transform="translate(29.22,126.66) rotate(-0.3)" width="34.38" height="66.10" rx="4.43"/>
                        
                        <!-- Parte debaixo do I -->
                        <path d="
                          M 45.58 173.78
                          A 1.43 1.43 0.0 0 1 47.01 175.21
                          L 46.93 217.02
                          A 11.28 9.41 -89.9 0 1 37.50 228.28
                          L 21.12 228.26
                          A 11.28 9.41 -89.9 0 1 11.73 216.96
                          L 11.81 175.15
                          A 1.43 1.43 0.0 0 1 13.24 173.72
                          L 45.58 173.78
                          Z"
                        />
                        
                        <!-- Parte de cima do F -->
                        <path d="
                          M 68.56 93.16
                          Q 76.64 92.89 84.28 93.02
                          A 1.14 1.14 0.0 0 0 85.44 91.92
                          C 86.01 74.57 85.45 58.21 89.84 41.23
                          Q 91.82 33.61 95.10 28.93
                          C 107.97 10.57 136.56 9.24 156.29 13.97
                          Q 158.49 14.50 158.22 17.03
                          Q 157.64 22.38 156.30 37.52
                          Q 155.95 41.44 152.00 41.31
                          C 131.39 40.63 120.60 42.55 120.26 66.49
                          Q 120.08 79.27 120.52 91.75
                          A 1.27 1.27 0.0 0 0 121.72 92.97
                          Q 131.49 93.51 141.74 93.51
                          C 150.13 93.50 151.47 97.86 151.50 105.47
                          Q 151.51 111.82 151.49 118.17
                          A 4.25 4.24 -1.1 0 1 147.41 122.40
                          L 121.11 123.42
                          A 1.15 1.15 0.0 0 0 120.00 124.57
                          L 120.00 157.89
                          A 1.94 1.93 -89.7 0 1 118.05 159.83
                          L 86.75 159.51
                          A 1.01 1.01 0.0 0 1 85.75 158.50
                          L 85.75 125.77
                          A 2.42 2.42 0.0 0 0 83.43 123.35
                          Q 74.75 122.96 65.62 122.74
                          C 60.45 122.62 57.72 120.71 57.72 115.45
                          Q 57.72 103.37 58.30 99.01
                          C 59.05 93.27 63.97 93.31 68.56 93.16
                          Z"
                        />
                        
                        <!-- Parte debaixo do F -->
                        <path d="
                          M 119.23 173.82
                          A 1.30 1.30 0.0 0 1 120.52 175.13
                          L 120.17 215.53
                          A 14.08 13.49 -89.5 0 1 106.56 229.49
                          L 98.80 229.43
                          A 14.08 13.49 -89.5 0 1 85.43 215.23
                          L 85.78 174.83
                          A 1.30 1.30 0.0 0 1 87.09 173.54
                          L 119.23 173.82
                          Z"
                        />
                        
                        
                        <!-- O -->
                        <path class="animate-letter" d="
                          M 306.3437 160.6920
                          A 74.11 71.88 1.2 0 1 230.7447 231.0042
                          A 74.11 71.88 1.2 0 1 158.1563 157.5880
                          A 74.11 71.88 1.2 0 1 233.7553 87.2758
                          A 74.11 71.88 1.2 0 1 306.3437 160.6920
                          Z
                          M 231.8338 199.8078
                          A 40.70 39.57 90.6 0 0 271.8278 159.5244
                          A 40.70 39.57 90.6 0 0 232.6862 118.4122
                          A 40.70 39.57 90.6 0 0 192.6922 158.6956
                          A 40.70 39.57 90.6 0 0 231.8338 199.8078
                          Z"
                        />
                        
                        <!-- R -->
                        <path style="animation-delay: 0.1s;" class="animate-letter" d="
                          M 360.81 113.15
                          Q 361.57 113.59 362.05 112.86
                          Q 377.30 89.73 405.01 91.75
                          C 416.27 92.57 413.55 111.94 412.58 119.22
                          C 412.17 122.25 410.01 124.72 406.99 124.51
                          C 397.36 123.86 386.23 123.44 377.03 128.51
                          C 362.83 136.32 360.65 150.15 360.55 165.01
                          Q 360.35 195.84 360.19 226.68
                          C 360.17 228.89 357.60 230.20 355.44 230.45
                          C 342.23 231.97 325.81 233.98 325.79 215.02
                          Q 325.72 160.85 325.76 106.67
                          C 325.76 99.43 327.97 94.81 335.67 94.77
                          C 340.36 94.75 353.43 93.60 357.12 95.66
                          C 362.99 98.93 359.11 112.17 360.81 113.15
                          Z"
                        />
                        
                        <!-- M -->
                        <path style="animation-delay: 0.25s;" class="animate-letter" d="
                          M 463.21 108.25
                          C 483.31 81.31 527.32 77.03 545.58 109.07
                          A 1.15 1.14 49.4 0 0 547.47 109.22
                          Q 550.57 105.33 554.19 101.70
                          C 570.93 84.90 598.38 80.93 618.37 94.66
                          Q 637.80 108.01 639.05 134.25
                          Q 641.08 176.57 639.72 221.00
                          C 639.63 223.95 638.19 225.31 635.29 225.89
                          C 627.84 227.36 605.48 229.93 605.49 218.03
                          Q 605.52 185.37 605.48 152.76
                          Q 605.47 143.54 603.56 134.56
                          C 600.61 120.69 587.17 115.10 574.26 118.49
                          C 557.62 122.87 553.69 134.93 552.16 150.52
                          C 549.98 172.81 550.82 194.90 551.63 217.22
                          Q 551.79 221.61 550.48 223.60
                          C 546.01 230.45 526.35 226.23 521.15 224.05
                          C 518.87 223.09 517.57 219.50 517.53 216.85
                          C 517.18 191.36 518.09 166.04 517.08 140.52
                          C 516.64 129.46 513.16 120.52 501.51 118.28
                          C 487.72 115.63 471.07 122.26 466.53 137.01
                          Q 464.64 143.17 464.46 154.07
                          Q 464.04 180.94 464.45 207.82
                          Q 464.58 216.15 463.15 219.02
                          C 458.16 229.10 440.23 225.61 432.01 222.15
                          C 429.99 221.29 429.51 219.79 429.51 217.58
                          Q 429.49 161.04 429.50 104.50
                          C 429.51 96.16 433.18 90.90 441.81 90.38
                          C 454.35 89.63 463.85 93.37 462.42 107.95
                          A 0.44 0.44 0.0 0 0 463.21 108.25
                          Z"
                        />
                        
                        <!-- U -->
                        <path style="animation-delay: 0.35s;" class="animate-letter" d="
                          M 656.64 100.75
                          C 656.64 97.20 657.49 93.54 661.77 93.53
                          Q 675.01 93.47 688.10 93.51
                          A 2.69 2.68 0.2 0 1 690.78 96.20
                          C 690.69 123.65 688.12 150.90 692.26 177.00
                          Q 693.98 187.91 697.22 192.83
                          C 705.24 205.03 722.60 204.34 733.86 196.09
                          C 742.75 189.59 745.58 180.02 745.72 169.40
                          Q 746.35 123.51 745.96 100.50
                          C 745.88 95.78 747.71 93.53 752.58 93.52
                          Q 764.68 93.48 776.48 93.51
                          A 4.27 4.27 0.0 0 1 780.75 97.78
                          L 780.75 228.01
                          A 1.51 1.50 -0.0 0 1 779.24 229.51
                          L 748.43 229.48
                          A 1.98 1.91 -6.2 0 1 746.51 228.00
                          L 744.16 217.90
                          A 0.87 0.87 0.0 0 0 742.72 217.46
                          C 713.68 244.68 662.95 235.71 657.74 191.74
                          Q 657.02 185.61 656.93 172.44
                          Q 656.68 136.60 656.64 100.75
                          Z"
                        />
                        
                        <!-- L -->
                        <rect style="animation-delay: 0.45s;" class="animate-letter" x="798.25" y="15.27" width="34.00" height="212.98" rx="8.54"/>
                        
                        <!-- A -->
                        <path style="animation-delay: 0.55s;" class="animate-letter" d="
                          M 881.64 127.15
                          C 873.54 132.23 852.61 115.51 867.96 105.97
                          Q 896.65 88.14 929.82 92.35
                          C 951.35 95.08 969.17 109.18 972.03 131.51
                          Q 973.82 145.50 973.91 161.69
                          Q 974.10 195.69 973.96 229.75
                          Q 973.96 231.25 972.46 231.25
                          Q 931.94 231.24 890.81 231.26
                          Q 881.77 231.26 876.85 229.92
                          C 849.71 222.55 841.62 189.32 858.18 168.28
                          C 873.92 148.29 907.30 145.87 930.41 146.65
                          C 934.21 146.78 937.81 146.14 941.45 145.59
                          A 1.61 1.60 -4.7 0 0 942.82 143.98
                          C 942.28 108.93 900.86 115.09 881.64 127.15
                          Z
                          M 898.02 175.25
                          C 892.79 176.88 883.90 182.05 883.73 188.26
                          C 883.19 207.93 904.83 211.48 919.45 207.11
                          Q 937.12 201.84 940.35 184.35
                          C 941.00 180.83 940.74 176.66 940.75 172.90
                          A 2.05 2.04 -88.5 0 0 938.80 170.84
                          C 924.90 170.23 911.33 171.10 898.02 175.25
                          Z"
                        />
                        </svg>
                        
                        
                        
                </span>
                {{-- <div class="text header-text">
                    <span class="name">{{ Auth::user()->name }}</span>
                    <span class="access">Contratante</span>
                </div> --}}
            </div>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{ route('profile.edit' ) }}">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Meu Perfil</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('fabrica.index') }}">
                            <i class='bx bx-buildings icon'></i>
                            <span class="text nav-text">Fábricas</span>
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
                            <i class="bx bx-food-menu icon"></i>
                            <span class="text nav-text">Ingredientes</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <form method="POST" action="{{ route('logout') }}">
                    <li class="nav-link">

                        @csrf

                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        this.closest('form').submit();">

                            <i class="bx bx-log-out icon"></i>
                            <span class="text nav-text">Sair</span>
                            
                        </a>


                    </li>
                </form>
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
    
    <main class="py-4" >
        @yield('content')
    </main>

    @livewireScripts
</body>

</html>