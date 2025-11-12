<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>
            <flux:navlist.item :href="route('teacher.profile.index', $teacherid)" :current="request()->routeIs('teacher.profile.index')" wire:navigate>{{ __('General') }}</flux:navlist.item>

            @can('view teachers profile qualification')
                <flux:navlist.item :href="route('teacher.profile.qualification', $teacherid)" :current="request()->routeIs('teacher.profile.qualification')" wire:navigate>{{ __('Qualification') }}</flux:navlist.item>
            @endcan

            @can('view teachers profile employment')
                <flux:navlist.item :href="route('teacher.profile.employment', $teacherid)" :current="request()->routeIs('teacher.profile.employment')" wire:navigate>{{ __('Employment') }}</flux:navlist.item>
            @endcan

            @can('view teachers profile family')
                <flux:navlist.item :href="route('teacher.profile.family', $teacherid)" :current="request()->routeIs('teacher.profile.family')" wire:navigate>{{ __('Family') }}</flux:navlist.item>
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
