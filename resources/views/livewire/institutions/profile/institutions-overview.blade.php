<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('School Overview') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage School Overview and settings') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-institutions.layout :institutionid="$id">
        Institution Overview
    </x-institutions.layout>
</section>
