<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky
        stashable
        class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900"
            x-data="{
            openGroup: null,
            toggleGroup(name) {
                this.openGroup = this.openGroup === name ? null : name;
                localStorage.setItem('openGroup', this.openGroup);
            },
            init() {
                const saved = localStorage.getItem('openGroup');

                // detect if it's the user's first ever visit
                if (!localStorage.getItem('hasVisitedBefore')) {
                    // first visit → collapse all
                    this.openGroup = null;
                    localStorage.setItem('hasVisitedBefore', 'true');
                    localStorage.removeItem('openGroup');
                } else if (saved) {
                    // not first visit → restore previously open group
                    this.openGroup = saved;
                }
            }
        }"
        x-init="init()"
    >
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Platform')" class="grid">
                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                    wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                @role('super admin')
                <flux:navlist.item icon="link-slash" :href="route('roles.index')"
                    :current="request()->routeIs('roles.index')" wire:navigate>{{ __('Roles') }}</flux:navlist.item>

                <flux:navlist.item icon="shield-exclamation" :href="route('main-tables.overview')"
                    :current="request()->routeIs('main-tables.overview')" wire:navigate>{{ __('Main Tables') }}</flux:navlist.item>
                @endrole
                <flux:navlist.item icon="users" :href="route('users.index')" :current="request()->routeIs('users.index')" wire:navigate>{{ __('Users') }}</flux:navlist.item>
                <flux:navlist.item icon="home-modern" :href="route('institutions.index')" :current="request()->routeIs('institutions.index')" wire:navigate>{{ __('Institutions') }}</flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group
                expandable
                heading="Offices"
                class="grid"
                x-bind:open="openGroup === 'offices'"
                x-on:click.stop="toggleGroup('offices')"
            >
                <flux:navlist.item icon="squares-2x2" :href="route('offices.index')" :current="request()->routeIs('offices.index')" wire:navigate>
                    {{ __('Overview') }}
                </flux:navlist.item>
                <flux:navlist.item icon="building-library" :href="route('offices.moe.list')" :current="request()->routeIs('offices.moe.list')" wire:navigate>
                    {{ __('Education Ministries') }}
                </flux:navlist.item>
                <flux:navlist.item icon="building-library" :href="route('offices.pmoe.list')" :current="request()->routeIs('offices.pmoe.list')" wire:navigate>
                    {{ __('Provincial Ministries') }}
                </flux:navlist.item>
                <flux:navlist.item icon="building-office" :href="route('offices.peo.list', 0)" :current="request()->routeIs('offices.peo.list')" wire:navigate>
                    {{ __('Provincial Offices') }}
                </flux:navlist.item>
                <flux:navlist.item icon="building-office" :href="route('offices.zeo.list')" :current="request()->routeIs('offices.zeo.list')" wire:navigate>
                    {{ __('Zonal Offices') }}
                </flux:navlist.item>
                <flux:navlist.item icon="building-office" :href="route('offices.deo.list')" :current="request()->routeIs('offices.deo.list')" wire:navigate>
                    {{ __('Divisional Offices') }}
                </flux:navlist.item>
            </flux:navlist.group>


            <flux:navlist.group
                expandable
                heading="Employers"
                class="grid"
                x-bind:open="openGroup === 'employers'"
                x-on:click.stop="toggleGroup('employers')"
            >
                <flux:navlist.item icon="academic-cap" :href="route('teacher.list')" :current="request()->routeIs('teacher.list')" wire:navigate>
                    {{ __('Teachers') }}
                </flux:navlist.item>
                <flux:navlist.item icon="academic-cap" :href="route('principal.list')" :current="request()->routeIs('principal.list')" wire:navigate>
                    {{ __('Principals') }}
                </flux:navlist.item>
                <flux:navlist.item icon="users" :href="route('sleas.list')" :current="request()->routeIs('sleas.list')"  wire:navigate>
                    {{ __('Edu. Administrators') }}
                </flux:navlist.item>
                <flux:navlist.item icon="users" :href="route('sltes.list')" :current="request()->routeIs('sltes.list')" wire:navigate>
                    {{ __('Teacher Educators') }}
                </flux:navlist.item>
                <flux:navlist.item icon="users" :href="route('sltas.list')" :current="request()->routeIs('sltas.list')"  wire:navigate>
                    {{ __('Teacher Advisers') }}
                </flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.item icon="clipboard-document" :href="route('subjects.apointed')" :current="request()->routeIs('subjects.apointed')" wire:navigate>{{ __('Apoinment subjects') }}</flux:navlist.item>
            <flux:navlist.item icon="clipboard-document-list" :href="route('subjects.teaching')" :current="request()->routeIs('subjects.teaching')" wire:navigate>{{ __('Teaching subjects') }}</flux:navlist.item>


        </flux:navlist>

        <flux:spacer />

        <flux:navlist variant="outline">
            <flux:navlist.item icon="folder-git-2" href="#"
                target="_blank">
                {{ __('Circular') }}
            </flux:navlist.item>

            <flux:navlist.item icon="book-open-text" href="#"
                target="_blank">
                {{ __('Documentation') }}
            </flux:navlist.item>
        </flux:navlist>

        <!-- Desktop User Menu -->
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon:trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                        {{ __('Settings') }}</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                        {{ __('Settings') }}</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>
