<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Edit Role') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Form for edit role') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        <form wire:submit.prevent="updateRole" class="mt-6 w-full space-y-6">

            
            <flux:field class=" max-w-xl">
                <flux:input label="Role Name" wire:model.defer="role_name" placeholder="Enter role name" />
            </flux:field>
            <flux:separator variant="subtle" />
            <flux:checkbox.group wire:model="selectedPermissions" label="Permissions">
                <div class="grid md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-2">
                @foreach ($allPermissions as $item)
                    <flux:checkbox label="{{ $item->name }}" value="{{ $item->name }}" />
                @endforeach
                </div>
            </flux:checkbox.group>

            <flux:separator variant="subtle" />
            <div class="flex justify-start">
                <flux:button type="submit" variant="primary">
                    Save
                </flux:button>
            </div>
        </form>

        @if (session()->has('success'))
            <div class="mt-4 text-success">
                {{ session('success') }}
            </div>
        @endif

    </div>
</div>

