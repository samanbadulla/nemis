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

                    {{-- Main Content Grid --}}
                    <div class="space-y-6">

                        {{-- 1. Personal & Socio-Cultural Details --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                        Spouse details
                                    </h2>
                                    <flux:button icon="pencil-square" size="sm" variant="primary">Edit
                                    </flux:button>
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
                                        {{ $teacher->date_of_birth }}</p>
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

                                {{-- Ethnicity --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">
                                        Married date</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->ethnicity->ethnicity_name }}</p>
                                </div>

                                {{-- Ethnicity --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">
                                        NIC</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->ethnicity->ethnicity_name }}</p>
                                </div>

                                {{-- Ethnicity --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">
                                        Contact Number</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $teacher->ethnicity->ethnicity_name }}</p>
                                </div>

                            </div>
                        </section>

                        {{-- 2. Health Profile --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                        Spouse details Health Information
                                    </h2>
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
                                    <p>{{ $teacher->health_condition == '0' ? 'Good' : 'Not healthy' }}</p>
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

                        {{-- 1. Personal & Socio-Cultural Details --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                        Children's list
                                    </h2>
                                    <flux:button icon="plus" size="sm" variant="primary">Add</flux:button>
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
                                                    <flux:button icon="trash" variant="subtle" size="sm" />
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
                                                    <flux:button icon="trash" variant="subtle" size="sm" />
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
                                                    <flux:button icon="trash" variant="subtle" size="sm" />
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
    </x-teachers.layout>
</section>
