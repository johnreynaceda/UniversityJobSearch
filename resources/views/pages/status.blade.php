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
                        {{-- <a href="#_"
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
                            </a> --}}
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        
    </section>
    <section class="relative h-full w-full">
        <div class="px-8 py-32 mx-auto md:px-12 lg:px-32 max-w-7xl">
            <div>
                <div>
                    <span class=" font-semibold text-green-600 uppercase">Welcome User,
                        {{ auth()->user()->name }}</span>
                    @if (auth()->user()->account_status == 'rejected')
                        <p class="mt-8 text-4xl font-semibold tracking-tighter text-main text-balance lg:text-6xl">
                            Your request has been rejected.
                        </p>
                    @else
                        <p class="mt-8 text-4xl font-semibold tracking-tighter text-main text-balance lg:text-6xl">
                            Please Wait for the verification process to complete.
                        </p>
                        <p class="mx-auto mt-4 text-sm font-medium text-gray-500 text-balance">
                            We will send you an email for the update. Thank you.
                        </p>
                    @endif
                </div>
                <div class="flex flex-col items-center gap-2 mx-auto mt-8 md:flex-row">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();"
                            class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black"
                            aria-label="Primary action">
                            <span>Logout Account</span>

                        </a>
                    </form>
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