<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Roles list') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage role profiles and permissions') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        <div class="my-6 flex items-center justify-end gap-3">
            {{-- Create Teacher Button (Permission Based) --}}
            <a href="{{ route('roles.create') }}">
                <flux:button icon="plus" color="primary"
                    class="px-4 py-2 font-medium shadow-sm transition-all hover:shadow-md">
                    Create new role
                </flux:button>
            </a>
        </div>


        @if (session('message'))
            <div class="mt-4 text-success">
                {{ session('message') }}
            </div>
        @endif


        <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        #
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Role
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Permissions
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($roles as $role)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                {{ $role->id }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                {{ $role->name }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($role->permissions->count())
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($role->permissions as $permission)
                                        <flux:badge class="mt-1">{{ $permission->name }}</flux:badge>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-gray-400 text-sm">No permissions</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium justify-end flex gap-1">
                            <a href="{{ route('roles.edit', $role->id) }}">
                                <flux:button size="sm" icon="pencil-square">Edit</flux:button>
                            </a>
                            <flux:button wire:click="delete({{ $role->id }})"
                                wire:confirm="Are you sure you want to delete this role?" 
                                size="sm" icon="trash" variant="danger">
                                Delete
                            </flux:button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $roles->links() }}
        </div>
    </div>
</div>
