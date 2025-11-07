<section class="w-full">
    <div class="relative mb-8 w-full">
        <flux:heading size="xl" level="1" class="text-gray-900 dark:text-white font-bold">
            {{ __('Staff') }}
        </flux:heading>
        <flux:subheading size="lg" class="mb-6 text-gray-600 dark:text-gray-300">
            {{ __('View the list of staff members and their appointment details.') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-institutions.layout :institutionid="$institutionId">
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

        <div class="bg-white dark:bg-slate-900">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Staff List
                </h2>

                <!-- Optional: Add filters or actions here -->
                <div class="flex items-center space-x-3">
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        Total: {{ $staffList->total() }} staff members
                    </span>
                </div>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-slate-700 shadow-sm">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-slate-700">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-slate-800 dark:to-slate-900">
                        <tr>
                            @foreach (['#', 'Employee ID', 'Name', 'Position', 'Service', 'Rank', 'Service Duration', 'Appointment Subject'] as $head)
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-slate-300 uppercase tracking-wider border-r border-gray-200 dark:border-slate-600 last:border-r-0">
                                <div class="flex items-center space-x-1">
                                    <span>{{ $head }}</span>
                                    <!-- Optional: Add sort icons -->
                                </div>
                            </th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody class="bg-white dark:bg-slate-800 divide-y divide-gray-200 dark:divide-slate-700">
                        @foreach ($staffList as $staff)
                            @php
                                $start = \Carbon\Carbon::parse($staff->appoint_date);
                                $duration = $start->diff(now());
                                $teacher = \App\Models\Teacher::with('appointmentSubject')
                                            ->where('employee_id', $staff->employee_id)
                                            ->first();
                            @endphp
                            <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors duration-200 group">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white border-r border-gray-200 dark:border-slate-600 last:border-r-0">
                                    <span class="inline-flex items-center justify-center w-6 h-6 bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 rounded-full text-xs font-medium">
                                        {{ $loop->iteration + ($staffList->currentPage() - 1) * $staffList->perPage() }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-700 dark:text-slate-300 border-r border-gray-200 dark:border-slate-600 last:border-r-0">
                                    <span class="font-semibold text-gray-900 dark:text-white">
                                        {{ $staff->employee->nic }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white border-r border-gray-200 dark:border-slate-600 last:border-r-0">
                                    <div class="flex items-center space-x-3">
                                        <span class="font-medium">{{ $staff->employee->name_with_initials ?? '-' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-slate-300 border-r border-gray-200 dark:border-slate-600 last:border-r-0">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-green-800 dark:text-green-300">
                                        {{ $staff->position->position_name ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-slate-300 border-r border-gray-200 dark:border-slate-600 last:border-r-0">
                                    {{ $staff->service->service_name ?? '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-slate-300 border-r border-gray-200 dark:border-slate-600 last:border-r-0">
                                    <span class="font-medium text-gray-900 dark:text-white">
                                        {{ $staff->rank->rank_name ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-slate-300 border-r border-gray-200 dark:border-slate-600 last:border-r-0">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 border border-blue-200 dark:border-blue-800">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $duration->y }}y {{ $duration->m }}m {{ $duration->d }}d
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-slate-300">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-300">
                                        {{ $teacher->appointmentSubject->name_en ?? '-' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    Showing {{ $staffList->firstItem() ?? 0 }} to {{ $staffList->lastItem() ?? 0 }} of {{ $staffList->total() }} results
                </div>
                <div class="flex items-center space-x-2">
                    {{ $staffList->links('pagination::tailwind') }}
                </div>
            </div>

            <!-- Empty State -->
            @if($staffList->count() === 0)
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">No staff members found</h3>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">No staff members are currently assigned to this institution.</p>
            </div>
            @endif
        </div>
    </x-institutions.layout>
</section>
