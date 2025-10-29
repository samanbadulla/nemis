<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('School Profile') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage School profile and settings') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-institutions.layout :institutionid="$id">
            <div>
                <div class="antialiased min-h-screen">

                {{-- Main Card --}}
                <div class="max-w-5xl bg-white dark:bg-gray-800 p-6 rounded-b-lg">

                    {{-- Header --}}
                    <div class="flex items-center space-x-4 mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                        <div
                            class="relative w-20 h-20 sm:w-24 sm:h-24 rounded-lg overflow-hidden border-2 {{ $institution->active_status ? 'border-green-500' : 'border-red-500' }}">

                            @if ($institution->logo)
                                <img src="{{ asset('storage/' . $institution->logo) }}"
                                    alt="{{ $institution->name }}"
                                    class="w-full h-full object-cover {{ $institution->active_status ? '' : 'grayscale opacity-60' }}">
                                @unless ($institution->active_status)
                                    <div
                                        class="absolute inset-0 flex items-center justify-center bg-red-500 bg-opacity-30 text-white text-xs font-bold">
                                        Inactive
                                    </div>
                                @endunless
                            @else
                                <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <div>
                            <h1 class="text-xl font-bold text-gray-900 dark:text-white leading-tight">
                                {{ $institution->name }}
                            </h1>
                            @if ($institution->short_name)
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $institution->short_name }}
                                </p>
                            @endif
                        </div>
                    </div>

                    {{-- Main Content --}}
                    <div class="space-y-6">

                        {{-- Basic Information --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">Basic Information</h2>
                                    <flux:button icon="pencil-square" size="sm" variant="primary">Edit</flux:button>
                                </div>
                                <flux:separator variant="subtle" />
                            </div>
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
                                    <div class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                        <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">{{ $label }}</p>
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $value }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </section>

                        {{-- Contact Information --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">Contact Details</h2>
                                    <flux:button icon="pencil-square" size="sm" variant="primary">Edit</flux:button>
                                </div>
                                <flux:separator variant="subtle" />
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">
                                @php
                                    $contactInfo = [
                                        'Email' => $institution->email,
                                        'Phone' => $institution->phone,
                                        'Address' => $institution->address,
                                        'Postal Code' => $institution->postal_code,
                                    ];
                                @endphp
                                @foreach ($contactInfo as $label => $value)
                                    <div class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                        <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">{{ $label }}</p>
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            @if ($label === 'Email')
                                                <a href="mailto:{{ $value }}" class="text-blue-600 dark:text-blue-400 hover:underline">{{ $value ?? 'N/A' }}</a>
                                            @elseif ($label === 'Phone')
                                                <a href="tel:{{ $value }}" class="text-blue-600 dark:text-blue-400 hover:underline">{{ $value ?? 'N/A' }}</a>
                                            @else
                                                {{ $value ?? 'N/A' }}
                                            @endif
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </section>

                        {{-- Location & Administration --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">Location & Administration</h2>
                                    <flux:button icon="pencil-square" size="sm" variant="primary">Edit</flux:button>
                                </div>
                                <flux:separator variant="subtle" />
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @php
                                    $locationInfo = [
                                        'District' => $institution->district->district_name ?? 'N/A',
                                        'Zone' => $institution->zonalEducationOffice->short_name ?? 'N/A',
                                        'Division' => $institution->divisionalEducationOffice->short_name ?? 'N/A',
                                        'Latitude' => $institution->latitude,
                                        'Longitude' => $institution->longitude,
                                    ];
                                @endphp
                                @foreach ($locationInfo as $label => $value)
                                    <div class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                        <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">{{ $label }}</p>
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $value ?? 'N/A' }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </section>

                        {{-- Mission & Vision --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">Mission & Vision</h2>
                                    <flux:button icon="pencil-square" size="sm" variant="primary">Edit</flux:button>
                                </div>
                                <flux:separator variant="subtle" />
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Mission</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $institution->mission ?? 'N/A' }}</p>
                                </div>
                                <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Vision</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $institution->vision ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </section>

                        {{-- System Hash --}}
                        <section class="pt-4 border-t border-gray-200 dark:border-gray-700">
                            <p class="text-xs font-mono text-gray-500 dark:text-gray-600">
                                **System Key (Hash):** {{ $institution->id }}
                            </p>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </x-institutions.layout>
</section>
