<div class="flex space-x-4 items-center">
    <div class="relative" x-data="{ open: false }">
        <button class="flex space-x-2 items-center" x-on:click="open = !open" x-on:click.away="open = false">
            <span>Notifications </span>
            <x-badge label="{{ $counts }}" negative />


        </button>

        <div x-show="open" x-cloak
            class="absolute -left-8 top-full z-10 mt-3 w-screen max-w-sm overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5">
            <div class="p-2">
                @forelse ($notifs as $item)
                    <div wire:click="openNotif({{ $item->id }})"
                        class="group relative flex items-center cursor-pointer gap-x-2 rounded-lg text-sm leading-6 hover:bg-gray-50">
                        <div
                            class="flex h-8 w-8 flex-none items-center justify-center text-main rounded-lg bg-gray-100 group-hover:bg-white">
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.60124 1.25086C8.60124 1.75459 8.26278 2.17927 7.80087 2.30989C10.1459 2.4647 12 4.41582 12 6.79999V10.25C12 11.0563 12.0329 11.7074 12.7236 12.0528C12.931 12.1565 13.0399 12.3892 12.9866 12.6149C12.9333 12.8406 12.7319 13 12.5 13H8.16144C8.36904 13.1832 8.49997 13.4513 8.49997 13.75C8.49997 14.3023 8.05226 14.75 7.49997 14.75C6.94769 14.75 6.49997 14.3023 6.49997 13.75C6.49997 13.4513 6.63091 13.1832 6.83851 13H2.49999C2.2681 13 2.06664 12.8406 2.01336 12.6149C1.96009 12.3892 2.06897 12.1565 2.27638 12.0528C2.96708 11.7074 2.99999 11.0563 2.99999 10.25V6.79999C2.99999 4.41537 4.85481 2.46396 7.20042 2.3098C6.73867 2.17908 6.40036 1.75448 6.40036 1.25086C6.40036 0.643104 6.89304 0.150421 7.5008 0.150421C8.10855 0.150421 8.60124 0.643104 8.60124 1.25086ZM7.49999 3.29999C5.56699 3.29999 3.99999 4.86699 3.99999 6.79999V10.25L4.00002 10.3009C4.0005 10.7463 4.00121 11.4084 3.69929 12H11.3007C10.9988 11.4084 10.9995 10.7463 11 10.3009L11 10.25V6.79999C11 4.86699 9.43299 3.29999 7.49999 3.29999Z"
                                    fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="flex-auto">

                            <p class="mt-1 text-gray-600 group-hover:text-main">{{ $item->description }}</p>
                        </div>
                    </div>
                @empty
                    <div class="py-1 text-center">
                        <span>No Notification...</span>
                    </div>
                @endforelse

            </div>

        </div>
    </div>
    <div x-data="{
        dropdownOpen: false
    }" class="relative">

        <button @click="dropdownOpen=true"
            class="inline-flex items-center justify-center h-12 py-2 pl-3 pr-12 text-sm font-medium transition-colors bg-white border rounded-md text-neutral-700 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none">

            <span
                class="flex flex-col font-bold uppercase items-start flex-shrink-0 h-full ml-2 leading-none translate-y-px">
                <span>{{ auth()->user()->name }}</span>
                <span class="text-xs font-light text-neutral-400">{{ auth()->user()->user_type }}</span>
            </span>
            <svg class="absolute right-0 w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
            </svg>
        </button>

        <div x-show="dropdownOpen" @click.away="dropdownOpen=false" x-transition:enter="ease-out duration-200"
            x-transition:enter-start="-translate-y-2" x-transition:enter-end="translate-y-0"
            class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2" x-cloak>
            <div class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                <div class="px-2 py-1.5 text-sm font-semibold">My Account</div>
                <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                <a href="{{ route('profile.edit') }}"
                    class="cursor-pointer relative flex  select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-4 h-4 mr-2">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span>Settings</span>
                </a>
                <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')"
                        onclick="event.preventDefault();
                                this.closest('form').submit();"
                        class="cursor-pointer relative flex  select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-4 h-4 mr-2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" x2="9" y1="12" y2="12"></line>
                        </svg>
                        <span>Log out</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
