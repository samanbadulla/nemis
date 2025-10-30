@props(['officeid'])

<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>
            <flux:navlist.item :href="route('offices.peo.profile.overview', $officeid)" :current="request()->routeIs('offices.peo.profile.overview')" wire:navigate>{{ __('Overview') }}</flux:navlist.item>
            <flux:navlist.item :href="route('offices.peo.profile.profile', $officeid)" :current="request()->routeIs('offices.peo.profile.profile')" wire:navigate>{{ __('Profile') }}</flux:navlist.item>
            <flux:navlist.item :href="route('offices.peo.profile.staff', $officeid)" :current="request()->routeIs('offices.peo.profile.staff')" wire:navigate>{{ __('Staff') }}</flux:navlist.item>
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <div class="mt-5 w-full max-w-5xl">
            {{ $slot }}
        </div>
    </div>
</div>
