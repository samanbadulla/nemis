<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Provincial Department Of Education Overview') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">
            {{ __('Statistics about provincial education structure and staff distribution.') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-offices.peo.layout :officeid="$officeId">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="rounded-lg p-4 shadow border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <div class="text-3xl font-bold text-slate-900 dark:text-white">{{ $studentCount }}</div>
                <div class="text-sm text-slate-600 dark:text-slate-300">Students</div>
                <div class="text-xs text-slate-400 dark:text-slate-500">Estimated Total Students</div>
            </div>

            <div class="rounded-lg p-4 shadow border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <div class="text-3xl font-bold text-slate-900 dark:text-white">{{ $provincialDeptCount }}</div>
                <div class="text-sm text-slate-600 dark:text-slate-300">Provincial Departments</div>
                <div class="text-xs text-slate-400 dark:text-slate-500">Departments under PMOE</div>
            </div>

            <div class="rounded-lg p-4 shadow border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <div class="text-3xl font-bold text-slate-900 dark:text-white">{{ $zonalOfficeCount }}</div>
                <div class="text-sm text-slate-600 dark:text-slate-300">Zonal Offices</div>
                <div class="text-xs text-slate-400 dark:text-slate-500">Zones under Provinces</div>
            </div>

            <div class="rounded-lg p-4 shadow border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <div class="text-3xl font-bold text-slate-900 dark:text-white">{{ $divisionCount }}</div>
                <div class="text-sm text-slate-600 dark:text-slate-300">Divisional Offices</div>
                <div class="text-xs text-slate-400 dark:text-slate-500">Divisions under Zones</div>
            </div>

            <div class="rounded-lg p-4 shadow border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <div class="text-3xl font-bold text-slate-900 dark:text-white">{{ $institutionCount }}</div>
                <div class="text-sm text-slate-600 dark:text-slate-300">Institutions</div>
                <div class="text-xs text-slate-400 dark:text-slate-500">Schools under Divisions</div>
            </div>
        </div>

        <h2 class="text-lg font-semibold text-slate-900 dark:text-white mt-8 mb-2">Staff by Service</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            @foreach ($serviceCounts as $service)
                <div class="rounded-lg p-4 shadow border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                    <div class="text-3xl font-bold text-slate-900 dark:text-white">{{ $service['staff_count'] }}</div>
                    <div class="text-sm text-slate-600 dark:text-slate-300">{{ $service['name_en'] }}</div>
                    <div class="text-xs text-slate-400 dark:text-slate-500">Total Staff in this Service</div>
                </div>
            @endforeach
        </div>
    </x-offices.peo.layout>
</section>
