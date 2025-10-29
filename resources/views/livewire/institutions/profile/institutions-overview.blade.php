<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('School Overview') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage School Overview and settings') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-institutions.layout :institutionid="$id">


            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="bg-blue-950 text-white rounded-lg p-4">
                <div class="text-3xl font-bold">{{ $studentCount }}</div>
                <div class="text-sm">Students</div>
                <div class="text-xs">Total: {{ $studentCount }}</div>
                <div class="mt-2 text-sm text-white/80">More info →</div>
            </div>

            <div class="bg-blue-950 text-white rounded-lg p-4">
                <div class="text-3xl font-bold">{{ $staffCount }}</div>
                <div class="text-sm">Staff</div>
                <div class="text-xs">Total: {{ $staffCount }}</div>
                <div class="mt-2 text-sm text-white/80">More info →</div>
            </div>

            <div class="bg-blue-950 text-white rounded-lg p-4">
                <div class="text-3xl font-bold">{{ $parentCount }}</div>
                <div class="text-sm">Parents/Guardians</div>
                <div class="text-xs">Total: {{ $parentCount }}</div>
                <div class="mt-2 text-sm text-white/80">More info →</div>
            </div>
        </div>


    </x-institutions.layout>
</section>
