<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('User list') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage user profile and account') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        <div class="my-6 flex items-center justify-end gap-3">
            @can('create user')
                {{-- Create User Button (Permission Based) --}}
                <a href="{{ route('users.create') }}">
                    <flux:button icon="plus" color="primary"
                        class="px-4 py-2 font-medium shadow-sm transition-all hover:shadow-md">
                        Create new user
                    </flux:button>
                </a>
            @endcan
        </div>

        <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Contact
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Role
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{ asset('images/user_profile.png') }}"
                                        alt="profile picture">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $user->name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        NIC: {{ $user->nic }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $user->contact }}</div>
                            <div class="text-sm text-gray-500">{{ $user->department }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->roles->pluck('name')->join(', ') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $user->active_status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $user->active_status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium justify-end flex gap-1">
                            @can('user edit')
                                <a href="{{ route('users.edit', $user->id) }}">
                                    <flux:button size="sm" icon="pencil-square"></flux:button>
                                </a>
                            @endcan

                            @can('user password reset')
                                <flux:button wire:click="resetPassword({{ $user->id }})"
                                    wire:confirm="Are you sure you want to reset this user's password?" size="sm"
                                    icon="key">
                                </flux:button>
                            @endcan

                            @can('user status change')
                                <flux:button wire:click="toggleStatus({{ $user->id }})"
                                    wire:confirm="Are you sure you want to {{ $user->active_status == '1' ? 'deactivate' : 'activate' }} this user?"
                                    size="sm" icon="{{ $user->active_status == '1' ? 'no-symbol' : 'check' }}"
                                    variant="{{ $user->active_status == '1' ? 'danger' : 'primary' }}">
                                </flux:button>
                            @endcan

                            @can('user delete')
                                <flux:button wire:click="deleteUser({{ $user->id }})"
                                    wire:confirm="Are you sure you want to delete this user?" size="sm" icon="trash"
                                    variant="danger">
                                </flux:button>
                            @endcan

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="mt-4 mx-10">
            {{ $users->links() }}
        </div>

    </div>
</div>
