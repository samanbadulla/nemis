<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>
            <flux:navlist.item :href="route('institutions.profile.overview',$institutionid)" :current="request()->routeIs('institutions.profile.overview')" wire:navigate>{{ __('Overview') }}</flux:navlist.item>
            @can('view institutions profile profile')
                <flux:navlist.item :href="route('institutions.profile.profile',$institutionid)" :current="request()->routeIs('institutions.profile.profile')" wire:navigate>{{ __('Profile') }}</flux:navlist.item>
            @endcan

            @can('view institutions profile staff')
                <flux:navlist.item :href="route('institutions.profile.staff',$institutionid)" :current="request()->routeIs('institutions.profile.staff')" wire:navigate>{{ __('Staff') }}</flux:navlist.item>
            @endcan

        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <div class="mt-5 w-full max-w-5xl">
            {{ $slot }}
        </div>
    </div>
</div>
