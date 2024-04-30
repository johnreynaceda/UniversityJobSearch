<div class="mb-40">
    <div class="border-2 p-10 rounded-2xl">
        <h1 class="font-bold text-2xl text-main">USER INFORMATION</h1>

        <div class="mt-5">
            <h1 class="uppercase text-lg font-bold">{{ auth()->user()->name }}</h1>
            <span>({{ auth()->user()->user_type }})</span>
        </div>
        <div class="mt-5 border-t pt-5 grid grid-cols-4 gap-5">

            @if (auth()->user()->user_type == 'student')
                <x-input label="Student No." wire:model="number" />
            @endif
            <x-input label="Fullname" wire:model="name" />
            <x-input label="Age" wire:model="age" />
            <x-datetime-picker without-timezone without-time label="Birthdate" wire:model="birthdate" />
            <x-input label="Status" wire:model="status" />
            <div class="col-span-2">
                <x-input label="Address" wire:model="address" />
            </div>
            <x-input label="Contact" wire:model="contact" />
            <x-input label="GSUITE" wire:model="gsuite" />
            @if (auth()->user()->user_type == 'alumni')
                <x-datetime-picker label="Year Of Graduated" without-timezone without-time
                    wire:model.live="year_of_graduated" />
            @endif
            @if ($this->resume != null)
                <div class="flex items-end col-span-2 justify-between">

                    <x-input type="file" label="Resume" wire:model="file" />
                    <a target="_blank"
                        class="bg-green-600 p-1 px-4 font-semibold text-white hover:bg-gray-500 rounded-full"
                        href="{{ Storage::url($this->resume) }}">View
                        Resume</a>
                </div>
            @else
                <x-input type="file" label="Resume" wire:model="file" />
            @endif
        </div>
        <div class="mt-5">
            <x-button label="Submit Record" wire:click="submitRecord" spinner="SubmitRecord" dark class="font-semibold"
                right-icon="save" />
        </div>
    </div>
</div>
