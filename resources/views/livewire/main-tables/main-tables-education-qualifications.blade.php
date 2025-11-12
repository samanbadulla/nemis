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
                    <flux:heading size="xl" level="1">{{ __('Education Qualifications') }}</flux:heading>
                    <flux:subheading size="lg" class="mb-6">
                        {{ __('Manage Education Qualifications and related information') }}
                    </flux:subheading>
                    <flux:separator variant="subtle" />
                </div>

                <div class="my-4 gap-2 justify-end flex">

                    <flux:modal.trigger name="add-new-education-qualification">
                        <flux:button icon="plus" color="primary"
                            class="px-4 py-2 font-medium shadow-sm transition-all hover:shadow-md">Add new Education Qualification</flux:button>
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
                                Education Qualification & ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                                SLQF Level
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-slate-600 dark:text-slate-300 uppercase tracking-wider">
                                NVQ Level
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
                        @forelse ($eqList as $key => $data)
                            <tr class="hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="shrink-0 h-10 w-10 text-sm font-medium">
                                            {{ $eqList->firstItem() + $key }}
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                                    {{ $data->qualification }}
                                            </div>
                                            <div class="text-sm text-slate-500 dark:text-slate-400">
                                                City Id: {{ $data->qualifications_id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="shrink-0 h-10 w-10 text-sm font-medium">
                                            {{ $data->slql }}
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-slate-900 dark:text-slate-100">
                                                    {{ $data->nvql }}
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
                                    <flux:modal.trigger wire:click="editEQLevel({{ $data->id }})">
                                        <flux:button size="sm" icon="pencil-square">Edit</flux:button>
                                    </flux:modal.trigger>
                                    <flux:button wire:click="toggleStatus({{ $data->id }})"
                                        wire:confirm="Are you sure you want to {{ $data->active_status == '1' ? 'deactivate' : 'activate' }} this District?"
                                        size="sm" icon="{{ $data->active_status == '1' ? 'no-symbol' : 'check' }}"
                                        variant="{{ $data->active_status == '1' ? 'danger' : 'primary' }}">
                                    </flux:button>
                                    <flux:button wire:click="deleteEQLevel({{ $data->id }})"
                                        wire:confirm="⚠️ You are about to delete '{{ $data->qualification }}'.This action cannot be undone. All related records will be permanently removed.Do you really want to proceed?"
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
                    {{ $eqList->links() }}
                </div>
            </div>
        </div>

        <flux:modal wire:model="showModelNewEducationQualification" name="add-new-education-qualification" class="md:w-96">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Add new Education Qualification</flux:heading>
                    <flux:text class="mt-2">Add new Education Qualification to your system.
                    </flux:text>
                </div>
                @if (session()->has('error'))
                    <div class="p-3 mb-5 rounded-md bg-red-100 text-red-800 text-sm font-semibold">
                        {{ session('error') }}
                    </div>
                @endif
                <form wire:submit.prevent="addNewEducationQualification">
                    @csrf
                    <div class="mt-6 max-w-xl space-y-4">

                        <flux:field>
                            <flux:input label="Education Qualification ID" wire:model.live="educationQualificationId"
                                placeholder="Enter Education Qualification ID" mask="EQ999"/>
                        </flux:field>

                        <flux:field>
                            <flux:select label="Sri Lanka Qualifications Framework (SLQF) Level" id="slqfl" wire:model.live="slqfl">
                                <option value="">{{ __ ('Select SLQF Level') }}</option>
                                <option value="SLQF12">{{ __ ('SLQF Level 12') }}</option>
                                <option value="SLQF11">{{ __ ('SLQF Level 11') }}</option>
                                <option value="SLQF10">{{ __ ('SLQF Level 10') }}</option>
                                <option value="SLQF9">{{ __ ('SLQF Level 09') }}</option>
                                <option value="SLQF8">{{ __ ('SLQF Level 08') }}</option>
                                <option value="SLQF7">{{ __ ('SLQF Level 07') }}</option>
                                <option value="SLQF6">{{ __ ('SLQF Level 06') }}</option>
                                <option value="SLQF5">{{ __ ('SLQF Level 05') }}</option>
                                <option value="SLQF4">{{ __ ('SLQF Level 04') }}</option>
                                <option value="SLQF3">{{ __ ('SLQF Level 03') }}</option>
                                <option value="SLQF2">{{ __ ('SLQF Level 02') }}</option>
                                <option value="SLQF1">{{ __ ('SLQF Level 01') }}</option>
                            </flux:select>
                        </flux:field>

                        <flux:field>
                            <flux:select label=" National Vocational Qualifications (NVQ) Level" id="nvql" wire:model.live="nvql">
                                <option value="">{{ __ ('Select NVQ Level') }}</option>
                                <option value="NVQ7">{{ __ ('NVQ Level 07') }}</option>
                                <option value="NVQ6">{{ __ ('NVQ Level 06') }}</option>
                                <option value="NVQ5">{{ __ ('NVQ Level 05') }}</option>
                                <option value="NVQ4">{{ __ ('NVQ Level 04') }}</option>
                                <option value="NVQ3">{{ __ ('NVQ Level 03') }}</option>
                                <option value="NVQ2">{{ __ ('NVQ Level 02') }}</option>
                                <option value="NVQ1">{{ __ ('NVQ Level 01') }}</option>
                            </flux:select>
                        </flux:field>

                        <flux:field>
                            <flux:input label="Qualification Order" wire:model.live="qualificationOrder"
                                placeholder="Enter Qualification Order" mask="999"/>
                        </flux:field>

                        <flux:field>
                            <flux:input label="Education Qualification" wire:model.live="educationQualification"
                                placeholder="Enter Education Qualification" />
                        </flux:field>

                    </div>

                    <div class="flex mt-4">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary">Add New Education Qualification</flux:button>
                    </div>
                </form>
            </div>
        </flux:modal>

        <flux:modal wire:model="showModelEditEducationQualification" name="edit-education-qualification" class="md:w-96">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Edit Education Qualification</flux:heading>
                    <flux:text class="mt-2">Change Education Qualification information on your system.
                    </flux:text>
                </div>
                @if (session()->has('error'))
                    <div class="p-3 mb-5 rounded-md bg-red-100 text-red-800 text-sm font-semibold">
                        {{ session('error') }}
                    </div>
                @endif
                <form wire:submit.prevent="updateEducationQualificationlist">
                    @csrf
                    <div class="mt-6 max-w-xl space-y-4">
                        <flux:field>
                            <flux:input label="Education Qualification ID" wire:model.live="updateEducationQualificationId"
                                placeholder="Enter Education Qualification ID" mask="EQ999"/>
                        </flux:field>

                        <flux:field>
                            <flux:select label="Sri Lanka Qualifications Framework (SLQF) Level" id="slqfl" wire:model.live="updateSlqfl">
                                <option value="">{{ __ ('Select SLQF Level') }}</option>
                                <option value="SLQF12">{{ __ ('SLQF Level 12') }}</option>
                                <option value="SLQF11">{{ __ ('SLQF Level 11') }}</option>
                                <option value="SLQF10">{{ __ ('SLQF Level 10') }}</option>
                                <option value="SLQF9">{{ __ ('SLQF Level 09') }}</option>
                                <option value="SLQF8">{{ __ ('SLQF Level 08') }}</option>
                                <option value="SLQF7">{{ __ ('SLQF Level 07') }}</option>
                                <option value="SLQF6">{{ __ ('SLQF Level 06') }}</option>
                                <option value="SLQF5">{{ __ ('SLQF Level 05') }}</option>
                                <option value="SLQF4">{{ __ ('SLQF Level 04') }}</option>
                                <option value="SLQF3">{{ __ ('SLQF Level 03') }}</option>
                                <option value="SLQF2">{{ __ ('SLQF Level 02') }}</option>
                                <option value="SLQF1">{{ __ ('SLQF Level 01') }}</option>
                            </flux:select>
                        </flux:field>

                        <flux:field>
                            <flux:select label=" National Vocational Qualifications (NVQ) Level" id="nvql" wire:model.live="updateNvql">
                                <option value="">{{ __ ('Select NVQ Level') }}</option>
                                <option value="NVQ7">{{ __ ('NVQ Level 07') }}</option>
                                <option value="NVQ6">{{ __ ('NVQ Level 06') }}</option>
                                <option value="NVQ5">{{ __ ('NVQ Level 05') }}</option>
                                <option value="NVQ4">{{ __ ('NVQ Level 04') }}</option>
                                <option value="NVQ3">{{ __ ('NVQ Level 03') }}</option>
                                <option value="NVQ2">{{ __ ('NVQ Level 02') }}</option>
                                <option value="NVQ1">{{ __ ('NVQ Level 01') }}</option>
                            </flux:select>
                        </flux:field>

                        <flux:field>
                            <flux:input label="Qualification Order" wire:model.live="updateQualificationOrder"
                                placeholder="Enter Qualification Order" mask="999"/>
                        </flux:field>

                        <flux:field>
                            <flux:input label="Education Qualification" wire:model.live="updateEducationQualification"
                                placeholder="Enter Education Qualification" />
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
