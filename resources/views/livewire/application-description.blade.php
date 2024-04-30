<div class="mb-40">
    <div class="border border-main p-5 rounded-xl shadow-xl">
        <h1 class="font-bold text-xl text-main">APPLICATION DETAILS</h1>
        <div class="mt-5 flex justify-between items-start">
            <div>
                <div class="flex space-x-2 items-center">
                    <h1 class="uppercase text-gray-700 font-bold text-xl">{{ $details->user->name }}</h1>
                    <h1>({{ $details->user->user_type }})</h1>
                </div>
                <x-button class="mt-2 font-medium" right-icon="download"
                    href="{{ Storage::url($details->user->userInformation->resume_path) }}" target="_blank"
                    label="Download Resume" dark />
            </div>
            @if (auth()->user()->user_type == 'employer')
                @if ($details->status == 'pending')
                    <div>
                        <h1 class="uppercase text-main text-right font-bold text-xl">{{ $details->ojtJob->title }}</h1>
                        <div class="mt-2 flex justify-end space-x-2">
                            <x-button label="Reject Applicant" wire:click="reject" spinner="reject" class="font-bold"
                                negative rounded right-icon="x" />
                            <x-button label="Hire Applicant" wire:click="hire" spinner="hire" class="font-bold" positive
                                right-icon="check" />
                        </div>
                    </div>
                @endif
            @endif
        </div>
        @if ($messages->count() > 0)
            <div class="mt-10 border-y py-5">
                <div class="space-y-2">
                    @foreach ($messages as $item)
                        @if (auth()->user()->id == $item->sender_id)
                            <h1 class="text-right">{{ \App\Models\User::where('id', $item->sender_id)->first()->name }}
                            </h1>
                            <div class="flex items-end justify-end">

                                <div class=" bg-red-100 p-2 rounded-lg">
                                    <p class="text-sm text-gray-800 whitespace-pre-line">{{ $item->subject }}</p>
                                </div>
                            </div>
                        @else
                            <h1>{{ \App\Models\User::where('id', $item->sender_id)->first()->name }}</h1>
                            <div class="flex items-start ">

                                <div class=" bg-gray-200 p-2 rounded-lg">
                                    <p class="text-sm text-gray-800 whitespace-pre-line">{{ $item->subject }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{-- <div class="flex items-end justify-end">
                        <div class="mr-3 bg-gray-200 p-2 rounded-lg">
                            <p class="text-sm text-gray-800">I'm good, thanks!</p>
                        </div>
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8 rounded-full" src="https://via.placeholder.com/150" alt="Receiver">
                        </div>
                    </div> --}}
                </div>
            </div>
        @endif
        <div class="mt-10">
            @if (auth()->user()->user_type == 'employer')
                <h1>Message to Applicant:</h1>
            @else
                <h1>Message to Employer:</h1>
            @endif
            <div class="mt-2">
                <x-textarea wire:model="message" wire:model="message" />
                <div class="mt-3 flex justify-between items-start">
                    <div>
                        @if (auth()->user()->user_type == 'employer')
                            <p class="w-1/2 text-sm text-red-500 italic">
                                Note: Include in this message the important details such as the company's email contact,
                                phone
                                number, address, and the requirements that clients need to submit to expedite the
                                application
                                process.
                            </p>
                        @endif
                    </div>
                    <x-button class=" font-medium" label="SEND" wire:click="send" spinner="send"
                        right-icon="arrow-right" positive />
                </div>
            </div>
        </div>
    </div>
