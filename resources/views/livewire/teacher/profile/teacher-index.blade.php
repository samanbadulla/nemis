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

                        {{-- 1. Personal & Socio-Cultural Details --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                        Personal & Cultural
                                    </h2>
                                    @can('teacher personal and cultural edit')
                                        <flux:modal.trigger name="edit-profile-personal-info">
                                            <flux:button>Edit</flux:button>
                                        </flux:modal.trigger>
                                    @endcan
                                </div>
                                <flux:separator variant="subtle" />
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">

                                {{-- Full Name --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Full
                                        Name</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->full_name }}</p>
                                </div>

                                {{-- Name with Initials --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Initials
                                        With
                                        Name</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->name_with_initials }}</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                                {{-- DOB --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">D.O.B
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->date_of_birth->format('d-m-Y') }}</p>
                                </div>

                                {{-- Gender --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Gender
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->gender->gender_name }}</p>
                                </div>

                                {{-- Religion --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Religion
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->religion->religion_name }}</p>
                                </div>

                                {{-- Ethnicity --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">
                                        Ethnicity</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->ethnicity->ethnicity_name }}</p>
                                </div>

                                {{-- Civil Status --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Civil
                                        Status</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->civilStatus->civil_status_name }}</p>
                                </div>

                            </div>
                        </section>

                        {{-- 2. Health information --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                        Health Information
                                    </h2>
                                    @can('teacher health information edit')
                                        <flux:modal.trigger name="edit-profile-health-info">
                                            <flux:button>Edit</flux:button>
                                        </flux:modal.trigger>
                                    @endcan
                                </div>
                                <flux:separator variant="subtle" />
                            </div>

                            <div class="grid grid-cols-3 gap-4">

                                {{-- Blood Group --}}
                                <div
                                    class="p-2 border-l-3 border-red-400 bg-red-50 dark:bg-gray-700 shadow-sm rounded-r-md">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Blood
                                        Group</p>
                                    <p class="text-sm font-bold text-red-600 dark:text-red-400">
                                        {{ $teacher->bloodGroup->blood_group }}</p>
                                </div>

                                {{-- Health Condition --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Overall
                                        Condition</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    <p>{{ $teacher->health_status }}</p>
                                </div>

                                {{-- Health Problem --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Known
                                        Problems</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->health_problem ?? 'None' }}</p>
                                </div>

                            </div>
                        </section>

                        {{-- 3. Contact & Location --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                        Contact & Address
                                    </h2>
                                    @can('teacher contact and address edit')
                                        <flux:modal.trigger name="edit-contact-info">
                                            <flux:button>Edit</flux:button>
                                        </flux:modal.trigger>
                                    @endcan
                                </div>
                                <flux:separator variant="subtle" />
                            </div>
                            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

                                {{-- Email --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Email
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->email }}</p>
                                </div>

                                {{-- Phone --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Phone
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->phone }}</p>
                                </div>

                                {{-- District --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">District
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->district->district_name }}</p>
                                </div>

                                {{-- GN Division --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">GN
                                        Division</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->gnDivision->gn_division_name ?? 'N/A'}}</p>
                                </div>
                            </div>

                            {{-- Full Address Block --}}
                            <div
                                class="mt-4 p-3 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                                <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Permanent
                                    Address</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $teacher->address_line1 }}<br>
                                    @if ($teacher->address_line2)
                                        {{ $teacher->address_line2 }}<br>
                                    @endif
                                    @if ($teacher->address_line3)
                                        {{ $teacher->address_line3 }}<br>
                                    @endif
                                    <span class="font-bold">{{ $teacher->postal_code }}</span>
                                </p>
                            </div>

                            <div
                                class="mt-4 p-3 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                                <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Residential
                                    Address</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $teacher->t_address_line1 }}<br>
                                    @if ($teacher->t_address_line2)
                                        {{ $teacher->t_address_line2 }}<br>
                                    @endif
                                    @if ($teacher->t_address_line3)
                                        {{ $teacher->t_address_line3 }}<br>
                                    @endif
                                    <span class="font-bold">{{ $teacher->t_postal_code }}</span>
                                </p>
                            </div>
                        </section>

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
        {{-- Edit Profile Modal --}}

        @can('teacher personal and cultural edit')
            {{-- Edit general information --}}
            <flux:modal wire:model="showModalPersonalInfo" name="edit-profile-personal-info" class="md:w-96">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Personal & Cultural</flux:heading>
                        <flux:text class="mt-2">Make changes to your personal details.
                        </flux:text>
                    </div>
                    <form wire:submit.prevent="editPersonalInfo">
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
                                <flux:select label="Civil Status" wire:model.live="civilStatus">
                                    <option value="">Select</option>
                                    @foreach ($civilStatusOptions as $data)
                                        <option value="{{ $data->civil_status_id }}">{{ $data->civil_status_name }}
                                        </option>
                                    @endforeach
                                </flux:select>
                            </flux:field>

                        </div>

                        <div class="flex mt-4">
                            <flux:spacer />
                            <flux:button type="submit" variant="primary">Save changes</flux:button>
                        </div>
                    </form>
                </div>
            </flux:modal>
        @endcan

        @can('teacher health information edit')
            {{-- Edit health information --}}
            <flux:modal wire:model="showModalHealthInfo" name="edit-profile-health-info" class="md:w-96">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Health Information</flux:heading>
                        <flux:text class="mt-2">Make changes to your health details.
                        </flux:text>
                    </div>
                    <form wire:submit.prevent="editHealthInfo">
                        @csrf
                        <div class="mt-6 max-w-xl space-y-4">

                            <flux:field>
                                <flux:select label="Blood Group" wire:model.live="bloodGroup">
                                    <option value="">Select</option>
                                    @foreach ($bloodGroupOptions as $data)
                                        <option value="{{ $data->blood_group_id }}">{{ $data->blood_group }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>

                            <!-- Health Condition -->
                            <div class="w-full">
                                <flux:field>
                                    <flux:select label="Healthy?" wire:model.live="healthCondition">
                                        <option value="">Select Health Condition</option>
                                        @foreach ($healthConditionOptions as $value => $label)
                                            <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </flux:select>
                                </flux:field>
                            </div>


                            <!-- Health Problem -->
                            @if ($healthCondition == false)
                                <div class="w-full">
                                    <flux:field>
                                        <flux:textarea label="Please provide details of the health problem."
                                            wire:model.live="healthProblem"
                                            placeholder="Enter health problem details here..." rows="4" />
                                    </flux:field>
                                </div>
                            @endif

                        </div>

                        <div class="flex mt-4">
                            <flux:spacer />
                            <flux:button type="submit" variant="primary">Save changes</flux:button>
                        </div>
                    </form>
                </div>
            </flux:modal>
        @endcan

        @can('teacher contact and address edit')
            {{-- Edit contact information --}}
            <flux:modal wire:model="showModalContactInfo" name="edit-contact-info" class="md:w-150">

                <div class="space-y-4">
                    <div>
                        <flux:heading size="lg">Update profile</flux:heading>
                        <flux:text class="mt-2">Make changes to your personal details.
                        </flux:text>
                    </div>

                    <form wire:submit.prevent="editContactInfo" class="space-y-4">
                        <flux:field>
                            <flux:input label="Contact" wire:model.live="contact"
                                placeholder="Enter Contact (10 digits)" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="Email" type="email" wire:model.live="email"
                                placeholder="Enter email" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="Address Line 1" wire:model.live="addressLine1"
                                placeholder="Enter address line 1" />
                        </flux:field>

                        <flux:field>
                            <flux:input label="Address Line 2" wire:model.live="addressLine2"
                                placeholder="Enter address line 2" />
                        </flux:field>

                        <div class="flex flex-col md:flex-row gap-4">
                            <!-- Address Line 3 -->
                            <div class="md:w-3/4 w-full">
                                <flux:field>
                                    <flux:input label="Address Line 3" wire:model.live="addressLine3"
                                        placeholder="Enter address line 3" />
                                </flux:field>
                            </div>

                            <!-- Postal Code -->
                            <div class="md:w-1/4 w-full">
                                <flux:field>
                                    <flux:input label="Postal Code" wire:model.live="postalCode"
                                        placeholder="Enter postal code" />
                                </flux:field>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-4">
                            <!-- latitude -->
                            <div class="md:w-1/2 w-full">
                                <flux:field>
                                    <flux:input label="Latitude" wire:model.live="latitude"
                                        placeholder="Enter latitude (optional)" />
                                </flux:field>
                            </div>

                            <!-- longitude -->
                            <div class="md:w-1/2 w-full">
                                <flux:field>
                                    <flux:input label="Longitude" wire:model.live="longitude"
                                        placeholder="Enter longitude (optional)" />
                                </flux:field>
                            </div>
                        </div>

                        <div
                            class="p-4 space-y-6 bg-gray-100 dark:bg-gray-900 rounded-md border border-gray-300 dark:border-gray-700">
                            <p class="text-gray-700 dark:text-gray-200 font-bold">
                                Temporary Address (If different from permanent address)
                            </p>

                            <flux:field class="text-gray-700 dark:text-gray-300">
                                <flux:input label="Address Line 1" wire:model.live="tAddressLine1"
                                    class="bg-white dark:bg-gray-800 text-black dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-400"
                                    placeholder="Enter address line 1" />
                            </flux:field>

                            <flux:field class="text-gray-700 dark:text-gray-300">
                                <flux:input label="Address Line 2" wire:model.live="tAddressLine2"
                                    class="bg-white dark:bg-gray-800 text-black dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-400"
                                    placeholder="Enter address line 2" />
                            </flux:field>

                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="md:w-3/4 w-full">
                                    <flux:field class="text-gray-700 dark:text-gray-300">
                                        <flux:input label="Address Line 3" wire:model.live="tAddressLine3"
                                            class="bg-white dark:bg-gray-800 text-black dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-400"
                                            placeholder="Enter address line 3" />
                                    </flux:field>
                                </div>

                                <div class="md:w-1/4 w-full">
                                    <flux:field class="text-gray-700 dark:text-gray-300">
                                        <flux:input label="Postal Code" wire:model.live="tPostalCode"
                                            class="bg-white dark:bg-gray-800 text-black dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-400"
                                            placeholder="Enter postal code" />
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
        @endcan
    </x-teachers.layout>
</section>
