<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Institution') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">
            {{ __('Manage institution profile and account') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        <div class="my-6 flex items-center justify-end gap-3">
            {{-- Create Institution Button (Permission Based) --}}
            @can('create teachers')
                <a href="{{ route('institutions.create') }}">
                    <flux:button icon="plus" color="primary"
                        class="px-4 py-2 font-medium shadow-sm transition-all hover:shadow-md">
                        Create institution
                    </flux:button>
                </a>
            @endcan
        </div>

        <div class="flex flex-wrap items-center gap-4 my-4">
            {{-- Province --}}
            <flux:select wire:model.live="province" class="w-48 md:w-64">
                <flux:select.option value="">All provinces</flux:select.option>
                @foreach ($provinceOption as $prov)
                    <flux:select.option value="{{ $prov->workplace_id }}">
                        {{ $prov->short_name }}
                    </flux:select.option>
                @endforeach
            </flux:select>

            {{-- Zonal --}}
            <flux:select wire:model.live="zone" class="w-48 md:w-64" :disabled="!$zoneOption">
                <flux:select.option value="">All zonal offices</flux:select.option>
                @foreach ($zoneOption as $zone)
                    <flux:select.option value="{{ $zone->workplace_id }}">
                        {{ $zone->short_name }}
                    </flux:select.option>
                @endforeach
            </flux:select>

            {{-- Divisional --}}
            <flux:select wire:model.live="division" class="w-48 md:w-64" :disabled="!$divisionOption">
                <flux:select.option value="">All divisional offices</flux:select.option>
                @foreach ($divisionOption as $division)
                    <flux:select.option value="{{ $division->workplace_id }}">
                        {{ $division->short_name }}
                    </flux:select.option>
                @endforeach
            </flux:select>

            {{-- Search Box --}}
            <flux:input wire:model.live="query" class="w-48 md:w-64" placeholder="Search..." />
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                <thead class="bg-slate-50 dark:bg-slate-800">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                            Zone
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-900 divide-y divide-slate-200 dark:divide-slate-700">
                    @forelse ($institutions as $institution)
                        <tr class="hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full"
                                            src="{{ asset('images/default_logo.png') }}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                            <flux:link href="{{ route('institutions.profile', $institution->id) }}"
                                                variant="ghost">{{ $institution->name }}</flux:link>
                                        </div>
                                        <div class="text-sm text-slate-500 dark:text-slate-400">
                                            Census No.: {{ $institution->census_no }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-900 dark:text-slate-100">
                                    {{ $institution->address }}
                                </div>
                                <div class="text-sm text-slate-500 dark:text-slate-400">
                                    Contact: {{ $institution->phone ?? 'N/A' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-900 dark:text-slate-100">
                                    ZEO: {{ $institution->zonalEducationOffice->short_name ?? 'N/A' }}
                                </div>
                                <div class="text-sm text-slate-500 dark:text-slate-400">
                                    DEO: {{ $institution->divisionalEducationOffice->short_name ?? 'N/A' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $institution->active_status ? 'bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100' : 'bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100' }}">
                                    {{ $institution->active_status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium justify-end flex gap-1">
                                <a href="{{ route('institutions.profile', $institution->id) }}">
                                    <flux:button size="sm" icon="eye">View</flux:button>
                                </a>
                                <a href="#">
                                    <flux:button size="sm" icon="pencil-square">Edit</flux:button>
                                </a>
                                <flux:button size="sm" icon="trash" variant="danger">Delete</flux:button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-slate-500">
                                No institutions found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 mx-10">
            {{ $institutions->links() }}
        </div>
    </div>
</div>
