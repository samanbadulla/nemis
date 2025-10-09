<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('User list') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage user profile and account') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        <div class="my-4 gap-2 justify-end flex">
            <a href="{{route('users.create')}}">
                Create User
            </a>
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
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                    <img class="h-10 w-10 rounded-full" src="{{ asset('images/user_profile.png') }}" alt="profile picture">
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
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $user->active_status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $user->active_status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                            <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <a href="#" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
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

