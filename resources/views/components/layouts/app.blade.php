<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>BookFriends</title>
</head>

<body>
    <div class="max-w-4xl mx-auto px-6 grid grid-cols-8 gap-12 mt-16">
        <div class="sidebar  col-span-2 border-r border-slate-400 space-y-6">
        @auth

                <ul>
                    <li><a href="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">{{ auth()->user()->name }}</a></li>
                    <li><a href="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">Feed</a></li>
                </ul>

                <ul>
                    <li><a href="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">My books</a></li>
                    <li><a href="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">Add a book</a></li>
                    <li><a href="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">Friend</a></li>
                </ul>

                <ul>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="font-bold text-lg text-slate-600 hover:text-slate-800 block py-1">Logout</button>
                    </form>
                </ul>
        @endauth

        @guest
            <ul>
                <li><a href="/">Home</a></li>
            </ul>
            <ul>
                <li><a href="{{route('login')}}">Login</a></li>
                <li><a href="{{route('register')}}">Register</a></li>
            </ul>
        @endguest

        </div>
        <div class="col-span-6">
            @isset($header)
                <header>
                    <h1 class="font-bold text-2xl text-slate-400">
                        {{$header}}
                    </h1>
                </header>
            @endisset
            {{ $slot }}

        </div>
    </div>
</body>

</html>
