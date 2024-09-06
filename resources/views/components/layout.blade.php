<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite('resources/css/app.css')
    </head>
    <body>
        <header class="bg-gray-800 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-bold">My Blog</h1>
                <nav>
                    <ul class="flex space-x-4">
                        <li><a href="/" class="hover:underline">Home</a></li>
                        <li><a href="/about" class="hover:underline">About</a></li>
                        <li><a href="/blog" class="hover:underline">Blog</a></li>
                        <li><a href="/contact" class="hover:underline">Contact</a></li>
                        @auth
                <div class="space-x-6 font-bold flex">
                    <a href="/jobs/create">Post a Job</a>

                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')

                        <button>Log Out</button>
                    </form>
                </div>
            @endauth

            @guest
                <div class="space-x-6 font-bold">
                    <a href="/register">Sign Up</a>
                    <a href="/login">Log In</a>
                </div>
            @endguest
                    </ul>
                </nav>
            </div>
        </header>
        <div class="font-figtree">
            {{ $slot }}
        </div>
    </body>
</html>