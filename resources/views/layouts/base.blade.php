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
                    <a href="/" class="flex">
                        <x-eos-movie
                            class="w-10 text-teal-500 hover:text-teal-600 transition ease-in-out duration-200" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white ml-2">Movie
                            App</span>
                    </a>
                </li>
                <li class="ml-16">
                    <a href="{{ route('movies.index') }}"
                        class="hover:text-gray-300 transition ease-in-out duration-200">Movies</a>
                </li>
                <li class="ml-10">
                    <a href="#" class="hover:text-gray-300 transition ease-in-out duration-200">TV Shows</a>
                </li>
                <li class="ml-10">
                    <a href="#" class="hover:text-gray-300 transition ease-in-out duration-200">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                <livewire:search-dropdown></livewire:search-dropdown>
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
