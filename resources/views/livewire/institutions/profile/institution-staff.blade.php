<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Staff') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">
            {{ __('View the list of staff members and their appointment details.') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-institutions.layout :institutionid="$institutionId">
        <div class="p-4">
            <h2 class="text-xl font-semibold text-slate-100 mb-4">Staff List</h2>

            <table class="min-w-full w-full text-sm text-left text-slate-300 border border-slate-700">
                <thead class="text-xs uppercase bg-[#1e2a3a] text-slate-100">
                    <tr>
                        <th class="px-4 py-3 border border-slate-600">#</th>
                        <th class="px-4 py-3 border border-slate-600">Employee ID</th>
                        <th class="px-4 py-3 border border-slate-600">Name</th>
                        <th class="px-4 py-3 border border-slate-600">Position</th>
                        <th class="px-4 py-3 border border-slate-600">Service</th>
                        <th class="px-4 py-3 border border-slate-600">Rank</th>
                        <th class="px-4 py-3 border border-slate-600">Service Duration</th>
                        <th class="px-4 py-3 border border-slate-600">Appointment Subject</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffList as $index => $staff)
                        @php
                            $start = \Carbon\Carbon::parse($staff->appoint_date);
                            $duration = $start->diff(now());
                            $teacher = \App\Models\Teacher::with('appointmentSubject')
                                ->where('employee_id', $staff->employee_id)
                                ->first();
                        @endphp
                        <tr class="bg-slate-800 border-b border-slate-700 hover:bg-slate-700">
                            <td class="px-4 py-2 border border-slate-600">{{ $loop->iteration + ($staffList->currentPage() - 1) * $staffList->perPage() }}</td>
                            <td class="px-4 py-2 border border-slate-600">{{ $staff->employee_id }}</td>
                            <td class="px-4 py-2 border border-slate-600">{{ $staff->employee->name_with_initials ?? '-' }}</td>
                            <td class="px-4 py-2 border border-slate-600">{{ $staff->position->name_en ?? '-' }}</td>
                            <td class="px-4 py-2 border border-slate-600">{{ $staff->service->name_en ?? '-' }}</td>
                            <td class="px-4 py-2 border border-slate-600">{{ $staff->rank->name_en ?? '-' }}</td>
                            <td class="px-4 py-2 border border-slate-600">
                                {{ $duration->y }}y {{ $duration->m }}m {{ $duration->d }}d
                            </td>
                            <td class="px-4 py-2 border border-slate-600">
                                {{ $teacher->appointmentSubject->name_en ?? '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $staffList->links('pagination::tailwind') }}
            </div>
        </div>
    </x-institutions.layout>
</section>
