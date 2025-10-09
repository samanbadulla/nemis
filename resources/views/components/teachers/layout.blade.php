<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <flux:navlist>
            <flux:navlist.item :href="route('teacher.profile.index', $teacherid)" wire:navigate>{{ __('General') }}</flux:navlist.item>
            <flux:navlist.item :href="route('teacher.profile.qualification', $teacherid)" wire:navigate>{{ __('Qualification') }}</flux:navlist.item>
            <flux:navlist.item :href="route('teacher.profile.employment', $teacherid)" wire:navigate>{{ __('Employment') }}</flux:navlist.item>
            <flux:navlist.item :href="route('teacher.profile.family', $teacherid)" wire:navigate>{{ __('Family') }}</flux:navlist.item>
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretch max-md:pt-6">
        <div class="mt-5 w-full max-w-5xl">
            {{ $slot }}
        </div>
    </div>
</div>
