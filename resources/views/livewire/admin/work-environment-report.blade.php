<div x-data>
    <div class="flex justify-end">
        <x-button label="PRINT" class="font-bold" icon="printer" dark @click="printOut($refs.printContainer.outerHTML);" />
    </div>
    <table id="example" class="table-auto mt-5" style="width:100%" x-ref="printContainer">
        <thead class="font-normal">
            <tr>

                <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                    WORK ENVIRONMENT
                </th>
                <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                    NO. OF HIRED OJT
                </th>
                <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                    NO. OF HIRED ALUMNI
                </th>

            </tr>
        </thead>
        <tbody class="">
            @forelse ($environments as $item)
                <tr>
                    <td class="border  text-gray-700  px-3 py-1">{{ $item->name }}</td>
                    <td class="border  text-gray-700  px-3 py-1">
                        {{ \App\Models\Application::whereHas('ojtJob', function ($query) use ($item) {
                            $query->where(function ($subQuery) use ($item) {
                                $subQuery->where('filter_for', 'student')->where('work_environment_id', $item->id);
                            });
                        })->where('status', 'hired')->count() }}
                    </td>
                    <td class="border  text-gray-700  px-3 py-1">
                        {{ \App\Models\Application::whereHas('ojtJob', function ($query) use ($item) {
                            $query->where(function ($subQuery) use ($item) {
                                $subQuery->where('filter_for', 'alumni')->where('work_environment_id', $item->id);
                            });
                        })->where('status', 'hired')->count() }}
                    </td>
                </tr>
            @empty
                <td colspan="3" class="border  text-gray-700 text-sm text-center  px-3 py-2">No Hired
                    Student...</td>
            @endforelse

        </tbody>
    </table>
</div>
