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
                    <flux:heading size="xl" level="1">{{ __('Divisional Secretariat Offices') }}</flux:heading>
                    <flux:subheading size="lg" class="mb-6">
                        {{ __('Manage Divisional Secretariat Offices and related information') }}
                    </flux:subheading>
                    <flux:separator variant="subtle" />
                </div>

                <div class="my-4 gap-2 justify-end flex">

                    <flux:modal.trigger name="add-new-ds-office">
                        <flux:button icon="plus" color="primary"
                            class="px-4 py-2 font-medium shadow-sm transition-all hover:shadow-md">Add new DS Office</flux:button>
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
                                DS Office Name & ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                                District & ID
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
                        @forelse ($dsOfficeList as $key => $data)
                            <tr class="hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="shrink-0 h-10 w-10 text-sm font-medium">
                                            {{ $dsOfficeList->firstItem() + $key }}
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                                    {{ $data->dso_name }}
                                            </div>
                                            <div class="text-sm text-slate-500 dark:text-slate-400">
                                                DS Office Id: {{ $data->dso_id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                                    {{ $data->district->district_name }}
                                            </div>
                                            <div class="text-sm text-slate-500 dark:text-slate-400">
                                                District Id: {{ $data->district_id }}
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
                                    <flux:modal.trigger wire:click="editDSOffice({{ $data->id }})">
                                        <flux:button size="sm" icon="pencil-square">Edit</flux:button>
                                    </flux:modal.trigger>
                                    <flux:button wire:click="toggleStatus({{ $data->id }})"
                                        wire:confirm="Are you sure you want to {{ $data->active_status == '1' ? 'deactivate' : 'activate' }} this DS Office?"
                                        size="sm" icon="{{ $data->active_status == '1' ? 'no-symbol' : 'check' }}"
                                        variant="{{ $data->active_status == '1' ? 'danger' : 'primary' }}">
                                    </flux:button>
                                    <flux:button wire:click="deleteDSOffice({{ $data->id }})"
                                        wire:confirm="⚠️ You are about to delete '{{ $data->dso_name }}'.This action cannot be undone. All related records will be permanently removed.Do you really want to proceed?"
                                        size="sm" icon="trash"
                                        variant="danger">
                                    </flux:button>

                                </td>
                            </tr>
                        @empty
                            <tr colspan="4">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-900 dark:text-slate-100">No DS Office Found!
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>



                <div class="mt-4 mx-10">
                    {{ $dsOfficeList->links() }}
                </div>
            </div>
        </div>

        <flux:modal wire:model="showModelNewDSOffice" name="add-new-ds-office" class="md:w-96">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Add new DS Office</flux:heading>
                    <flux:text class="mt-2">Add new DS Office to your system.
                    </flux:text>
                </div>
                @if (session()->has('error'))
                    <div class="p-3 mb-5 rounded-md bg-red-100 text-red-800 text-sm font-semibold">
                        {{ session('error') }}
                    </div>
                @endif
                <form wire:submit.prevent="addNewDSOffice">
                    @csrf
                    <div class="mt-6 max-w-xl space-y-4">

                        <flux:field>
                            <flux:input label="DS Office ID" wire:model.live="dsOfficeId"
                                placeholder="Enter DS Office ID" mask="DSO9999"/>
                        </flux:field>

                        <flux:field>
                            <flux:select label="District" id="district" wire:model.live="districtId">
                                <option value="">{{ __ ('Select district') }}</option>
                                @foreach ($districtOption as $district)
                                    <option value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                                @endforeach
                            </flux:select>
                        </flux:field>

                        <flux:field>
                            <flux:input label="DS Office Name" wire:model.live="dsOfficeName"
                                placeholder="Enter DS Office Name" />
                        </flux:field>

                    </div>

                    <div class="flex mt-4">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary">Add New DS Office</flux:button>
                    </div>
                </form>
            </div>
        </flux:modal>

        <flux:modal wire:model="showModelEditDSOffice" name="edit-d-s-Office" class="md:w-96">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Edit DS Office</flux:heading>
                    <flux:text class="mt-2">Change DS Office information on your system.
                    </flux:text>
                </div>
                @if (session()->has('error'))
                    <div class="p-3 mb-5 rounded-md bg-red-100 text-red-800 text-sm font-semibold">
                        {{ session('error') }}
                    </div>
                @endif
                <form wire:submit.prevent="updateDSOffice">
                    @csrf
                    <div class="mt-6 max-w-xl space-y-4">

                        <flux:field>
                            <flux:input label="DS Office ID" wire:model.live="updateDSOfficeId"
                                placeholder="Enter DS Office ID" mask="DSO9999"/>
                        </flux:field>

                        <flux:field>
                            <flux:select label="District" id="district" wire:model.live="UpdateDistrictId">
                                <option value="">{{ __ ('Select district') }}</option>
                                @foreach ($districtOption as $district)
                                    <option value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                                @endforeach
                            </flux:select>
                        </flux:field>

                        <flux:field>
                            <flux:input label="DS Office Name" wire:model.live="updateDSOfficeName"
                                placeholder="Enter DS Office Name" />
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
