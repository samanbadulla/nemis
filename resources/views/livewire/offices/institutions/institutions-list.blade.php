<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Institution') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">
            {{ __('Manage institution profile and account') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        <div class="flex items-center space-x-3 mb-2">
            <span class="text-sm text-gray-500 dark:text-gray-400">
                Total: {{ $institutions->total() }} Institution
            </span>
        </div>
        <div>
            <div class="space-y-3">

                @forelse ($institutions as $institution)
                    <div
                        class="bg-white dark:bg-slate-900 rounded-lg shadow p-4 hover:bg-slate-50 dark:hover:bg-slate-800 transition">

                        <!-- ROW WRAPPER -->
                        <div class="grid grid-cols-1 sm:grid-cols-6 gap-4 items-center">

                            <!-- Name + Logo -->
                            <div class="flex items-center space-x-3 col-span-2">
                                <div class="h-10 w-10 flex items-center justify-center text-gray-400">
                                    <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916z" />
                                    </svg>
                                </div>

                                <div>
                                    <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                        {{ $institution->name }}
                                    </div>
                                    <div class="text-xs text-slate-500 dark:text-slate-400">
                                        Census No: {{ str_pad($institution->census_no, 5, '0', STR_PAD_LEFT) }}
                                    </div>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="text-sm text-slate-900 dark:text-slate-100 hidden sm:block">
                                {{ $institution->address }}
                                <div class="text-xs text-slate-500">
                                    Contact: {{ $institution->phone ?? 'N/A' }}
                                </div>
                            </div>

                            <!-- Zone -->
                            <div class="text-sm hidden md:block">
                                ZEO: {{ $institution->zonalEducationOffice->short_name ?? 'N/A' }}<br>
                                DEO: {{ $institution->divisionalEducationOffice->short_name ?? 'N/A' }}
                            </div>

                            <!-- Status -->
                            <div class="hidden md:block">
                                <span
                                    class="px-2 py-1 text-xs font-semibold rounded-full
                        {{ $institution->active_status ? 'bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100' : 'bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100' }}">
                                    {{ $institution->active_status ? 'Active' : 'Inactive' }}
                                </span>
                            </div>

                            <!-- Actions -->
                            <div class="flex justify-end gap-2">
                                <flux:button size="xs" icon="eye">View</flux:button>
                                <flux:button size="xs" icon="pencil-square">Edit</flux:button>
                            </div>

                        </div>

                    </div>
                @empty
                    <div class="text-center py-6 text-slate-500 dark:text-slate-400">
                        No institutions found.
                    </div>
                @endforelse

            </div>

            <div class="mt-4 mx-10">
                {{ $institutions->links() }}
            </div>

        </div>
    </div>
</div>
