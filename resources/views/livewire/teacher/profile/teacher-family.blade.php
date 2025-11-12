<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Teacher Profile') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage teacher profile and settings') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-teachers.layout :teacherid="$id">
        <div>
            <div class="antialiased min-h-screen">

                {{-- Main Dual-Mode Card (Read-Only Container) --}}
                <div class="bg-white dark:bg-gray-800 p-4 rounded-b-lg">

                    {{-- Profile Header --}}
                    <div class="flex items-center space-x-4 mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                        @if ($teacher->gender_id == 'G02')
                            <img src="{{ asset('images/profile_f.png') }}" alt="Profile"
                                class="w-16 h-16 rounded-lg object-cover border-2 border-gray-300 dark:border-gray-600 flex-shrink-0" />
                        @else
                            <img src="{{ asset('images/profile_m.png') }}" alt="Profile"
                                class="w-16 h-16 rounded-lg object-cover border-2 border-gray-300 dark:border-gray-600 flex-shrink-0" />
                        @endif
                        <div>
                            <h1 class="text-xl font-bold text-gray-900 dark:text-white leading-tight">
                                {{ $teacher->title->title_name }} {{ $teacher->name_with_initials }}
                            </h1>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                NIC: {{ $teacher->nic }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                EmployID: {{ $teacher->people_id }}
                            </p>
                        </div>
                    </div>

                    @if (session()->has('success'))
                        <div class="p-3 mb-3 text-green-700 bg-green-100 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="p-3 mb-3 text-red-700 bg-red-100 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Main Content Grid --}}
                    <div class="space-y-6">
                        @if ($teacher->civil_status_id != 'C01')
                            <div class="">
                                {{-- 1. Personal & Socio-Cultural Details --}}
                                <section class="mb-4">
                                    <div class="mb-3">
                                        <div class="flex items-baseline justify-between py-2">
                                            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                                Spouse List
                                            </h2>
                                            <flux:modal.trigger name="add-spouse-info">
                                                <flux:button>Add spouse</flux:button>
                                            </flux:modal.trigger>
                                        </div>
                                        <flux:separator variant="subtle" />
                                    </div>
                                    <div class="bg-white">

                                        {{-- Responsive Table Container --}}
                                        <div class="overflow-x-auto">
                                            {{-- Table Structure --}}
                                            <table class="min-w-full divide-y divide-gray-200">

                                                {{-- Table Header --}}
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Spouse names
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Date of birth
                                                        </th>
                                                         <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Married date
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Gender
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            health condition
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>

                                                {{-- Table Body (Using Blade for dynamic data) --}}
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    {{-- Example static data for demonstration. In Blade, you'd use @foreach ($qualifications as $qualification) --}}
                                                    @forelse ($familyList as $data)
                                                        {{-- Row 1: Master's Degree --}}
                                                        <tr class="hover:bg-indigo-50/50">
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                {{ $data->getSpousInfo($teacher->people_id)->title->title_name }}
                                                                {{ $data->getSpousInfo($teacher->people_id)->name_with_initials }}
                                                            </td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                                {{ $data->getSpousInfo($teacher->people_id)->date_of_birth }}
                                                            </td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                                {{ $data->married_date}}
                                                            </td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                                {{ $data->married_cf_no}}
                                                            </td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">
                                                                {{ $data->active_status}}
                                                            </td>
                                                            <td
                                                                class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">
                                                                <flux:button icon="pencil-square" variant="subtle"
                                                                    size="sm" />
                                                                <flux:button icon="trash" variant="subtle"
                                                                    size="sm" />
                                                            </td>
                                                        </tr>

                                                    @empty
                                                        <tr class="bg-white">
                                                            <td colspan="4"
                                                                class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                                                No educational qualifications have been added yet.
                                                            </td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </section>

                                {{-- 1. Personal & Socio-Cultural Details --}}
                                <section>
                                    <div class="mb-3">
                                        <div class="flex items-baseline justify-between py-2">
                                            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                                Children's list
                                            </h2>
                                            <flux:button icon="plus" size="sm" variant="primary">Add
                                            </flux:button>
                                        </div>
                                        <flux:separator variant="subtle" />
                                    </div>
                                    <div class="bg-white">

                                        {{-- Responsive Table Container --}}
                                        <div class="overflow-x-auto">
                                            {{-- Table Structure --}}
                                            <table class="min-w-full divide-y divide-gray-200">

                                                {{-- Table Header --}}
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Children names
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Date of birth
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Gender
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            health condition
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>

                                                {{-- Table Body (Using Blade for dynamic data) --}}
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    {{-- Example static data for demonstration. In Blade, you'd use @foreach ($qualifications as $qualification) --}}

                                                    {{-- Row 1: Master's Degree --}}
                                                    <tr class="hover:bg-indigo-50/50">
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            Master of Science (M.S.) in Computer Science
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                            Global Tech University
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                            2022
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">
                                                            4.0 GPA
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">
                                                            <flux:button icon="pencil-square" variant="subtle"
                                                                size="sm" />
                                                            <flux:button icon="trash" variant="subtle"
                                                                size="sm" />
                                                        </td>
                                                    </tr>

                                                    {{-- Row 2: Bachelor's Degree --}}
                                                    <tr class="bg-gray-50 hover:bg-indigo-50/50">
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            Bachelor of Technology (B.Tech) in IT
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                            Regional Engineering College
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                            2020
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">
                                                            85%
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">
                                                            <flux:button icon="pencil-square" variant="subtle"
                                                                size="sm" />
                                                            <flux:button icon="trash" variant="subtle"
                                                                size="sm" />
                                                        </td>
                                                    </tr>

                                                    {{-- Row 3: High School --}}
                                                    <tr class="hover:bg-indigo-50/50">
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            High School Diploma / HSC
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                            City Public School
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                            2016
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">
                                                            92%
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">
                                                            <flux:button icon="pencil-square" variant="subtle"
                                                                size="sm" />
                                                            <flux:button icon="trash" variant="subtle"
                                                                size="sm" />
                                                        </td>
                                                    </tr>

                                                    {{-- @empty
                                                <tr class="bg-white">
                                                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                                        No educational qualifications have been added yet.
                                                    </td>
                                                </tr>
                                            @endforelse --}}

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </section>
                            </div>
                        @else
                            <p class=" text-gray-600">Your civil status is single. </p>
                        @endif

                        {{-- 4. Audit Data (NIC Hash) --}}
                        <section class="pt-4 border-t border-gray-200 dark:border-gray-700">
                            <p class="text-xs font-mono text-gray-500 dark:text-gray-600">
                                **NIC Hash (System Key):** {{ $teacher->nic_hash }}
                            </p>
                        </section>

                    </div>

                </div>
            </div>
        </div>

        {{-- Edit general information --}}
        <flux:modal wire:model="showModalSpouseReg" name="add-spouse-info" class="md:w-150">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Spouse Register</flux:heading>
                    <flux:text class="mt-2">Make changes to your personal details.
                    </flux:text>
                </div>
                <form wire:submit.prevent="spouseReg">
                    @csrf
                    <div class="mt-6 max-w-xl space-y-4">

                        <flux:field>
                            <flux:input label="National Identity Card (NIC)" wire:model.live="nic"
                                placeholder="Enter NIC" />
                        </flux:field>

                        <flux:field>
                            <flux:select label="Title" wire:model.live="title">
                                <option value="">Select</option>
                                @foreach ($titleOptions as $data)
                                    <option value="{{ $data->title_id }}">{{ $data->title_name }}</option>
                                @endforeach
                            </flux:select>
                        </flux:field>

                        <flux:field>
                            <flux:input label="Full Name" wire:model.live="fullName" placeholder="Enter full name" />
                        </flux:field>

                        <div class="flex gap-4">
                            <!-- Gender -->
                            <div class="w-1/2">
                                <flux:field>
                                    <flux:select label="Gender" wire:model.live="gender">
                                        <option value="">Select</option>
                                        @foreach ($genderOptions as $data)
                                            <option value="{{ $data->gender_id }}">{{ $data->gender_name }}</option>
                                        @endforeach
                                    </flux:select>
                                </flux:field>
                            </div>

                            <!-- Birthday -->
                            <div class="w-1/2">
                                <flux:field>
                                    <flux:input type="date" label="Birthday" wire:model.live="birthday" />
                                </flux:field>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-4">
                            <!-- Ethnicity -->
                            <div class="md:w-1/2 w-full">
                                <flux:field>
                                    <flux:select label="Ethnicity" wire:model.live="ethnicity">
                                        <option value="">Select</option>
                                        @foreach ($ethnicityOptions as $data)
                                            <option value="{{ $data->ethnicity_id }}">{{ $data->ethnicity_name }}
                                            </option>
                                        @endforeach
                                    </flux:select>
                                </flux:field>
                            </div>

                            <!-- Religion Status -->
                            <div class="md:w-1/2 w-full">
                                <flux:field>
                                    <flux:select label="Religion" wire:model.live="religion">
                                        <option value="">Select Religion</option>
                                        @foreach ($religionOptions as $data)
                                            <option value="{{ $data->religion_id }}">{{ $data->religion_name }}
                                            </option>
                                        @endforeach
                                    </flux:select>
                                </flux:field>
                            </div>
                        </div>

                        <flux:field>
                            <flux:input label="Contact" wire:model.live="contact"
                                placeholder="Enter Contact (10 digits)" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="Email" type="email" wire:model.live="email"
                                placeholder="Enter email" />
                        </flux:field>

                        <div class="flex gap-4">
                            <!-- Gender -->
                            <div class="w-1/2">
                                <flux:field>
                                    <flux:input type="date" label="Married date" wire:model.live="marriedDate" />
                                </flux:field>
                            </div>

                            <!-- Birthday -->
                            <div class="w-1/2">
                                <flux:field>
                                    <flux:input type="text" label="Married certifacate no"
                                        wire:model.live="marriedCfNo" />
                                </flux:field>
                            </div>
                        </div>

                    </div>

                    <div class="flex mt-4">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary">Save changes</flux:button>
                    </div>
                </form>
            </div>
        </flux:modal>

    </x-teachers.layout>
</section>
