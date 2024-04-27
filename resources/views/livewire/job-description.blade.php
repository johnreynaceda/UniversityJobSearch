<div class="mb-40">
    <center>
        <img src="{{ Storage::url($job->employerInformation->logo_path) }}" class="h-24" alt="">
        <h1 class="text-2xl mt-2 font-bold">{{ $job->employerInformation->company_name }}</h1>
        <h1 class="text-main mt-3 ">Date Posted: {{ \Carbon\Carbon::parse($job->created_at)->format('F d, Y') }}</h1>
        <div class="mt-5 border rounded-xl p-4 bg-white shadow-lg">
            <div class="flex items-center space-x-2 text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-9 w-9" fill="currentColor">
                    <path
                        d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z">
                    </path>
                </svg>
                <h1 class="font-bold text-left text-xl">JOB OVERVIEW</h1>
            </div>
            <div class="mt-5 text-justify">
                <p>{{ $job->description }}</p>
            </div>
        </div>
        <div class="mt-5 flex space-x-3 items-center justify-center">
            <x-button label="Return to search" slate flat class="font-semibold" rounded icon="backspace" />
            <x-button label="APPLY NOW" negative class="font-semibold" wire:click="applyNow" spinner="applyNow" rounded
                right-icon="document-text" />
        </div>
    </center>
</div>
