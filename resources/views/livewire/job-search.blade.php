<div>
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
                @if (auth()->user()->user_type == 'student')
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
                            <input type="text" wire:model="search_input" name="" placeholder="Search OJTs"
                                class="outline-none border-0 flex-1 focus:outline-none bg-transparent
                         focus:border-0 focus:ring-0 "
                                id="">
                            <button wire:click="search"
                                class="p-2 px-6 rounded-full font-bold text-lg bg-main hover:bg-red-600  text-white">
                                <span>SEARCH</span>
                            </button>
                        </div>
                    </div>
                @else
                    <div>
                        <h1 class="text-2xl text-gray-500">Looking for <span
                                class="text-green-600 font-bold">Work</span>?
                        </h1>
                        <div class="border border-gray-300 mt-3 flex space-x-2 items-center p-2 px-5 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-400" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z">
                                </path>
                            </svg>
                            <input type="text" name="" wire:model="search_input" placeholder="Search Jobs"
                                class="outline-none border-0 flex-1 focus:outline-none bg-transparent focus:border-0 focus:ring-0 "
                                id="">
                            <button wire:click="search"
                                class="p-2 px-6 rounded-full font-bold text-lg bg-main hover:bg-red-600  text-white">
                                <span>SEARCH</span>
                            </button>
                        </div>
                    </div>
                @endif

            </div>
        </div>
        @if ($display_result)
            <div class="relative items-center w-full  pb-12 mx-auto  max-w-7xl">
                <h1 class="text-xl">Results:</h1>
                <div class="mt-5 ">
                    <ul class="space-y-3">
                        @forelse ($results as $item)
                            <div class="px-5 py-5 rounded-xl bg-white shadow-xl">
                                <h1 class="font-bold uppercase text-gray-700">{{ $item->title }}</h1>
                                <h1 class="text-sm text-main  italic">{{ $item->employerInformation->company_name }} -
                                    posted on
                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</h1>
                                <p>
                                <p class="mt-2">{{ $item->description }} <a class="text-main"
                                        href="{{ route('user.job-description', ['id' => $item->id]) }}">See more...</a>
                                </p>
                                </p>
                            </div>

                        @empty
                            <div class="grid place-content-center">
                                No Results Found...
                            </div>
                        @endforelse

                    </ul>
                </div>
            </div>
        @endif
    </div>
