<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Institution') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage institution profile and account') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        <div class="my-6 flex items-center justify-end gap-3">

            {{-- Search Button (Modal Trigger) --}}
            <flux:modal.trigger name="search-profile">
                <flux:input as="button" placeholder="Search Teacher..." icon="magnifying-glass" kbd="⌘K"
                    class="w-48 md:w-60 cursor-pointer transition-all hover:shadow-sm focus:ring-2 focus:ring-blue-500" />
            </flux:modal.trigger>

            {{-- Create Teacher Button (Permission Based) --}}
            @can('create teachers')
                <a href="{{ route('institutions.create') }}">
                    <flux:button icon="plus" color="primary"
                        class="px-4 py-2 font-medium shadow-sm transition-all hover:shadow-md">
                        Create institution
                    </flux:button>
                </a>
            @endcan

            {{-- Search Modal --}}
            <flux:modal name="search-profile" class="md:w-[28rem] rounded-xl shadow-lg">
                <div class="space-y-6 p-4">
                    {{-- Header --}}
                    <div class="text-center">
                        <flux:heading size="lg" class="text-gray-800 dark:text-gray-100">
                            Search Institution Profile
                        </flux:heading>
                        <flux:text class="mt-2 text-gray-500 dark:text-gray-400 text-sm">
                            Search for a Institution by
                            <span class="font-semibold text-gray-700 dark:text-gray-300">Name or Census No</span>.
                        </flux:text>
                    </div>

                    {{-- Search Input --}}
                    <div>
                        <flux:input icon="magnifying-glass" wire:model.live="query" placeholder="Type Name or Census No..."
                            class="w-full focus:ring-2 focus:ring-blue-500" />
                    </div>

                    {{-- Results --}}
                    @if (!empty($results) && count($results) > 0)
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700 mt-2">
                            @foreach ($results as $data)
                                <li
                                    class="py-2 px-3 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md cursor-pointer transition">
                                    <a href="{{route('institutions.profile', $data->id)}}">
                                        <div class="flex justify-between items-center">
                                            <span class="font-semibold text-gray-800 dark:text-gray-100">
                                                {{ $data['name'] }}
                                            </span>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                                {{ $data['census_no'] }}
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @elseif(strlen($query) >= 1)
                        <p class="text-sm text-gray-500 dark:text-gray-400 text-center py-2">
                            No teachers found.
                        </p>
                    @endif


                </div>
            </flux:modal>
        </div>

        <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700 overflow-x-auto">
            <thead class="bg-slate-50 dark:bg-slate-800">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                        Address
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                        Zone
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-right text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-900 divide-y divide-slate-200 dark:divide-slate-700">
                @foreach ($institutions as $institution)
                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{asset('images/default_logo.png')}}"
                                        alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                        <flux:link href="{{ route('institutions.profile', $institution->id) }}" variant="ghost">{{ $institution->name }}</flux:link>
                                    </div>
                                    <div class="text-sm text-slate-500 dark:text-slate-400">
                                        Census No.: {{ $institution->census_no }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900 dark:text-slate-100">{{ $institution->address }}</div>
                            <div class="text-sm text-slate-500 dark:text-slate-400">
                                Contact: {{ $institution->phone ?? 'N/A' }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900 dark:text-slate-100">
                                ZEO: {{ $institution->zonalEducationOffice->short_name }}
                            </div>
                            <div class="text-sm text-slate-500 dark:text-slate-400">
                                DEO: {{ $institution->divisionalEducationOffice->short_name }}
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
                            <a href="">
                                <flux:button size="sm" icon="pencil-square">Edit</flux:button>
                            </a>
                            <flux:button size="sm" icon="trash" variant="danger">Delete</flux:button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



        <div class="mt-4 mx-10">
            {{ $institutions->links() }}
        </div>
    </div>
</div>
