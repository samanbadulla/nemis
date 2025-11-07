<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('SLTAS Profile') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage SLTAS profile and settings') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-sltas.layout :sltasid="$id">
        SLTAS Family Information
    </x-sltas.layout>
</section>
