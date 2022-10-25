<!doctype html>
<html>

<head>
    <title>@yield('title', 'vib-future support')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="Janco Bronsveld">
    <meta name="description" content="get support and contact for vib-future"> <!-- description of website  -->

    <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
        rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" href={{ url('favicon.ico') }} type="image/x-icon">

    <!-- style sheets -->
    @vite('resources/scss/app.scss')

    <!-- jquery -->
    <script 
        src="https://code.jquery.com/jquery-3.6.1.min.js" 
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" 
        crossorigin="anonymous">
    </script>


</head>

@php
$url_without_navbar = ['login', 'sign_up'];

if (auth()->check()) {
    if (auth()->user()->admin_role === 0) {
        $url_without_navbar = ['alle_tickets', 'users', 'history', 'trashed', 'settings', 'login', 'sign_up', 'ticket/create'];
    }
}

@endphp

<body>
    @if (request()->is($url_without_navbar))
    @else
        <aside>
            @include('partials.aside')
        </aside>
    @endif
    <main>
        @include('components.alerts')

        @yield('content')
    </main>

    @vite('resources/js/app.js')
    @livewireScripts
</body>

</html>
