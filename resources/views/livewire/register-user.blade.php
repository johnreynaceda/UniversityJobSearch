<div>
    <section>
        <div class="px-8 py-2 mx-auto md:px-12 lg:px-32 max-w-7xl">
            <div>
                <h1 class="text-4xl font-semibold tracking-tighter text-gray-900 lg:text-5xl">
                    Create your Account
                    {{-- <span class="block text-gray-600">Diverse. Skilled. United.</span> --}}
                </h1>
                <p class="mt-4 text-base font-medium text-gray-500">
                    Please enter the required information.
                </p>
                <ul role="list" class="mt-12 sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 sm:gap-5">
                    <li
                        class="hover:border-2 hover:scale-95 p-4 border-main shadow-main shadow rounded-2xl cursor-pointer">
                        <div class="flex flex-col gap-4">
                            <svg class="w-20 h-20 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="10" cy="7" r="4"></circle>
                                <path d="M10.3 15H7a4 4 0 0 0-4 4v2"></path>
                                <circle cx="17" cy="17" r="3"></circle>
                                <path d="m21 21-1.9-1.9"></path>
                            </svg>
                            <div class="space-y-5">
                                <h3 class="text-4xl font-medium leading-6 text-gray-700">
                                    I'm a student
                                </h3>

                                <div class="mt-4">
                                    <button wire:click="student"
                                        class="bg-main hover:bg-red-500 text-white p-2 px-4 rounded-full font-semibold">
                                        <span>Create an Account</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li
                        class="hover:border-2 hover:scale-95 p-4 border-main shadow-main shadow rounded-2xl cursor-pointer">
                        <div class="flex flex-col gap-4">
                            <svg class="w-20 h-20 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="10" cy="7" r="4"></circle>
                                <path d="M10.3 15H7a4 4 0 0 0-4 4v2"></path>
                                <circle cx="17" cy="17" r="3"></circle>
                                <path d="m21 21-1.9-1.9"></path>
                            </svg>
                            <div class="space-y-5">
                                <h3 class="text-4xl font-medium leading-6 text-gray-700">
                                    I'm an Alumni
                                </h3>

                                <div class="mt-4">
                                    <button wire:click="alumni"
                                        class="bg-main hover:bg-red-500 text-white p-2 px-4 rounded-full font-semibold">
                                        <span>Create an Account</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li
                        class="hover:border-2 hover:scale-95 p-4 border-main shadow-main shadow rounded-2xl cursor-pointer">
                        <div class="flex flex-col gap-4">
                            <svg class="w-20 h-20 text-gray-700" width="48" height="48" viewBox="0 0 48 48"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M34 16C34 21.5228 29.5228 26 24 26C18.4772 26 14 21.5228 14 16C14 10.4772 18.4772 6 24 6C29.5228 6 34 10.4772 34 16ZM32 16C32 20.4183 28.4183 24 24 24C19.5817 24 16 20.4183 16 16C16 11.5817 19.5817 8 24 8C28.4183 8 32 11.5817 32 16Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M30.5 28C30.2884 27.9484 30.0619 28.0523 29.9591 28.2615L26 39.5716V36L25.4255 31.9786C25.7941 31.901 26.0952 31.6194 26.1894 31.2425L26.6894 29.2425C26.8472 28.6114 26.3698 28 25.7192 28H22.2808C21.6302 28 21.1528 28.6114 21.3106 29.2425L21.8106 31.2425C21.9048 31.6194 22.2059 31.901 22.5745 31.9786L22 36V38.6963L18.0409 28.2615C17.9381 28.0523 17.7116 27.9484 17.5 28C17.1413 28.0875 16.7551 28.1779 16.3521 28.2722C14.09 28.8015 11.2944 29.4557 9.808 30.4317C8.04534 31.5891 7 32.9535 7 34.5V41H41V34.5C41 32.9535 39.9547 31.5891 38.192 30.4317C36.7056 29.4557 33.9099 28.8015 31.6478 28.2721C31.2448 28.1778 30.8587 28.0875 30.5 28Z"
                                    fill="currentColor"></path>
                            </svg>
                            <div class="space-y-5">
                                <h3 class="text-4xl font-medium  leading-6 text-gray-700">
                                    I'm an Employer
                                </h3>

                                <div class="mt-4">
                                    <button wire:click="employer"
                                        class="bg-main hover:bg-red-500 text-white p-2 px-4 rounded-full font-semibold">
                                        <span>Create an Account</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>


                    <!-- More humans... -->
                </ul>
            </div>
        </div>
    </section>
    <x-modal wire:model.defer="student_modal" align="center" max-width="4xl">
        <x-card title="">
            <div class="px-4">
                <h1 class="font-bold text-xl">Create a free Jobseeker Account</h1>
                <span>(Student)</span>
                <div class="mt-10 grid grid-cols-3 gap-5">
                    <x-input label="Student Number" placeholder="" rounded class="h-12" wire:model="snumber" />
                    <x-input label="Name" placeholder="" rounded class="h-12" wire:model="name" />
                    <x-input label="Course" placeholder="" rounded class="h-12" wire:model="course" />
                    <x-input label="Grade level & Year" placeholder="" rounded class="h-12" wire:model="grade_year" />
                    <x-input label="GSUITE" placeholder="" rounded class="h-12" wire:model="gsuite" />
                    <x-input label="Address" placeholder="" rounded class="h-12" wire:model="address" />
                    <x-input label="Contact" placeholder="" rounded class="h-12" wire:model="contact" />
                    <x-input label="Email" placeholder="" type="Email" class="h-12" wire:model="email" />
                    <x-inputs.password label="Password" placeholder="" class="h-12" wire:model="password" />
                    <x-inputs.password label="Confirm Password" placeholder="" class="h-12"
                        wire:model="confirm_password" />
                    <x-input type="file" label="File Upload" placeholder=""
                        hint="Please upload a student ID or any proof that you are a student at BSU." rounded
                        class="h-12" wire:model="files" />
                </div>
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button negative label="Create Account" wire:click="createStudent" spinner="createStudent"
                        right-icon="arrow-right" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    <x-modal wire:model.defer="alumni_modal" align="center" max-width="xl">
        <x-card title="">
            <div class="px-4">
                <h1 class="font-bold text-xl">Create a free Jobseeker Account</h1>
                <span>(Alumni)</span>
                <div class="mt-10 grid grid-cols-1 gap-5">
                    <x-input label="Name" placeholder="" rounded class="h-12" wire:model="name" />
                    <x-input label="Email" placeholder="" type="Email" class="h-12" wire:model="email" />
                    <x-inputs.password label="Password" placeholder="" class="h-12" wire:model="password" />
                    <x-inputs.password label="Confirm Password" placeholder="" class="h-12"
                        wire:model="confirm_password" />
                </div>
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button negative label="Create Account" wire:click="createAlumni" spinner="createAlumni"
                        right-icon="arrow-right" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    <x-modal wire:model.defer="employer_modal" align="center" max-width="2xl">
        <x-card title="">
            <div class="px-4">
                <h1 class="font-bold text-xl">Create a Employer Account</h1>
                <span>(Employer)</span>
                <div class="mt-10 grid grid-cols-2 gap-5">
                    <x-input label="Logo" type="file" placeholder="" rounded class="h-12"
                        wire:model="logo" />
                    <x-input label="Employer Name" placeholder="" rounded class="h-12" wire:model="name" />
                    <x-input label="Company Name" placeholder="" rounded class="h-12" wire:model="company_name" />
                    <x-input label="Email" placeholder="" type="Email" class="h-12" wire:model="email" />
                    <x-input label="Address" placeholder="" class="h-12" wire:model="address" />
                    <x-input label="Contact" placeholder="" class="h-12" wire:model="contact" />
                    <x-input label="License(Optional)" placeholder="" class="h-12" wire:model="license" />
                    <x-inputs.password label="Password" placeholder="" class="h-12" wire:model="password" />
                    <x-inputs.password label="Confirm Password" placeholder="" class="h-12"
                        wire:model="confirm_password" />
                </div>
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button negative label="Create Account" wire:click="createEmployer" spinner="createEmployer"
                        right-icon="arrow-right" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
