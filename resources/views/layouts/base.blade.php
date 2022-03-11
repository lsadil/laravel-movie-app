<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')

        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ url(mix('js/app.js')) }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex items-center">
                <li>
                    <a href="/">
                        <x-eos-movie class="w-10 text-orange-500 hover:text-orange-600 transition ease-in-out duration-200"/>
                    </a>
                </li>
                <li class="ml-16">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300 transition ease-in-out duration-200">Movies</a>
                </li>
                <li class="ml-10">
                    <a href="#" class="hover:text-gray-300 transition ease-in-out duration-200">TV Shows</a>
                </li>
                <li class="ml-10">
                    <a href="#" class="hover:text-gray-300 transition ease-in-out duration-200">Actors</a>
                </li>
            </ul>
            <div class="flex items-center">
                <div class="relative">
                    <input type="text"
                        class="bg-gray-800 rounded-full text-sm w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
                        placeholder="Search">
                    <div class="absolute top-0">
                        <x-eos-search class="fill-current w-4 text-gray-500 mt-2 ml-2" />
                    </div>
                </div>
                <div class="ml-4">
                    <a href="#">
                        <img src="/img/avatar.jpg" alt="avatar" class="rounded-full w-8 h-8">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')

    @livewireScripts
</body>

</html>
