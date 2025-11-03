<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>
            <flux:navlist.item :href="route('sltes.profile.index', $sltesid)" :current="request()->routeIs('sltes.profile.index')" wire:navigate>{{ __('General') }}</flux:navlist.item>
            <flux:navlist.item :href="route('sltes.profile.qualification', $sltesid)" :current="request()->routeIs('sltes.profile.qualification')" wire:navigate>{{ __('Qualification') }}</flux:navlist.item>
            <flux:navlist.item :href="route('sltes.profile.employment', $sltesid)" :current="request()->routeIs('sltes.profile.employment')" wire:navigate>{{ __('Employment') }}</flux:navlist.item>
            <flux:navlist.item :href="route('sltes.profile.family', $sltesid)" :current="request()->routeIs('sltes.profile.family')" wire:navigate>{{ __('Family') }}</flux:navlist.item>
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <div class="mt-5 w-full max-w-5xl">
            {{ $slot }}
        </div>
    </div>
</div>
