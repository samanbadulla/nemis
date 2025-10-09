<div>
    <div class="container max-w-7xl px-4 py-6 antialiased min-h-screen">

        {{-- Main Card (Light/Dark) --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl">

            {{-- Header: Logo, Name, Short Name --}}
            <div class="flex items-center space-x-6 mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                <div
                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-full overflow-hidden border-2 shadow-md flex-shrink-0 {{ $provincialEducationMinistry->active_status ? 'border-green-500' : 'border-red-500' }}">

                    @if ($provincialEducationMinistry->logo)
                        <img src="{{ asset('storage/' . $provincialEducationMinistry->logo) }}" alt="{{ $provincialEducationMinistry->name }}"
                            class="w-full h-full object-cover {{ $provincialEducationMinistry->active_status ? '' : 'filter grayscale opacity-60' }}">

                        @if (!$provincialEducationMinistry->active_status)
                            <div
                                class="absolute inset-0 flex items-center justify-center bg-red-500 bg-opacity-25 rounded-full">
                                <span class="text-xs text-white font-bold">Inactive</span>
                            </div>
                        @endif
                    @else
                        {{-- Default Icon --}}
                        <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 21V8a1 1 0 011-1h4a1 1 0 011 1v13M5 21V11a1 1 0 011-1h12a1 1 0 011 1v10M3 21h18" />
                            </svg>

                        </div>
                    @endif
                </div>

                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white leading-tight">
                        {{ $provincialEducationMinistry->name }}
                    </h1>
                    @if ($provincialEducationMinistry->short_name)
                        <p class="text-base text-gray-500 dark:text-gray-400 font-medium mt-1">
                            {{ $provincialEducationMinistry->short_name }}
                        </p>
                    @endif
                </div>
            </div>

            {{-- Main Content --}}
            <div class="space-y-6">

                {{-- Basic Info --}}
                <section>
                    <h2
                        class="text-lg font-bold text-gray-800 dark:text-gray-200 border-b border-gray-300 dark:border-gray-700 pb-1 mb-3">
                        Basic Information
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @php
                            $basicInfo = [
                                'Workplace ID' => $provincialEducationMinistry->workplace_id ?? 'N/A'
                            ];
                        @endphp
                        @foreach ($basicInfo as $label => $value)
                            <div
                                class="p-2 bg-gray-100 dark:bg-gray-700 rounded-md border border-gray-300 dark:border-gray-600">
                                <p class="text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase">
                                    {{ $label }}</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $value }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- Contact Info --}}
                <section>
                    <h2
                        class="text-lg font-bold text-gray-800 dark:text-gray-200 border-b border-gray-300 dark:border-gray-700 pb-1 mb-3">
                        Contact Details
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @php
                            $contactInfo = [
                                'Email' => $provincialEducationMinistry->email ?? 'N/A',
                                'Phone' => $provincialEducationMinistry->phone ?? 'N/A',
                                'Address' => $provincialEducationMinistry->address ?? 'N/A',
                                'Postal Code' => $provincialEducationMinistry->postal_code ?? 'N/A',
                            ];
                        @endphp
                        @foreach ($contactInfo as $label => $value)
                            <div
                                class="p-2 bg-gray-100 dark:bg-gray-700 rounded-md border border-gray-300 dark:border-gray-600 shadow-inner">
                                <p class="text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase">
                                    {{ $label }}</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    @if ($label === 'Email')
                                        <a href="mailto:{{ $value }}"
                                            class="text-blue-600 dark:text-blue-400 hover:underline">{{ $value }}</a>
                                    @elseif ($label === 'Phone')
                                        <a href="tel:{{ $value }}"
                                            class="text-blue-600 dark:text-blue-400 hover:underline">{{ $value }}</a>
                                    @else
                                        {{ $value }}
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- Location & Administration --}}
                <section>
                    <h2
                        class="text-lg font-bold text-gray-800 dark:text-gray-200 border-b border-gray-300 dark:border-gray-700 pb-1 mb-3">
                        Location & Administration
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @php
                            $locationInfo = [
                                'Latitude' => $provincialEducationMinistry->latitude ?? 'N/A',
                                'Longitude' => $provincialEducationMinistry->longitude ?? 'N/A',
                                'Ministry of Education' => $provincialEducationMinistry->ministryOfEducationOffice->name ?? 'N/A',
                            ];
                        @endphp
                        @foreach ($locationInfo as $label => $value)
                            <div
                                class="p-2 bg-gray-100 dark:bg-gray-700 rounded-md border border-gray-300 dark:border-gray-600">
                                <p class="text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase">
                                    {{ $label }}</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $value }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- Mission & Vision --}}
                <section>
                    <h2
                        class="text-lg font-bold text-gray-800 dark:text-gray-200 border-b border-gray-300 dark:border-gray-700 pb-1 mb-3">
                        Mission & Vision
                    </h2>
                    <div class="space-y-4">
                        <div
                            class="p-4 bg-gray-100 dark:bg-gray-700 rounded-md border border-gray-300 dark:border-gray-600">
                            <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-400 uppercase">Mission</h3>
                            <p class="text-sm text-gray-900 dark:text-gray-100 mt-1">
                                {{ $provincialEducationMinistry->mission ?? 'N/A' }}</p>
                        </div>
                        <div
                            class="p-4 bg-gray-100 dark:bg-gray-700 rounded-md border border-gray-300 dark:border-gray-600">
                            <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-400 uppercase">Vision</h3>
                            <p class="text-sm text-gray-900 dark:text-gray-100 mt-1">
                                {{ $provincialEducationMinistry->vision ?? 'N/A' }}</p>
                        </div>
                    </div>
                </section>

            </div>

        </div>
    </div>
</div>
