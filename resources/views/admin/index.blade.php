@section('title', 'Dashboard')
<x-master-component>
    <div x-data>
        <div class="mt-5" x-ref="printContainer">
            <div class="container items-center px-4 py-8 m-auto mt-5">
                <div class="flex flex-wrap pb-3 mx-4 md:mx-24 lg:mx-0">
                    <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                        <div
                            class="flex flex-col cursor-pointer px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-main hover:via-red-500 hover:to-red-300 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                            <div class="flex flex-row justify-between items-center">
                                <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">

                                </div>
                            </div>
                            <h1
                                class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                                {{ \App\Models\User::where('status', 'accepted')->count() }}</h1>
                            <div class="flex flex-row justify-between group-hover:text-gray-200">
                                <p>Registered User</p>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-red-600 group-hover:text-gray-200" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                        <div
                            class="flex flex-col cursor-pointer px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-main hover:via-red-500 hover:to-red-300 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                            <div class="flex flex-row justify-between items-center">
                                <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">

                                </div>
                            </div>
                            <h1
                                class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                                {{ \App\Models\User::where('user_type', 'student')->where('status', 'accepted')->count() }}
                            </h1>
                            <div class="flex flex-row justify-between group-hover:text-gray-200">
                                <p> Total Students</p>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-red-600 group-hover:text-gray-200" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                        <div
                            class="flex flex-col cursor-pointer px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-main hover:via-red-500 hover:to-red-300 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                            <div class="flex flex-row justify-between items-center">
                                <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">

                                </div>
                            </div>
                            <h1
                                class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                                {{ \App\Models\User::where('user_type', 'alumni')->where('status', 'accepted')->count() }}
                            </h1>
                            <div class="flex flex-row justify-between group-hover:text-gray-200">
                                <p> Total Alumni</p>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-red-600 group-hover:text-gray-200" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full p-2 lg:w-1/4 md:w-1/2">
                        <div
                            class="flex flex-col cursor-pointer px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-main hover:via-red-500 hover:to-red-300 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                            <div class="flex flex-row justify-between items-center">
                                <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">

                                </div>
                            </div>
                            <h1
                                class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">
                                {{ \App\Models\User::where('user_type', 'employer')->where('status', 'accepted')->count() }}
                            </h1>
                            <div class="flex flex-row justify-between group-hover:text-gray-200">
                                <p> Total Employer</p>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-red-600 group-hover:text-gray-200" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <livewire:admin.work-environment-report />
        </div>
        <script>
            function printOut(data) {
                var mywindow = window.open('', '', 'height=1000,width=1000');
                mywindow.document.head.innerHTML =
                    '<title></title><link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}" />';
                mywindow.document.body.innerHTML = '<div>' + data +
                    '</div><script src="{{ Vite::asset('resources/js/app.js') }}"/>';

                mywindow.document.close();
                mywindow.focus(); // necessary for IE >= 10
                setTimeout(() => {
                    mywindow.print();
                    return true;
                }, 1000);
            }
        </script>
    </div>

</x-master-component>
