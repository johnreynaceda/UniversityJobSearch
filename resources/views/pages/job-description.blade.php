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
                        <div>
                            <livewire:navbar />
                        </div>
                        <div class="inline-flex items-center gap-1 list-none lg:ml-auto">
                            <livewire:user-dropdown />
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="px-8  relative py-12 mx-auto md:px-12  max-w-7xl">
            <livewire:job-description />
        </div>
    </section>
    <footer class="bg-white relative">
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
