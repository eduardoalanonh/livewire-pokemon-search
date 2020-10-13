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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand  @if(request()->is('/')) active @endif" href="{{route('home')}}">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-lightning-fill" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"/>
                </svg>
                Home
            </a>
            <div class=" navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                    </li>
                    @auth()
                        <li class="nav-item">
                            <a class="nav-link @if(request()->is('pokemon')) active @endif" href="{{route('pokemon')}}">My
                                Pokemon</a>
                        </li>
{{--                        <li>--}}
{{--                            <a class="nav-link @if(request()->is('users')) active @endif"--}}
{{--                               href="{{route('users')}}"><span>User's Pokemons</span></a>--}}
{{--                        </li>--}}
                    @endauth
                </ul>
                <ul class="navbar-nav right">
                    @if(!auth()->user())
                        <li class="nav-item">
                            <a class="nav-link @if(request()->is('login')) active @endif"
                               href="{{route('login')}}"><span>Login</span></a>
                        </li>
                        <li>
                            <a class="nav-link @if(request()->is('register')) active @endif"
                               href="{{route('register')}}"><span>Register</span></a>
                        </li>
                    @endif
                    @if(auth()->user())
                        <li class="nav-item">
                            <a class="nav-link @if(request()->is('profile')) active @endif"
                               href="{{route('profile')}}"> <span>
                                     @if(!auth()->user()->profile_photo_path)
                                        <img src="https://eduardoalano.s3-sa-east-1.amazonaws.com/no-avatar.png" alt="..." style="width:40px">
                                    @else
                                        <img
                                            src="{{'https://eduardoalano.s3-sa-east-1.amazonaws.com/' . auth()->user()->profile_photo_path}}"
                                            alt="..." style="width:20px"
                                            class="img-fluid rounded rounded-circle">
                                    @endif
                                </span>Profile </a>
                        </li>

                        <a class="nav-link" href="#"
                           onclick="event.preventDefault(); document.querySelector('form.logout').submit()">Logout</a>
                        <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                            @csrf
                        </form>
                    @endif
                </ul>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <main>
        @yield('content')

    </main>
</div>
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script>

</body>
</html>
