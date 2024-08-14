<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <h1>@yield("title")</h1>
    <nav>
        <a href="{{ route("home.index") }}">home</a>
        <a href="{{ route("todoapp.index") }}">todoapp</a>
        <a href="{{ route("blog.index") }}">blog</a>
        <a href="{{ route("contact") }}">contact</a>
    </nav>
    <main>
        @yield("content")
    </main>
    <footer>
        <p>todoapp 2024</p>
    </footer>
</body>
</html>