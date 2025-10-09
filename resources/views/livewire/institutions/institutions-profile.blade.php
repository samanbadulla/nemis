<div>
    <div class="container max-w-7xl px-4 py-6 antialiased min-h-screen">

        {{-- Main Card (Light/Dark) --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl">

            {{-- Header: Logo, Name, Short Name --}}
            <div class="flex items-center space-x-6 mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                <div
                    class="w-20 h-20 sm:w-24 sm:h-24 rounded-full overflow-hidden border-2 shadow-md flex-shrink-0 {{ $institution->active_status ? 'border-green-500' : 'border-red-500' }}">

                    @if ($institution->logo)
                        <img src="{{ asset('storage/' . $institution->logo) }}" alt="{{ $institution->name }}"
                            class="w-full h-full object-cover {{ $institution->active_status ? '' : 'filter grayscale opacity-60' }}">

                        @if (!$institution->active_status)
                            <div
                                class="absolute inset-0 flex items-center justify-center bg-red-500 bg-opacity-25 rounded-full">
                                <span class="text-xs text-white font-bold">Inactive</span>
                            </div>
                        @endif
                    @else
                        {{-- Default Icon --}}
                        <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                    @endif
                </div>

                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white leading-tight">
                        {{ $institution->name }}
                    </h1>
                    @if ($institution->short_name)
                        <p class="text-base text-gray-500 dark:text-gray-400 font-medium mt-1">
                            {{ $institution->short_name }}
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
                                'Workplace ID' => $institution->workplace_id,
                                'Census No' => $institution->census_no,
                                'Category' => $institution->institutionCategory->institution_category_name ?? 'N/A',
                                'Authority' => $institution->authority->authority_name ?? 'N/A',
                                'Established Year' => $institution->established_year ?? 'N/A',
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
                                'Email' => $institution->email,
                                'Phone' => $institution->phone,
                                'Address' => $institution->address,
                                'Postal Code' => $institution->postal_code,
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
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                        @php
                            $locationInfo = [
                                'District' => $institution->district->district_name ?? 'N/A',
                                'Zone' => $institution->zonalEducationOffice->short_name ?? 'N/A',
                                'Division' => $institution->divisionalEducationOffice->short_name ?? 'N/A',
                                'Police Station' => $institution->police_station_id,
                                'MOH Area' => $institution->moh_area_id,
                                'Latitude' => $institution->latitude,
                                'Longitude' => $institution->longitude,
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

                {{-- Other Info --}}
                <section>
                    <h2
                        class="text-lg font-bold text-gray-800 dark:text-gray-200 border-b border-gray-300 dark:border-gray-700 pb-1 mb-3">
                        Classification Details
                    </h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                        @php
                            $otherInfo = [
                                'Language' => $institution->institutionLanguages->name ?? 'N/A',
                                'Gender' => $institution->typeByGender->name ?? 'N/A',
                                'Type' => $institution->institutionType->institution_types_name ?? 'N/A',
                                'Grade Span' => $institution->gradeSpan->grade_span_name ?? 'N/A',
                            ];
                        @endphp
                        @foreach ($otherInfo as $label => $value)
                            <div
                                class="p-2 bg-gray-200 dark:bg-gray-900 rounded-md text-center border border-gray-300 dark:border-gray-600">
                                <p class="text-xs font-bold text-gray-700 dark:text-gray-400 uppercase tracking-wider">
                                    {{ $label }}</p>
                                <p class="text-base font-extrabold text-gray-900 dark:text-white mt-0">
                                    {{ $value }}</p>
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
                                {{ $institution->mission ?? 'N/A' }}</p>
                        </div>
                        <div
                            class="p-4 bg-gray-100 dark:bg-gray-700 rounded-md border border-gray-300 dark:border-gray-600">
                            <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-400 uppercase">Vision</h3>
                            <p class="text-sm text-gray-900 dark:text-gray-100 mt-1">
                                {{ $institution->vision ?? 'N/A' }}</p>
                        </div>
                    </div>
                </section>

            </div>

        </div>
    </div>
</div>
