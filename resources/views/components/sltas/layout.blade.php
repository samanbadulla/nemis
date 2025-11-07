<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>
            <flux:navlist.item :href="route('sltas.profile.index', $sltasid)" :current="request()->routeIs('sltas.profile.index')" wire:navigate>{{ __('General') }}</flux:navlist.item>
            <flux:navlist.item :href="route('sltas.profile.qualification', $sltasid)" :current="request()->routeIs('sltas.profile.qualification')" wire:navigate>{{ __('Qualification') }}</flux:navlist.item>
            <flux:navlist.item :href="route('sltas.profile.employment', $sltasid)" :current="request()->routeIs('sltas.profile.employment')" wire:navigate>{{ __('Employment') }}</flux:navlist.item>
            <flux:navlist.item :href="route('sltas.profile.family', $sltasid)" :current="request()->routeIs('sltas.profile.family')" wire:navigate>{{ __('Family') }}</flux:navlist.item>
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <div class="mt-5 w-full max-w-5xl">
            {{ $slot }}
        </div>
    </div>
</div>
