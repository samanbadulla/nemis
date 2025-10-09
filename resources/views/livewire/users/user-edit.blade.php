<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('User Update') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Update user profile and account') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        <div class="my-4 gap-2 justify-end flex">
            
        </div>

        <form method="POST" wire:submit="userUpdate" class="mt-6 max-w-xl space-y-6" >
            <!-- Name -->
            <flux:input wire:model.live="name" :label="__('Name')" type="text"  autofocus autocomplete="name"
                :placeholder="__('Full name')" />

            <!-- Email Address -->
            <flux:input wire:model.live="nic" :label="__('National identity card')" type="nic" 
                autocomplete="nic" placeholder="Your NIC number" />

            <!-- Email Address -->
            <flux:input wire:model.live="contact" :label="__('Contacn Number')" type="contact" 
                autocomplete="contact" placeholder="Your Mobile Number" />

            <!-- Email Address -->
            <flux:input wire:model.live="email" :label="__('Email address')" type="email"  autocomplete="email"
                placeholder="email@example.com" />

            <flux:checkbox.group wire:model.live="roles" label="Role">
                @foreach ($allRole as $role)
                    <flux:checkbox label="{{ $role->name }}" value="{{ $role->name }}" />
                @endforeach
            </flux:checkbox.group>

            <div class="flex items-center justify-end">
                <flux:button type="submit" variant="primary" class="w-full">
                    {{ __('Create User') }}
                </flux:button>
            </div>
        </form>

    </div>
</div>
