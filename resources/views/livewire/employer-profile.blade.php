<div>
    <div class="border shadow-xl border-main rounded-3xl p-10">
        <div class="flex justify-between items-center">
            <div class="flex space-x-3 items-center">
                <img src="{{ Storage::url(auth()->user()->employerInformation->logo_path) }}" alt=""
                    class="h-24">
                <div>
                    <h1 class="font-bold uppercase text-xl text-gray-800">
                        {{ auth()->user()->employerInformation->company_name }}</h1>
                    <h1 class="font-bold  uppercase text-gray-500">BY: {{ auth()->user()->name }}
                    </h1>
                </div>
            </div>
            <div>
                <x-button label="EDIT PROFILE" negative rounded icon="pencil-alt" class="font-bold" outline
                    wire:click="editProfile" />
            </div>
        </div>
    </div>
    <div class="mt-10 flex justify-between items-center">
        <div class="font-bold text-2xl text-main ">JOB LISTS</div>
        {{-- <x-button label="POST A JOB" md right-icon="document-text" rounded negative class="font-semibold" /> --}}
    </div>
    <div class="mt-5">
        {{ $this->table }}
    </div>
    <x-modal wire:model.defer="profile_modal" align="center" max-width="3xl">
        <x-card title="EMPLOYER DATA">
            <div class="mt-5 grid grid-cols-2 gap-5">
                <div class="col-span-2">
                    @if ($logo_file)
                        <img src="{{ $logo_file->temporaryUrl() }}" class="h-40" alt="">
                    @else
                        <img src="{{ Storage::url($logo) }}" class="" alt="">
                    @endif
                </div>
                <div>
                    <x-input label="Logo" type="file" placeholder="" rounded class="h-12"
                        wire:model="logo_file" />
                    <span wire:target="logo_file" wire:loading class="text-red-500 text-sm animate-pulse">wait while
                        uploading....</span>
                </div>
                <x-input label="Employer Name" placeholder="" rounded class="h-12" wire:model="name" />
                <x-input label="Company Name" placeholder="" rounded class="h-12" wire:model="company_name" />
                <x-input label="Email" placeholder="" type="email" class="h-12" wire:model="email" />
                <x-input label="Address" placeholder="" class="h-12" wire:model="address" />
                <x-input label="Contact" placeholder="" class="h-12" wire:model="contact" />
                <x-input label="License(Optional)" placeholder="" class="h-12" wire:model="license" />

            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button negative wire:click="updateRecord" label="Update Record" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
