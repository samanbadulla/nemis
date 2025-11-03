<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Sri lanka Education Administrator service') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage SLEAS profile and account') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        <div class="my-6 flex items-center justify-end gap-3">

            {{-- Search Button (Modal Trigger) --}}
            <flux:modal.trigger name="search-profile">
                <flux:input as="button" placeholder="Search SLEAS..." icon="magnifying-glass" kbd="⌘K"
                    class="w-48 md:w-60 cursor-pointer transition-all hover:shadow-sm focus:ring-2 focus:ring-blue-500" />
            </flux:modal.trigger>

            {{-- Create Teacher Button (Permission Based) --}}

                <a href="{{ route('sleas.create') }}">
                    <flux:button icon="plus" color="primary"
                        class="px-4 py-2 font-medium shadow-sm transition-all hover:shadow-md">
                        Create SLEAS Officer
                    </flux:button>
                </a>


            {{-- Search Modal --}}
            <flux:modal name="search-profile" class="md:w-[28rem] rounded-xl shadow-lg">
                <div class="space-y-6 p-4">
                    {{-- Header --}}
                    <div class="text-center">
                        <flux:heading size="lg" class="text-gray-800 dark:text-gray-100">
                            Search SLEAS Profile
                        </flux:heading>
                        <flux:text class="mt-2 text-gray-500 dark:text-gray-400 text-sm">
                            Search for a SLEAS by
                            <span class="font-semibold text-gray-700 dark:text-gray-300">NIC</span>.
                        </flux:text>
                    </div>

                    {{-- Search Input --}}
                    <div>
                        <flux:input icon="magnifying-glass" wire:model.live="query" placeholder="Type NIC..."
                            class="w-full focus:ring-2 focus:ring-blue-500" />
                    </div>

                    {{-- Results --}}
                    @if (!empty($results) && count($results) > 0)
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700 mt-2">
                            @foreach ($results as $employer)
                                <li
                                    class="py-2 px-3 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md cursor-pointer transition">
                                    <a href="{{route('sleas.profile.index', $employer->id)}}">
                                        <div class="flex justify-between items-center">
                                            <span class="font-semibold text-gray-800 dark:text-gray-100">
                                                {{ $employer['name_with_initials'] }}
                                            </span>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                                {{ $employer['nic'] }}
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @elseif(strlen($query) >= 10)
                        <p class="text-sm text-gray-500 dark:text-gray-400 text-center py-2">
                            No teachers found.
                        </p>
                    @endif


                </div>
            </flux:modal>


        </div>


        <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Designation
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Working place
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Phone
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @forelse($employees as $employee)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if($employee->gender_id == "G02")
                                        <img class="h-10 w-10 rounded-full" src="{{ asset('images/profile_f.png') }}" alt="">
                                    @else
                                        <img class="h-10 w-10 rounded-full" src="{{ asset('images/profile_m.png') }}" alt="">
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        <flux:link href="{{ route('sleas.profile.index', $employee->id) }}" variant="ghost">
                                            {{ $employee->title->title_name ?? '' }} {{ $employee->name_with_initials }}
                                        </flux:link>
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        NIC: {{ $employee->nic }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ $employee->currentAppointment?->position?->position_name ?? 'N/A' }}</div>
                            <div class="text-sm text-gray-500">
                                {{ $employee->currentAppointment?->service?->service_name ?? 'N/A' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                @php
                                    $office = $employee->currentAppointment?->workplace?->office();
                                @endphp

                                @if ($office)
                                    {{ $office->name ?? ($office->short_name ?? 'N/A') }}
                                @else
                                    N/A
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $employee->phone }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $employee->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium justify-end flex gap-1">
                            <a href="{{ route('sleas.profile.index', $employee->id) }}">
                                <flux:button size="sm" icon="eye">View</flux:button>
                            </a>
                            <flux:button size="sm" icon="trash" variant="danger">Delete</flux:button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-4"> <span class="text-gray-500 my-6">No employees
                                found</span></td>
                    </tr>
                @endforelse
                <!-- More rows... -->

            </tbody>
        </table>

    </div>
</div>
