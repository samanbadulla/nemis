<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('SLTES Profile') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage SLTES profile and settings') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-sltes.layout :sltesid="$id">
        SLTES Employment Information
    </x-sltes.layout>
</section>
