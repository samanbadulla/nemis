<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Roles list') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage role profiles and permissions') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        <div class="my-4 gap-2 justify-end flex">
            <a href="{{ route('roles.create') }}">
                Create Role
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
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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

                        <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                            <a href="{{ route('roles.edit', $role->id) }}"
                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <button wire:click="delete({{ $role->id }})"
                                wire:confirm="Are you sure you want to delete this role?"
                                class="ml-2 text-red-600 hover:text-red-900">Delete</button>
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
