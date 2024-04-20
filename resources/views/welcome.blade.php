<x-layouts.app>
    <section class="bg-white">
        <div class="fixed w-full">
            <img src="{{ asset('images/bg.jpg') }}" class="w-full opacity-5" alt="">
        </div>
        <div class="relative  bg-white border-b">
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
        <div class="flex flex-col items-center justify-center">
            <div class="relative items-center w-full px-5 pt-12 mx-auto max-w-7xl lg:pt-36 lg:px-16 md:px-12">
                <div class="max-w-3xl mx-auto text-center">
                    <p class="text-4xl font-extrabold tracking-tight text-gray-800 md:text-6xl">
                        Building Bridges: Seamlessly Connecting OJT and Alumni to Opportunities.
                    </p>

                </div>
                <div class="flex flex-col justify-center gap-3 mt-10 sm:flex-row">

                </div>
            </div>
            <div class="relative items-center w-full py-12 pb-12 mx-auto mt-12 max-w-7xl">
                <div class="grid grid-cols-2 gap-20  w-full">
                    <div>
                        <h1 class="text-2xl text-gray-500">Looking for <span class="text-main font-bold">OJT</span>?
                        </h1>
                        <div class="border border-gray-300 mt-3 flex space-x-2 items-center p-2 px-5 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-400" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z">
                                </path>
                            </svg>
                            <input type="text" name="" placeholder="Search OJTs"
                                class="outline-none border-0 flex-1 focus:outline-none bg-transparent
                                 focus:border-0 focus:ring-0 "
                                id="">
                            <button
                                class="p-2 px-6 rounded-full font-bold text-lg bg-main hover:bg-red-600  text-white">
                                <span>SEARCH</span>
                            </button>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-2xl text-gray-500">Looking for <span
                                class="text-green-600 font-bold">Work</span>?</h1>
                        <div class="border border-gray-300 mt-3 flex space-x-2 items-center p-2 px-5 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-400" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z">
                                </path>
                            </svg>
                            <input type="text" name="" placeholder="Search Jobs"
                                class="outline-none border-0 flex-1 focus:outline-none bg-transparent focus:border-0 focus:ring-0 "
                                id="">
                            <button
                                class="p-2 px-6 rounded-full font-bold text-lg bg-main hover:bg-red-600  text-white">
                                <span>SEARCH</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-white relative mt-20">
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
</x-layouts.app>
