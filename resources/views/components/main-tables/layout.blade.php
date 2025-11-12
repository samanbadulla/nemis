<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>
            {{-- <flux:navlist.item :href="route('main-tables.overview')" :current="request()->routeIs('main-tables.overview')" wire:navigate>{{ __('Overview') }}</flux:navlist.item> --}}
            <flux:navlist.item :href="route('main-tables.authorities')" :current="request()->routeIs('main-tables.authorities')" wire:navigate>{{ __('Authorities') }}</flux:navlist.item>
            <flux:navlist.item :href="route('main-tables.blood-group')" :current="request()->routeIs('main-tables.blood-group')" wire:navigate>{{ __('Blood Groups') }}</flux:navlist.item>
            <flux:navlist.item :href="route('main-tables.city-list')" :current="request()->routeIs('main-tables.city-list')" wire:navigate>{{ __('City List') }}</flux:navlist.item>
            <flux:navlist.item :href="route('main-tables.civil-status')" :current="request()->routeIs('main-tables.civil-status')" wire:navigate>{{ __('Civil Status') }}</flux:navlist.item>
            <flux:navlist.item :href="route('main-tables.district')" :current="request()->routeIs('main-tables.district')" wire:navigate>{{ __('Districts') }}</flux:navlist.item>
            <flux:navlist.item :href="route('main-tables.ds-office')" :current="request()->routeIs('main-tables.ds-office')" wire:navigate>{{ __('DS Offices') }}</flux:navlist.item>
            <flux:navlist.item :href="route('main-tables.education-qualifications')" :current="request()->routeIs('main-tables.education-qualifications')" wire:navigate>{{ __('Education Qualifications') }}</flux:navlist.item>
            <flux:navlist.item :href="route('main-tables.ethnicities')" :current="request()->routeIs('main-tables.ethnicities')" wire:navigate>{{ __('Ethnicities') }}</flux:navlist.item>
            <flux:navlist.item :href="route('main-tables.genders')" :current="request()->routeIs('main-tables.genders')" wire:navigate>{{ __('Genders') }}</flux:navlist.item>
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <div class="mt-5 w-full max-w-6xl">
            {{ $slot }}
        </div>
    </div>
</div>
