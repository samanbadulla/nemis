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
                        @if($principal->gender_id == "G02")
                            <img src="{{ asset('images/profile_f.png') }}" alt="Profile" class="w-16 h-16 rounded-lg object-cover border-2 border-gray-300 dark:border-gray-600 flex-shrink-0" />
                        @else
                            <img src="{{ asset('images/profile_m.png') }}" alt="Profile" class="w-16 h-16 rounded-lg object-cover border-2 border-gray-300 dark:border-gray-600 flex-shrink-0" />
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
                                        Personal & Cultural
                                    </h2>
                                    <flux:button icon="pencil-square" size="sm" variant="primary">Edit</flux:button>
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
                                        {{ $principal->full_name }}</p>
                                </div>

                                {{-- Name with Initials --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Initials
                                        Name</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principal->name_with_initials }}</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                                {{-- DOB --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">D.O.B
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principal->date_of_birth->format('d-m-Y') }}</p>
                                </div>

                                {{-- Gender --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Gender
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principal->gender->gender_name }}</p>
                                </div>

                                {{-- Religion --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Religion
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principal->religion->religion_name }}</p>
                                </div>

                                {{-- Ethnicity --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">
                                        Ethnicity</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principal->ethnicity->ethnicity_name }}</p>
                                </div>

                                {{-- Civil Status --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Civil
                                        Status</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principal->civilStatus->civil_status_name }}</p>
                                </div>

                            </div>
                        </section>

                        {{-- 2. Health Profile --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                        Health Information
                                    </h2>
                                    <flux:button icon="pencil-square" size="sm" variant="primary">Edit</flux:button>
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
                                        {{ $principal->bloodGroup->blood_group }}</p>
                                </div>

                                {{-- Health Condition --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Overall
                                        Condition</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    <p>{{ $principal->health_condition == '0' ? 'Good' : 'Not healthy' }}</p>
                                </div>

                                {{-- Health Problem --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Known
                                        Problems</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principal->health_problem ?? 'None' }}</p>
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
                                    <flux:button icon="pencil-square" size="sm" variant="primary">Edit</flux:button>
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
                                        {{ $principal->email }}</p>
                                </div>

                                {{-- Phone --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Phone
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principal->phone }}</p>
                                </div>

                                {{-- District --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">District
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principal->district->district_name }}</p>
                                </div>

                                {{-- GN Division --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">GN
                                        Division</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principal->gnDivision->gn_division_name }}</p>
                                </div>
                            </div>

                            {{-- Full Address Block --}}
                            <div
                                class="mt-4 p-3 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                                <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Residential
                                    Address</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $principal->address_line1 }}<br>
                                    @if ($principal->address_line2)
                                        {{ $principal->address_line2 }}<br>
                                    @endif
                                    @if ($principal->address_line3)
                                        {{ $principal->address_line3 }}<br>
                                    @endif
                                    <span class="font-bold">{{ $principal->postal_code }}</span>
                                </p>
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
    </x-teachers.layout>
</section>
