<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Principal Profile') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage principal profile and settings') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-principal.layout :principalid="$id">
        <div>
            <div class="antialiased min-h-screen">

                {{-- Main Dual-Mode Card (Read-Only Container) --}}
                <div class="bg-white dark:bg-gray-800 p-4 rounded-b-lg">

                    {{-- Profile Header --}}
                    <div class="flex items-center space-x-4 mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                        @if ($principal->gender_id == 'G02')
                            <img src="{{ asset('images/profile_f.png') }}" alt="Profile"
                                class="w-16 h-16 rounded-lg object-cover border-2 border-gray-300 dark:border-gray-600 flex-shrink-0" />
                        @else
                            <img src="{{ asset('images/profile_m.png') }}" alt="Profile"
                                class="w-16 h-16 rounded-lg object-cover border-2 border-gray-300 dark:border-gray-600 flex-shrink-0" />
                        @endif
                        <div>
                            <h1 class="text-xl font-bold text-gray-900 dark:text-white leading-tight">
                                {{ $principal->title->title_name }} {{ $principal->name_with_initials }}
                            </h1>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                NIC: {{ $principal->nic }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                EmployID: {{ $principal->people_id }}
                            </p>
                        </div>
                    </div>

                    {{-- Main Content Grid --}}
                    <div class="space-y-6">

                        {{-- 1. Personal & Socio-Cultural Details --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                        Educational qualification
                                    </h2>
                                    <flux:modal.trigger name="add-qualification">
                                        <flux:button icon="plus" size="sm" variant="primary">Add</flux:button>
                                    </flux:modal.trigger>
                                </div>
                                <flux:separator variant="subtle" />
                            </div>

                            <flux:modal wire:model="showModal" name="add-qualification" class="md:w-96">
                                <div class="space-y-6">
                                    <div>
                                        <flux:heading size="lg">Update qualification</flux:heading>
                                        <flux:text class="mt-2">Make changes to your qualification details.
                                        </flux:text>
                                    </div>

                                    <form wire:submit.prevent="save" class="space-y-4">
                                        <flux:select wire:model.live="qualification" label="Qualification">
                                            <flux:select.option value="">Select</flux:select.option>
                                            @foreach ($educationQualificationList as $data)
                                                <flux:select.option value="{{ $data->qualifications_id }}">
                                                    {{ $data->qualification }}
                                                </flux:select.option>
                                            @endforeach
                                        </flux:select>

                                        <flux:input label="Institution" wire:model.live="institution"
                                            placeholder="University or Institution name" />

                                        <flux:input label="Effective date" wire:model.live="effectiveDate"
                                            type="date" />

                                        <flux:select wire:model.live="grade" label="Grade">
                                            <flux:select.option value="">Select</flux:select.option>
                                            @foreach ($gradeOption as $key => $value)
                                                <flux:select.option value="{{ $key }}">{{ $value }}
                                                </flux:select.option>
                                            @endforeach
                                        </flux:select>

                                        <flux:textarea rows="2" wire:model.live="description" label="Description"
                                            placeholder="Main Subjects and other details" />

                                        <div class="flex">
                                            <flux:spacer />
                                            <flux:button type="submit" variant="primary">Save changes</flux:button>
                                        </div>
                                    </form>
                                </div>
                            </flux:modal>

                            @if (session()->has('message'))
                                <div class="mt-3 text-green-600">
                                    {{ session('message') }}
                                </div>
                            @endif



                            <div class="bg-white">

                                {{-- Responsive Table Container --}}
                                <div class="overflow-x-auto">
                                    {{-- Table Structure --}}
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                                        {{-- Table Header --}}
                                        <thead class="bg-gray-50 dark:bg-gray-800">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                    Degree / Certificate
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                    Institution
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                    Date of Completion
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                    Grade
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>

                                        {{-- Table Body --}}
                                        <tbody
                                            class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">

                                            @forelse ($qualificationList as $data)
                                                <tr class="hover:bg-indigo-50 dark:hover:bg-indigo-900/40">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        {{ $data->qualification->qualification }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                                        {{ $data->institution }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                                        {{ $data->effective_date }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">
                                                        {{ $data->grade }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                        <div class="flex gap-2">
                                                            <flux:button icon="trash" variant="subtle" size="sm"
                                                                wire:click="delete({{ $data->id }})"
                                                                onclick="confirm('Are you sure you want to delete this record?') || event.stopImmediatePropagation()" />

                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="hover:bg-indigo-50 dark:hover:bg-indigo-900/40">
                                                    <td colspan="5"
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                                        No data
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </section>

                        {{-- 4. Audit Data (NIC Hash) --}}
                        <section class="pt-4 border-t border-gray-200 dark:border-gray-700">
                            <p class="text-xs font-mono text-gray-500 dark:text-gray-600">
                                **NIC Hash (System Key):** {{ $principal->nic_hash }}
                            </p>
                        </section>

                    </div>

                </div>
            </div>
        </div>
    </x-principal.layout>
</section>
