<div class="container mx-auto px-4 py-6 antialiased">
    <div class="bg-white rounded-xl p-6 dark:bg-gray-800">
        
        {{-- Header --}}
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 border-b border-gray-200 dark:border-gray-700 pb-2 mb-4">
            Sri Lanka Education System Office Hierarchy
        </h2>

        {{-- Hierarchy Display --}}
        <div class="flex flex-col space-y-4">
            @foreach ($officeHierarchy as $index => $level)
                @php
                    $label = 'Level ' . ($index + 1);
                    if ($index === 0) $label = 'Central Policy';
                    elseif ($index === count($officeHierarchy) - 1) $label = 'Service Point';
                @endphp

                <div class="flex items-center space-x-4">
                    {{-- Arrow between levels --}}
                    @if ($index > 0)
                        <div class="flex flex-col items-center w-6 h-6">
                            <svg class="w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </div>
                    @else
                        <div class="w-6 h-6"></div>
                    @endif

                    {{-- Office Level Card --}}
                    <div
                        class="flex-1 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-sm border-l-4 border-blue-400 dark:border-blue-600 hover:shadow-md">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $level->office_level_name }}
                                </p>
                                <p class="text-xs text-gray-600 dark:text-gray-300 mt-1">
                                    Workplaces: {{ $level->workplaces_count }}
                                </p>
                            </div>
                            <span
                                class="text-xs bg-gray-300 dark:bg-gray-600 font-medium uppercase tracking-widest px-2 py-0.5 rounded-full">
                                {{ $label }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Note --}}
        <p class="mt-6 text-xs text-gray-500 dark:text-gray-400 border-t border-gray-100 dark:border-gray-800 pt-3">
            Note: The Ministry of Education (MOE) operates at the central level. Provincial, Zonal, and Divisional
            offices represent decentralized administrative tiers.
        </p>
    </div>
</div>
