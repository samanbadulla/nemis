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
                                        Educational qualification
                                    </h2>
                                    <flux:modal.trigger name="add-qualification">
                                        <flux:button icon="plus" size="sm" variant="primary">Add</flux:button>
                                    </flux:modal.trigger>
                                </div>
                                <flux:separator variant="subtle" />
                            </div>

                            <flux:modal name="add-qualification" class="md:w-96">
                                <div class="space-y-6">
                                    <div>
                                        <flux:heading size="lg">Update qualification</flux:heading>
                                        <flux:text class="mt-2">Make changes to your qualification details.</flux:text>
                                    </div>

                                    <flux:input label="Name" placeholder="Your name" />

                                    <flux:input label="Date of birth" type="date" />

                                    <div class="flex">
                                        <flux:spacer />

                                        <flux:button type="submit" variant="primary">Save changes</flux:button>
                                    </div>
                                </div>
                            </flux:modal>


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
                                                    Grade / Result
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

                                            {{-- Row 1 --}}
                                            <tr class="hover:bg-indigo-50 dark:hover:bg-indigo-900/40">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    Master of Science (M.S.) in Computer Science
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                                    Global Tech University
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                                    2022
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">
                                                    4.0 GPA
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    <div class="flex gap-2">
                                                        <flux:button icon="pencil-square" variant="subtle"
                                                            size="sm" />
                                                        <flux:button icon="trash" variant="subtle" size="sm" />
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- Row 2 --}}
                                            <tr
                                                class="bg-gray-50 dark:bg-gray-800 hover:bg-indigo-50 dark:hover:bg-indigo-900/40">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    Bachelor of Technology (B.Tech) in IT
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                                    Regional Engineering College
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                                    2020
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">
                                                    85%
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    <div class="flex gap-2">
                                                        <flux:button icon="pencil-square" variant="subtle"
                                                            size="sm" />
                                                        <flux:button icon="trash" variant="subtle" size="sm" />
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- Row 3 --}}
                                            <tr class="hover:bg-indigo-50 dark:hover:bg-indigo-900/40">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    High School Diploma / HSC
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                                    City Public School
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                                    2016
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">
                                                    92%
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    <div class="flex gap-2">
                                                        <flux:button icon="pencil-square" variant="subtle"
                                                            size="sm" />
                                                        <flux:button icon="trash" variant="subtle" size="sm" />
                                                    </div>
                                                </td>
                                            </tr>
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
