<!DOCTYPE html>

<html lang="pt_BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--======== CSS ========-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    @yield('scriptcss')
    <!--======== Scripts ========-->
    <script defer src="{{ asset('scripts/bootstrap.js') }}"></script>
    <script defer src="{{ asset('scripts/sidebar.js') }}"></script>

    <!--======== CSS Boxicons ========-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <title>ifórmula - @yield('titulo')</title>
</head>

<body class="{{ $theme == 'dark' ? 'dark' : ''}}">
    <script src="{{ asset('scripts/dark-theme.js') }}"></script>
    <livewire:side_bar>
    
    <main class="py-4">
        @yield('content')
    </main>

</body>

</html>