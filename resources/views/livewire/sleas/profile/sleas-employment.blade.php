<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('SLEAS Profile') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage SLEAS profile and settings') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-sleas.layout :sleasid="$id">
        SLEAS Employeement Information
    </x-sleas.layout>
</section>
