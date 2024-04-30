<div>
    {{ $this->table }}

    <x-modal wire:model.defer="student_modal">
        <x-card title="View Data">
            <div class="mt-10 grid grid-cols-3 gap-5">
                <x-input label="Student Number" placeholder="" rounded class="h-12" wire:model="snumber" />
                <x-input label="Name" placeholder="" rounded class="h-12" wire:model="name" />
                <x-input label="Course" placeholder="" rounded class="h-12" wire:model="course" />
                <x-input label="Grade level & Year" placeholder="" rounded class="h-12" wire:model="grade_year" />
                <x-input label="GSUITE" placeholder="" rounded class="h-12" wire:model="gsuite" />
                <x-input label="Address" placeholder="" rounded class="h-12" wire:model="address" />
                <x-input label="Contact" placeholder="" rounded class="h-12" wire:model="contact" />
                <x-input label="Email" placeholder="" type="email" class="h-12" wire:model="email" />


            </div>
            <div class="mt-3">
                <x-button label="View Uploaded File" dark href="{{ Storage::url($files) }}" target="_blank" />
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
    <x-modal wire:model.defer="alumni_modal">
        <x-card title="View Data">
            <div class="mt-10 grid grid-cols-3 gap-5">
                {{-- <x-input label="Student Number" placeholder="" rounded class="h-12" wire:model="snumber" /> --}}
                <x-input label="Name" placeholder="" rounded class="h-12" wire:model="name" />
                <x-input label="Course" placeholder="" rounded class="h-12" wire:model="course" />
                <x-input label="Year Graduated" placeholder="" rounded class="h-12" wire:model="year_graduated" />
                <x-input label="GSUITE" placeholder="" rounded class="h-12" wire:model="gsuite" />
                <x-input label="Address" placeholder="" rounded class="h-12" wire:model="address" />
                <x-input label="Contact" placeholder="" rounded class="h-12" wire:model="contact" />
                <x-input label="Email" placeholder="" type="email" class="h-12" wire:model="email" />


            </div>
            <div class="mt-3">
                <x-button label="View Uploaded File" dark href="{{ Storage::url($files) }}" target="_blank" />
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
    <x-modal wire:model.defer="employer_modal">
        <x-card title="View Data">
            <div class="mt-10 grid grid-cols-2 gap-5">
                <img src="{{ Storage::url($this->logo) }}" class="w-full h-auto object-cover" alt="">
                <x-input label="Employer Name" placeholder="" rounded class="h-12" wire:model="name" />
                <x-input label="Company Name" placeholder="" rounded class="h-12" wire:model="company_name" />
                <x-input label="Email" placeholder="" type="Email" class="h-12" wire:model="email" />
                <x-input label="Address" placeholder="" class="h-12" wire:model="address" />
                <x-input label="Contact" placeholder="" class="h-12" wire:model="contact" />
                <x-input label="License(Optional)" placeholder="" class="h-12" wire:model="license" />

            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Close" x-on:click="close" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
