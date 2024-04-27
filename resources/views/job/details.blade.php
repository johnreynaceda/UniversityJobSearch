<li class="flex justify-between items-end gap-x-6 ">
    <div class="flex min-w-0 gap-x-4">
        <div class="min-w-0 flex-auto">
            <p class="uppercase font-semibold leading-6 text-gray-900">{{ $getRecord()->title }}</p>
            <p class="mt-1 w-96 truncate text-xs leading-4 text-gray-500">{{ $getRecord()->description }}</p>
        </div>
    </div>
    <div class="hidden shrink-0 sm:flex lg:flex-col sm:items-end">
        <div class="flex min-w-0 gap-x-4">
            <div class="min-w-0 flex-auto">

                <p class="mt-1 truncate text-sm text-gray-800">Assigned To:</p>
                <x-badge label="{{ $getRecord()->filter_for }}" positive />
            </div>
        </div>
    </div>

</li>
