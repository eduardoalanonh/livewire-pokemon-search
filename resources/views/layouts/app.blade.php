<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pokemon') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>

</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">


    <!-- Page Heading -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-lighttext-light">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link @if(request()->is('/')) active @endif" href="{{route('home')}}">Home</a>
            </li>
            @if(!auth()->user())
            <li class="nav-item">
                <a class="nav-link @if(request()->is('register')) active @endif"
                   href="{{route('register')}}">Register</a>
            </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('login')) active @endif"
                       href="{{route('login')}}">Login</a>
                </li>
            @endif
            @auth()
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('deck')) active @endif" href="{{route('deck')}}">My
                        deck</a>
                </li>
            @endauth
        </ul>
            @auth()
            <div class="my-2 my-lg-0">
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#"
                           onclick="event.preventDefault(); document.querySelector('form.logout').submit()">Sair</a>
                        <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            @endauth
        </nav>
    </header>

    <!-- Page Content -->
    <main>
        @yield('content')

    </main>
</div>
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>

</body>
</html>
