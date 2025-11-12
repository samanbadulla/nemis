<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Main System Tables Overview') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage Main System Tables and settings') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-main-tables.layout>
        <div>
            <div class="relative mb-6 w-full">
                <div class="relative mb-6 w-full">
                    <flux:heading size="xl" level="1">{{ __('Ethnicities') }}</flux:heading>
                    <flux:subheading size="lg" class="mb-6">
                        {{ __('Manage Ethnicities and related information') }}
                    </flux:subheading>
                    <flux:separator variant="subtle" />
                </div>

                <div class="my-4 gap-2 justify-end flex">

                    <flux:modal.trigger name="add-new-ethnicity">
                        <flux:button icon="plus" color="primary"
                            class="px-4 py-2 font-medium shadow-sm transition-all hover:shadow-md">Add new Ethnicities</flux:button>
                    </flux:modal.trigger>

                </div>

                @if (session()->has('message'))
                    <div class="p-3 mb-5 rounded-md bg-green-100 text-green-800 text-sm font-semibold">
                        {{ session('message') }}
                    </div>
                @endif

                <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700 overflow-x-auto">
                    <thead class="bg-slate-50 dark:bg-slate-800">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                                Ethnicity & ID
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
                        @forelse ($ethnicityList as $key => $data)
                            <tr class="hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 text-sm font-medium">
                                            {{ $ethnicityList->firstItem() + $key }}
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                                <flux:link href="" variant="ghost">
                                                    {{ $data->ethnicity_name }}</flux:link>
                                            </div>
                                            <div class="text-sm text-slate-500 dark:text-slate-400">
                                                Ethnicity Id: {{ $data->ethnicity_id }}
                                            </div>
                                        </div>
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
                                    <flux:modal.trigger wire:click="editEthnicity({{ $data->id }})">
                                        <flux:button size="sm" icon="pencil-square">Edit</flux:button>
                                    </flux:modal.trigger>
                                    <flux:button wire:click="toggleStatus({{ $data->id }})"
                                        wire:confirm="Are you sure you want to {{ $data->active_status == '1' ? 'deactivate' : 'activate' }} this Ethnicity?"
                                        size="sm" icon="{{ $data->active_status == '1' ? 'no-symbol' : 'check' }}"
                                        variant="{{ $data->active_status == '1' ? 'danger' : 'primary' }}">
                                    </flux:button>
                                    <flux:button wire:click="deleteEthnicity({{ $data->id }})"
                                        wire:confirm="⚠️ You are about to delete '{{ $data->ethnicity_name }}'.This action cannot be undone. All related records will be permanently removed.Do you really want to proceed?"
                                        size="sm" icon="trash"
                                        variant="danger">
                                    </flux:button>

                                </td>
                            </tr>
                        @empty
                            <tr colspan="4">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-900 dark:text-slate-100">No authorities Found!
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>



                <div class="mt-4 mx-10">
                    {{ $ethnicityList->links() }}
                </div>
            </div>
        </div>

        <flux:modal wire:model="showModelNewEthnicity" name="add-new-ethnicity" class="md:w-96">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Add new Authority</flux:heading>
                    <flux:text class="mt-2">Add new authority to your system.
                    </flux:text>
                </div>
                <form wire:submit.prevent="addNewEthnicity">
                    @csrf
                    <div class="mt-6 max-w-xl space-y-4">

                        <flux:field>
                            <flux:input label="Ethnicity ID" wire:model.live="ethnicityId"
                                placeholder="Enter Ethnicity ID" mask="E99"/>
                        </flux:field>

                        <flux:field>
                            <flux:input label="Ethnicity" wire:model.live="ethnicity" placeholder="Enter Ethnicity" />
                        </flux:field>

                    </div>

                    <div class="flex mt-4">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary">Add Ethnicity</flux:button>
                    </div>
                </form>
            </div>
        </flux:modal>

        <flux:modal wire:model="showModelEditEthnicity" name="edit-ethnicity" class="md:w-96">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Edit Ethnicity</flux:heading>
                    <flux:text class="mt-2">Change Ethnicity information on your system.
                    </flux:text>
                </div>
                <form wire:submit.prevent="updateEthnicitylist">
                    @csrf
                    <div class="mt-6 max-w-xl space-y-4">

                        <flux:field>
                            <flux:input label="Ethnicity ID" wire:model.live="updateEthnicityId"
                                placeholder="Enter Ethnicity ID" mask="E99"/>
                        </flux:field>

                        <flux:field>
                            <flux:input label="Ethnicity" wire:model.live="updateEthnicity" placeholder="Enter Ethnicity" />
                        </flux:field>

                    </div>

                    <div class="flex mt-4">
                        <flux:spacer />
                        <flux:button type="submit" name="edit" variant="primary">Save changes</flux:button>
                    </div>
                </form>
            </div>
        </flux:modal>
    </x-main-tables.layout>
</section>
