<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @wireUiScripts
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="fixed w-full">
        <img src="{{ asset('images/bg.jpg') }}" class="w-full opacity-5" alt="">
    </div>
    <div class="relative overflow-hidden bg-white border-b">
        <div class="relative w-full mx-auto max-w-7xl">
            <div class="relative flex flex-col w-full p-2 mx-auto lg:px-20 md:flex-row md:items-center md:justify-between md:px-6"
                x-data="{ open: false }">
                <div class="flex flex-row items-center justify-between text-sm text-gray-800 lg:justify-start">
                    <a href="/" class="flex space-x-2 items-center">
                        <img src="{{ asset('images/bsu_logo.png') }}" class="h-16" alt="">
                        <span class="font-bold text-xl text-main">ILEAP</span>
                    </a><button
                        class="inline-flex items-center justify-center p-2 text-gray-800 focus:outline-none focus:text-black hover:text-black md:hidden"
                        @click="open = !open">
                        <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M4 6h16M4 12h16M4 18h16" :class="{ 'hidden': open, 'inline-flex': !open }"
                                class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            </path>
                            <path d="M6 18L18 6M6 6l12 12" :class="{ 'hidden': !open, 'inline-flex': open }"
                                class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            </path>
                        </svg>
                    </button>
                </div>
                <nav :class="{ 'flex': open, 'hidden': !open }"
                    class="flex-col items-center flex-grow hidden md:flex md:flex-row md:justify-end md:pb-0">
                    <a href="#_"
                        class="px-2 py-2  font-medium text-gray-800 hover:text-gray-800/50 lg:px-6 md:px-3 lg:ml-auto">How
                        it Works?</a>

                    <div class="inline-flex items-center gap-1 list-none lg:ml-auto">
                        <a href="{{ route('login') }}"
                            class="block px-2 py-2 mt-2  text-gray-800 hover:text-gray-800/50 focus:outline-none focus:shadow-outline md:mt-0">
                            <span>LOG IN</span>
                        </a>
                        <a href="{{ route('register') }}"
                            class="block px-2 py-2 mt-2  text-gray-800 hover:text-gray-800/50 focus:outline-none focus:shadow-outline md:mt-0">
                            <span>SIGN UP</span>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="h-full py-20 flex flex-col sm:justify-center items-center sm:pt-0 ">


        {{ $slot }}

    </div>
    <footer class="bg-white mt-20 relative ">
        <div class="px-8  relative py-12 mx-auto md:px-12 lg:px-32 max-w-7xl">
            <div class="flex flex-col items-baseline space-y-6">
                <div class="mx-auto">
                    <a href="/" class="mx-auto text-lg text-center">
                        <img src="{{ asset('images/other_logo.png') }}" class="h-20" alt="">
                    </a>
                </div>
                <div class="mx-auto" x-data="{ year: new Date().getFullYear() }">
                    <span class="mx-auto mt-2 text-sm font-medium text-gray-500">
                        Copyright © <span x-text="year">2024</span>
                        <a aria-label="Michael Andreuzza" href="#_"
                            class="mx-2 text-main hover:text-gray-500">ILEAP</a>
                    </span>
                </div>
            </div>
        </div>
    </footer>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
