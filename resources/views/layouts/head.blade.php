<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="bg-white py-2">
        <div class="px-4 flex justify-between">
            <div class="py-2">
                <a href="{{ route('product.index') }}" class="text-3xl font-bold tracking-tight">{{ config('app.name', 'Laravel')}}</a>
            </div>
            <div class="py-2 flex justify-between">
                @guest
                <form action="{{ route('login_register') }} " method="get">
                    @csrf
                    @yield('button')
                </form>
                @endguest

                @auth
                <form action="{{ route('logout') }} " method="post">
                    @csrf
                    <button type="submit" class="px-4 py-1 bg-red-500 text-white hover:bg-red-700 transition duration-200 ease-in-out rounded">
                        ログアウト
                    </button>
                </form>
                @endauth

                <a href="{{ route('cart.index') }}" class="px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
