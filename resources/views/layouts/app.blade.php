<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>

    @vite('resources/js/app.js')
</head>
<body class="position-relative minh-100">
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-md rounded-bottom-3 nav-color py-md-0" aria-label="TodoApp navbar">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#todo-navbar" aria-controls="todo-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            
                    <div class="collapse navbar-collapse justify-content-md-center" id="todo-navbar">
                        <ul class="navbar-nav">
                            @guest
                            <li class="nav-item px-md-2">
                                <a class="nav-link fw-semibold {{ Request::routeIs("welcome") ? "active" : "" }}" href="{{ route("welcome") }}">Welcome</a>
                            </li>
                            <li class="nav-item px-md-2">
                                <a class="nav-link fw-semibold {{ Request::routeIs("register") ? "active" : "" }}" href="{{ route("register") }}">Register</a>
                            </li>
                            <li class="nav-item px-md-2">
                                <a class="nav-link fw-semibold {{ Request::routeIs("login") ? "active" : "" }}" href="{{ route("login") }}">Login</a>
                            </li>
                            <li class="nav-item px-md-2">
                                <a class="nav-link fw-semibold {{ Request::routeIs("contact") ? "active" : "" }}" href="{{ route("contact") }}">Contact</a>
                            </li>
                            @endguest

                            @auth
                            <li class="nav-item px-md-2">
                                <a class="nav-link fw-semibold {{ Request::routeIs("home") ? "active" : "" }}" href="{{ route("home") }}">Home</a>
                            </li>
                            <li class="nav-item px-md-2">
                                <a class="nav-link fw-semibold {{ Request::routeIs("todoapp.index") ? "active" : "" }} {{ Request::routeIs("todoapp.create") ? "active" : "" }}" href="{{ route("todoapp.index") }}">To-do list</a>
                            </li>
                            <li class="nav-item px-md-2">
                                <a class="nav-link fw-semibold {{ Request::routeIs("blog.index") ? "active" : "" }}" href="{{ route("blog.index") }}">Blog</a>
                            </li>  
                            <li class="nav-item px-md-2">
                                <a class="nav-link fw-semibold" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout-form">
                                    @csrf
                                </form>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main class="pb-60">
        <div class="container">
            @guest
            <div class="d-flex justify-content-center rounded my-3 brand-color fs-4 fw-bold">
                {{ config('app.name') }}
            </div>
            @endguest
            @auth
            <div class="d-md-flex rounded my-3 brand-color text-center justify-content-md-evenly">
                <div class=" fs-4 fw-bold">{{ config('app.name') }}</div>
                <div class="fs-4">Welcome: {{ Auth::user()->name }} !</div>
            </div>
            @endauth
            @yield("content")
        </div>
    </main>
    <footer class="position-absolute w-100 bottom-0">
        <div class="container">
            <div class="d-flex justify-content-center py-2 border-top footer-color rounded-top-3">
                <p class="my-0 text-body-secondary">© 2024 todoapp</p>
            </div>
          </div>
    </footer>
</div>
</body>
</html>