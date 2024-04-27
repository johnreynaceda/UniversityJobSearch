<div>
    <div class="border shadow-xl border-main rounded-3xl p-10">
        <div class="flex space-x-3 items-center">
            <img src="{{ Storage::url(auth()->user()->employerInformation->logo_path) }}" alt="" class="h-24">
            <div>
                <h1 class="font-bold uppercase text-xl text-gray-800">
                    {{ auth()->user()->employerInformation->company_name }}</h1>
                <h1 class="font-bold  uppercase text-gray-500">BY: {{ auth()->user()->name }}
                </h1>
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
</div>
