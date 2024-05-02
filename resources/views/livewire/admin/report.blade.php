<div x-data>
    <div class="mb-10 h-96">
        <canvas class="" id="myChart"></canvas>
        @php
            $ojt = \App\Models\User::where('user_type', 'student')->where('is_hired', true)->count();
            $alumni = \App\Models\User::where('user_type', 'alumni')->where('is_hired', true)->count();
        @endphp
        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Hired OJT', 'HIRED ALUMNI', ],
                    datasets: [{
                        label: '# of HIRED',
                        data: [{{ $ojt }}, {{ $alumni }}],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
    <div>
        <div class="flex justify-between items-end">
            <h1 class="font-bold uppercase text-xl text-main">Hired OJT</h1>
            <x-button label="Print" @click="printOut($refs.printContainer.outerHTML);" class="font-semibold uppercase"
                icon="printer" dark />
        </div>
        <div class="mt-4" x-ref="printContainer">
            <table id="example" class="table-auto" style="width:100%">
                <thead class="font-normal">
                    <tr>

                        <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                            STUDENT NO.
                        </th>
                        <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                            STUDENT NAME
                        </th>
                        <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                            WORK ENVIRONMENT
                        </th>
                    </tr>
                </thead>
                <tbody class="">
                    @forelse ($students as $item)
                        <tr>
                            <td class="border  text-gray-700  px-3 py-1">{{ $item->userInformation->number }}</td>
                            <td class="border  text-gray-700  px-3 py-1">{{ $item->name }}</td>
                            <td class="border  text-gray-700  px-3 py-1">
                                {{ $item->applications->where('status', 'hired')->first()->ojtJob->workEnvironment->name }}
                            </td>
                        </tr>
                    @empty
                        <td colspan="3" class="border  text-gray-700 text-sm text-center  px-3 py-2">No Hired
                            Student...</td>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-10">
        <div class="flex justify-between items-end">
            <h1 class="font-bold uppercase text-xl text-main">Hired ALUMNI</h1>
            <x-button label="Print" class="font-semibold uppercase" icon="printer" dark
                @click="printOut($refs.printContainer.outerHTML);" />
        </div>
        <div class="mt-4" x-ref="printContainer">
            <table id="example" class="table-auto" style="width:100%">
                <thead class="font-normal">
                    <tr>

                        <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                            STUDENT NO.
                        </th>
                        <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                            STUDENT NAME
                        </th>
                        <th class="border  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                            WORK ENVIRONMENT
                        </th>
                    </tr>
                </thead>
                <tbody class="">
                    @forelse ($alumnis as $item)
                        <tr>
                            <td class="border  text-gray-700  px-3 py-1">{{ $item->userInformation->number }}</td>
                            <td class="border  text-gray-700  px-3 py-1">{{ $item->name }}</td>
                            <td class="border  text-gray-700  px-3 py-1">
                                {{ $item->applications->where('status', 'hired')->first()->ojtJob->workEnvironment->name }}
                            </td>
                        </tr>
                    @empty
                        <td colspan="3" class="border  text-gray-700 text-sm text-center  px-3 py-2">No Hired
                            Alumni...</td>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
