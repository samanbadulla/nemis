<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Ministry of Education Overview') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">
            {{ __('Statistics about education offices and student totals.') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-offices.moe.layout :officeId="$officeId">
        {{-- <div class="flex items-center space-x-4 mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
            <div
                class="relative w-20 h-20 sm:w-24 sm:h-24 rounded-lg overflow-hidden border-2 {{ $EducationMinistry->active_status ? 'border-green-500' : 'border-red-500' }}">

                @if ($EducationMinistry->logo)
                    <img src="{{ asset('storage/' . $EducationMinistry->logo) }}"
                        alt="{{ $EducationMinistry->name }}"
                        class="w-full h-full object-cover {{ $EducationMinistry->active_status ? '' : 'grayscale opacity-60' }}">
                    @unless ($EducationMinistry->active_status)
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
                                d="M9 21V8a1 1 0 011-1h4a1 1 0 011 1v13M5 21V11a1 1 0 011-1h12a1 1 0 011 1v10M3 21h18" />
                        </svg>
                    </div>
                @endif
            </div>

            <div>
                <h1 class="text-xl font-bold text-gray-900 dark:text-white leading-tight">
                    {{ $EducationMinistry->name }}
                </h1>
                @if ($EducationMinistry->short_name)
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ $EducationMinistry->short_name }}
                    </p>
                @endif
            </div>
        </div> --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="rounded-lg p-4 shadow border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <div class="text-3xl font-bold text-slate-900 dark:text-white">{{ $studentCount }}</div>
                <div class="text-sm text-slate-600 dark:text-slate-300">Students</div>
                <div class="text-xs text-slate-400 dark:text-slate-500">Total Students Nationwide</div>
            </div>

            <div class="rounded-lg p-4 shadow border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <div class="text-3xl font-bold text-slate-900 dark:text-white">{{ $provincialMinistryCount }}</div>
                <div class="text-sm text-slate-600 dark:text-slate-300">Provincial Ministries</div>
                <div class="text-xs text-slate-400 dark:text-slate-500">Ministry Offices Count</div>
            </div>

            <div class="rounded-lg p-4 shadow border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <div class="text-3xl font-bold text-slate-900 dark:text-white">{{ $provincialDeptCount }}</div>
                <div class="text-sm text-slate-600 dark:text-slate-300">Provincial Departments</div>
                <div class="text-xs text-slate-400 dark:text-slate-500">Education Departments</div>
            </div>

            <div class="rounded-lg p-4 shadow border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <div class="text-3xl font-bold text-slate-900 dark:text-white">{{ $zonalOfficeCount }}</div>
                <div class="text-sm text-slate-600 dark:text-slate-300">Zonal Offices</div>
                <div class="text-xs text-slate-400 dark:text-slate-500">Zonal Education Offices</div>
            </div>

            <div class="rounded-lg p-4 shadow border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <div class="text-3xl font-bold text-slate-900 dark:text-white">{{ $divisionCount }}</div>
                <div class="text-sm text-slate-600 dark:text-slate-300">Divisional Offices</div>
                <div class="text-xs text-slate-400 dark:text-slate-500">Divisions under Zones</div>
            </div>
        </div>

        <h2 class="text-lg font-semibold text-slate-900 dark:text-white mt-8 mb-2">Staff by Service</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            @foreach ($serviceCounts as $service)
                <div class="rounded-lg p-4 shadow border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                    <div class="text-3xl font-bold text-slate-900 dark:text-white">{{ $service->staff_count }}</div>
                    <div class="text-sm text-slate-600 dark:text-slate-300">{{ $service->service_name }}</div>
                    <div class="text-xs text-slate-400 dark:text-slate-500">Total Staff in this Service</div>
                </div>
            @endforeach
        </div>
    </x-offices.moe.layout>
</section>
