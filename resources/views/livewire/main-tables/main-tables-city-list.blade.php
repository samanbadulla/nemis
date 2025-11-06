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
                    <flux:heading size="xl" level="1">{{ __('City List') }}</flux:heading>
                    <flux:subheading size="lg" class="mb-6">
                        {{ __('Manage City List and related information') }}
                    </flux:subheading>
                    <flux:separator variant="subtle" />
                </div>

                <div class="my-4 gap-2 justify-end flex">

                    <flux:modal.trigger name="add-new-city">
                        <flux:button icon="plus" color="primary"
                            class="px-4 py-2 font-medium shadow-sm transition-all hover:shadow-md">Add new City</flux:button>
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
                                City Name & ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                                District
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                                Postal Code
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                                Location Info.
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
                        @forelse ($cities as $key => $data)
                            <tr class="hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 text-sm font-medium">
                                            {{ $cities->firstItem() + $key }}
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                                    {{ $data->city_name_en }}
                                            </div>
                                            <div class="text-sm text-slate-500 dark:text-slate-400">
                                                City Id: {{ $data->city_id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                                    {{ $data->district->district_name ?? 'N/A' }}
                                            </div>
                                            <div class="text-sm text-slate-500 dark:text-slate-400">
                                                District Id: {{ $data->district_id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                                    {{ $data->postcode }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                                   Latitude : {{ $data->latitude ?? 'N/A' }}
                                            </div>
                                            <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                                    Longitude : {{ $data->longitude ?? 'N/A' }}
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
                                    <flux:modal.trigger wire:click="editCityList({{ $data->id }})">
                                        <flux:button size="sm" icon="pencil-square">Edit</flux:button>
                                    </flux:modal.trigger>
                                    <flux:button wire:click="toggleStatus({{ $data->id }})"
                                        wire:confirm="Are you sure you want to {{ $data->active_status == '1' ? 'deactivate' : 'activate' }} this Blood group?"
                                        size="sm" icon="{{ $data->active_status == '1' ? 'no-symbol' : 'check' }}"
                                        variant="{{ $data->active_status == '1' ? 'danger' : 'primary' }}">
                                    </flux:button>
                                    <flux:button wire:click="deleteCity({{ $data->id }})"
                                        wire:confirm="⚠️ You are about to delete '{{ $data->city_name_en }}'.This action cannot be undone. All related records will be permanently removed.Do you really want to proceed?"
                                        size="sm" icon="trash"
                                        variant="danger">
                                    </flux:button>

                                </td>
                            </tr>
                        @empty
                            <tr colspan="4">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-900 dark:text-slate-100">No City Found!
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>



                <div class="mt-4 mx-10">
                    {{ $cities->links() }}
                </div>
            </div>
        </div>

        <flux:modal wire:model="showModelNewCity" name="add-new-city" class="md:w-96">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Add new City</flux:heading>
                    <flux:text class="mt-2">Add new City to your system.
                    </flux:text>
                </div>
                @if (session()->has('error'))
                    <div class="p-3 mb-5 rounded-md bg-red-100 text-red-800 text-sm font-semibold">
                        {{ session('error') }}
                    </div>
                @endif
                <form wire:submit.prevent="addNewCity">
                    @csrf
                    <div class="mt-6 max-w-xl space-y-4">

                        <flux:field>
                            <flux:input label="City ID" wire:model.live="cityId"
                                placeholder="Enter City ID" mask="CT99999"/>
                        </flux:field>

                        <flux:field>
                            <flux:select label="District" id="district" wire:model.live="district">
                                <option value="">{{ __ ('Select District') }}</option>
                                @foreach ($districtOption as $district)
                                    <option value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                                @endforeach
                            </flux:select>
                        </flux:field>

                        <flux:field>
                            <flux:input label="City Name [English]" wire:model.live="cityNameEn"
                                placeholder="Enter City Name [English]" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="City Name [Sinhala]" wire:model.live="cityNameSi"
                                placeholder="Enter City Name [Sinhala]" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="City Name [Tamil]" wire:model.live="cityNameTa"
                                placeholder="Enter City Name [Tamil]" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="Postal Code" wire:model.live="postalCode"
                                placeholder="Enter Postal Code" mask="99999" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="Latitude (5.916 – 9.835)" wire:model.live="latitude"
                                placeholder="Enter Latitude (5.916 – 9.835)" step="0.000001" min="5.916" max="9.835" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="Longitude (79.652 – 81.881)" wire:model.live="longitude"
                                placeholder="Enter Longitude (79.652 – 81.881)" step="0.000001" min="79.652" max="81.881" />
                        </flux:field>

                    </div>

                    <div class="flex mt-4">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary">Add New City</flux:button>
                    </div>
                </form>
            </div>
        </flux:modal>

        <flux:modal wire:model="showModelEditCityList" name="edit-blood-group" class="md:w-96">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Edit City</flux:heading>
                    <flux:text class="mt-2">Change City information on your system.
                    </flux:text>
                </div>
                @if (session()->has('error'))
                    <div class="p-3 mb-5 rounded-md bg-red-100 text-red-800 text-sm font-semibold">
                        {{ session('error') }}
                    </div>
                @endif
                <form wire:submit.prevent="updateCity">
                    @csrf
                    <div class="mt-6 max-w-xl space-y-4">

                        <flux:field>
                            <flux:input label="City ID" wire:model.live="updateCityId"
                                placeholder="Enter City ID" mask="CT99999"/>
                        </flux:field>

                        <flux:field>
                            <flux:select label="District" id="district" wire:model.live="updateDistrict">
                                <option value="">{{ __ ('Select District') }}</option>
                                @foreach ($districtOption as $district)
                                    <option value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                                @endforeach
                            </flux:select>
                        </flux:field>

                        <flux:field>
                            <flux:input label="City Name [English]" wire:model.live="updateCityNameEn"
                                placeholder="Enter City Name [English]" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="City Name [Sinhala]" wire:model.live="updateCityNameSi"
                                placeholder="Enter City Name [Sinhala]" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="City Name [Tamil]" wire:model.live="updateCityNameTa"
                                placeholder="Enter City Name [Tamil]" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="Postal Code" wire:model.live="updatePostalCode"
                                placeholder="Enter Postal Code" mask="99999" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="Latitude (5.916 – 9.835)" wire:model.live="updateLatitude"
                                placeholder="Enter Latitude (5.916 – 9.835)" step="0.000001" min="5.916" max="9.835" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="Longitude (79.652 – 81.881)" wire:model.live="updateLongitude"
                                placeholder="Enter Longitude (79.652 – 81.881)" step="0.000001" min="79.652" max="81.881" />
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
