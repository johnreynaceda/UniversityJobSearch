<div>
    <div class="flex  justify-end">
        <div class="w-72">
            <x-input wire:model.live="search" placeholder="Search..." />
        </div>
    </div>
    <table id="example" class="table-auto mt-2" style="width:100%">
        <thead class="font-normal">
            <tr>

                <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                    STUDENT NO.
                </th>
                <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                    STUDENT NAME
                </th>
                <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                    DATE REGISTERED
                </th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($students as $item)
                <tr>
                    <td class="border  text-gray-700  px-3 py-1">{{ $item->userInformation->number }}</td>
                    <td class="border  text-gray-700  px-3 py-1">{{ $item->name }}</td>
                    <td class="border  text-gray-700  px-3 py-1">
                        {{ \Carbon\Carbon::parse($item->userInformation->created_at)->format('F d, Y') }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
