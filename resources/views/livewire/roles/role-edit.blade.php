<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Edit Role') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Form for edit role') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        <form wire:submit.prevent="updateRole" class="mt-6 max-w-xl space-y-6">

            <flux:field>
                <flux:input label="Role Name" wire:model.defer="role_name" placeholder="Enter role name" />
            </flux:field>

            <flux:checkbox.group wire:model="selectedPermissions" label="Permissions">
                @foreach ($allPermissions as $item)
                    <flux:checkbox label="{{ $item->name }}" value="{{ $item->name }}" />
                @endforeach
            </flux:checkbox.group>

            <div class="flex justify-end">
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

