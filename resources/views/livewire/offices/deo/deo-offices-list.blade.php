<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Divisional Education Office') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage Divisional Education Office profile and account') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        <div class="my-4 gap-2 justify-end flex">

            @can('create deo office')
                <a href="{{ route('offices.deo.create') }}">
                    <flux:button>Create Divisional Office</flux:button>
                </a>
            @endcan

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
                @forelse ($divisionalEducationOffices as $data)
                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{asset('images/default_logo.png')}}"
                                        alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                        {{ $data->name }}
                                    </div>
                                    <div class="text-sm text-slate-500 dark:text-slate-400">
                                        Work Place Id: {{ $data->workplace_id }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900 dark:text-slate-100">{{ $data->address }}</div>
                            <div class="text-sm text-slate-500 dark:text-slate-400">
                                Contact: {{ $data->phone ?? 'N/A' }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900 dark:text-slate-100">
                                ZEO: {{ $data->zonalEducationOffice->short_name }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                        {{ $data->active_status ? 'bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100' : 'bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100' }}">
                                {{ $data->active_status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium justify-end flex gap-1">
                            @can('view deo profile overview')
                                <a href="{{ route('offices.deo.profile.overview', $data->id) }}">
                                    <flux:button size="sm" icon="eye">View</flux:button>
                                </a>
                            @endcan

                            @can('deo office edit')
                                <a href="">
                                    <flux:button size="sm" icon="pencil-square">Edit</flux:button>
                                </a>
                            @endcan

                            @can('deo office delete')
                                <flux:button size="sm" icon="trash" variant="danger">Delete</flux:button>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr colspan="5">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900 dark:text-slate-100">No Divisional Education Office Found!</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>



        <div class="mt-4 mx-10">
            {{ $divisionalEducationOffices->links() }}
        </div>
    </div>
</div>
