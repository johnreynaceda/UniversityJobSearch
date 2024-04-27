<div>
    {{ $this->table }}

    <x-modal wire:model.defer="student_modal">
        <x-card title="Consent Terms">
            <div>
                sdsdsd
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="I Agree" />
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
