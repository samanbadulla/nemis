<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('SLTAS Profile') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage SLTAS profile and settings') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <x-sltas.layout :sltasid="$id">
        <div>
            <div class="antialiased min-h-screen">

                {{-- Main Dual-Mode Card (Read-Only Container) --}}
                <div class="bg-white dark:bg-gray-800 p-4 rounded-b-lg">

                    {{-- Profile Header --}}
                    <div class="flex items-center space-x-4 mb-6 pb-4 border-b border-gray-200 dark:border-gray-700">
                        @if ($people->gender_id == 'G02')
                            <img src="{{ asset('images/profile_f.png') }}" alt="Profile"
                                class="w-16 h-16 rounded-lg object-cover border-2 border-gray-300 dark:border-gray-600 flex-shrink-0" />
                        @else
                            <img src="{{ asset('images/profile_m.png') }}" alt="Profile"
                                class="w-16 h-16 rounded-lg object-cover border-2 border-gray-300 dark:border-gray-600 flex-shrink-0" />
                        @endif
                        <div>
                            <h1 class="text-xl font-bold text-gray-900 dark:text-white leading-tight">
                                {{ $people->title->title_name }} {{ $people->name_with_initials }}
                            </h1>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                NIC: {{ $people->nic }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                EmployID: {{ $people->people_id }}
                            </p>
                        </div>
                    </div>

                    {{-- Main Content Grid --}}
                    <div class="space-y-6">

                        {{-- 1. Personal & Socio-Cultural Details --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                        Current Employment
                                    </h2>
                                    <flux:button icon="pencil-square" size="sm" variant="primary">Edit
                                    </flux:button>
                                </div>
                                <flux:separator variant="subtle" />
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-4">

                                {{-- Religion --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Service
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principalAppointment->service->service_name }}</p>
                                </div>

                                {{-- Ethnicity --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">
                                        First Service Rank</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principalAppointment->rank->rank_name }}</p>
                                </div>

                            </div>

                        </section>

                        {{-- 1. Personal & Socio-Cultural Details --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                        Current working place
                                    </h2>
                                </div>
                                <flux:separator variant="subtle" />
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">

                                {{-- Full Name --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">
                                        Institution name</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        [{{ $principalAppointment->workplace->office()->census_no ?? 'N/A' }}]
                                        {{ $principalAppointment->workplace->office()->name ?? 'N/A' }}</p>
                                </div>
                                {{-- Name with Initials --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Apoint
                                        Date</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principalAppointment->appoint_date }}</p>
                                </div>
                            </div>

                            {{-- Full Address Block --}}
                            <div
                                class="mt-4 p-3 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                                <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Address</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $principalAppointment->workplace->office()->address }}<br>
                                </p>
                            </div>

                        </section>

                        {{-- 1. Personal & Socio-Cultural Details --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                        First Employment
                                    </h2>
                                    <flux:button icon="pencil-square" size="sm" variant="primary">Edit
                                    </flux:button>
                                </div>
                                <flux:separator variant="subtle" />
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-4">
                                {{-- DOB --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">
                                        appointment ID
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principalAppointment->appointment_id }}</p>
                                </div>
                                {{-- DOB --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">First
                                        appointment date
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principalAppointment->appointment->first_appointment_date->format('d-m-Y') }}
                                    </p>
                                </div>

                                {{-- DOB --}}
                                <div
                                    class="p-2 bg-gray-50 dark:bg-gray-700 rounded-md border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">
                                        Appointment Letter No
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principalAppointment->appointment_letter_no }}</p>
                                </div>

                                {{-- Religion --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Service
                                    </p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principalAppointment->appointment->service->service_name }}</p>
                                </div>

                                {{-- Ethnicity --}}
                                <div
                                    class="p-2 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-200 dark:border-gray-600">
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">
                                        First Service Rank</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $principalAppointment->appointment->rank->rank_name }}</p>
                                </div>

                            </div>

                        </section>



                        {{-- 1. Personal & Socio-Cultural Details --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                        Previous Service-related information
                                    </h2>
                                    <flux:modal.trigger name="add-service-record">
                                        <flux:button icon="plus" size="sm" variant="primary">Previous Record
                                        </flux:button>
                                    </flux:modal.trigger>
                                </div>
                            </div>
                            <div class="bg-white">

                                {{-- Responsive Table Container --}}
                                <div class="overflow-x-auto">
                                    {{-- Table Structure --}}
                                    <table class="min-w-full divide-y divide-gray-200">

                                        {{-- Table Header --}}
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Position
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Service
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Grade/Rank
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Start Date
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    End date
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>

                                        {{-- Table Body (Using Blade for dynamic data) --}}
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            {{-- Example static data for demonstration. In Blade, you'd use @foreach ($qualifications as $qualification) --}}

                                            {{-- Row 1: Master's Degree --}}
                                            @forelse ($serviceUpdate->where('updated_type', '!=', '1') as $item)
                                                <tr class="hover:bg-indigo-50/50">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $item->position->position_name }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $item->service->service_name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                        {{ $item->rank->rank_name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                        {{ $item->appoint_date }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">
                                                        {{ $item->end_date }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold justify-end flex gap-1">
                                                        {{-- Delete button triggers Livewire method --}}
                                                        <flux:button icon="trash" variant="subtle" size="sm"
                                                            wire:click="deleteServiceRecord({{ $item->id }})"
                                                            onclick="confirm('Are you sure you want to delete this record?') || event.stopImmediatePropagation()" />
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6"
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 text-center">
                                                        No previous service records found.
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </section>

                        {{-- 1. Personal & Socio-Cultural Details --}}
                        <section>
                            <div class="mb-3">
                                <div class="flex items-baseline justify-between py-2">
                                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                                        Previous working place
                                    </h2>
                                </div>
                            </div>
                            <div class="bg-white">

                                {{-- Responsive Table Container --}}
                                <div class="overflow-x-auto">
                                    {{-- Table Structure --}}
                                    <table class="min-w-full divide-y divide-gray-200">

                                        {{-- Table Header --}}
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Institution Name (Schools)
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Address
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Appointed date
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Release date
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>

                                        {{-- Table Body (Using Blade for dynamic data) --}}
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($serviceUpdate->where('updated_type', '==', 1) as $item)
                                                <tr class="hover:bg-indigo-50/50">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $item->workplace->office_name ?? 'N/A' }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $item->position->position_name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                        {{ $item->appoint_date }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">
                                                        {{ $item->end_date }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold justify-end flex gap-1">
                                                        {{-- Delete button triggers Livewire method --}}
                                                        <flux:button icon="trash" variant="subtle" size="sm"
                                                            wire:click="deleteServiceRecord({{ $item->id }})"
                                                            onclick="confirm('Are you sure you want to delete this record?') || event.stopImmediatePropagation()" />
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5"
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 text-center">
                                                        No previous working place records found.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </section>

                        {{-- 4. Audit Data (NIC Hash) --}}
                        <section class="pt-4 border-t border-gray-200 dark:border-gray-700">
                            <p class="text-xs font-mono text-gray-500 dark:text-gray-600">
                                **NIC Hash (System Key):** {{ $people->nic_hash }}
                            </p>
                        </section>

                    </div>

                </div>
            </div>
        </div>

        {{-- Modal Section --}}
        {{-- Add Service Record --}}
        <flux:modal name="add-service-record" class="md:w-100" wire:model="showModal" dismissible="false">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Add Previous Record</flux:heading>
                    <flux:text class="mt-2">Enter the details of the previous service record.
                    </flux:text>
                </div>

                <form wire:submit.prevent="saveServiceRecord" class="space-y-4">

                    <flux:select label="What is update type" wire:model.live="recordType" class="w-full">
                        <flux:select.option value="">Select type</flux:select.option>
                        <flux:select.option value="0">Position</flux:select.option>
                        <flux:select.option value="1">Grade update</flux:select.option>
                        <flux:select.option value="2">Transfer</flux:select.option>
                        <flux:select.option value="3">Retirement</flux:select.option>
                    </flux:select>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
                        <flux:select label="Service" wire:model.live="service" class="w-full">
                            <flux:select.option value="">Select Service</flux:select.option>
                            @foreach ($userServicesOptions as $service)
                                <flux:select.option value="{{ $service->service_id }}">
                                    {{ $service->service->service_name }}
                                </flux:select.option>
                            @endforeach
                        </flux:select>

                        <flux:select label="Grade" wire:model.live="rank" class="w-full">
                            <flux:select.option value="">Select Rank</flux:select.option>
                            @foreach ($ranksOptions as $rank)
                                <flux:select.option value="{{ $rank->rank_id }}">
                                    {{ $rank->rank_name }}
                                </flux:select.option>
                            @endforeach
                        </flux:select>
                    </div>

                    <flux:select label="Position" wire:model.live="position" class="w-full">
                        <flux:select.option value="">Select Rank</flux:select.option>
                        @foreach ($positionOption as $position)
                            <flux:select.option value="{{ $position->position_id }}">
                                {{ $position->position_name }}
                            </flux:select.option>
                        @endforeach
                    </flux:select>

                    <flux:select label="Working Place Level" wire:model.live="officeLevel">
                        <option value="">Select</option>
                        @foreach ($officeLevelOption as $level)
                            <option value="{{ $level->office_level_id }}">{{ $level->office_level_name }}</option>
                        @endforeach
                    </flux:select>

                    @if ($officeLevel == 'OLID006')
                        <flux:select label="Zonal Education Office" wire:model.live="zonalEducationOffice">
                            <option value="">Select</option>
                            @foreach ($zonalEducationOfficeOption as $zone)
                                <option value="{{ $zone->workplace_id }}">{{ $zone->short_name }}
                                </option>
                            @endforeach
                        </flux:select>

                        <flux:select label="Institution Category" wire:model.live="institutionCategory">
                            <option value="">Select</option>
                            @foreach ($institutionCategoryOption as $data)
                                <option value="{{ $data->institution_category_id }}">
                                    {{ $data->institution_category_name }}</option>
                            @endforeach
                        </flux:select>
                    @endif

                    <flux:select label="Working Place" wire:model.live="workingPlace">
                        <option value="">Select</option>
                        @foreach ($workingPlaceOption as $office)
                            <option value="{{ $office->workplace_id }}">{{ $office->office_name }}</option>
                        @endforeach
                    </flux:select>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
                        <flux:input label="Appointed Date" type="date" wire:model.live="appointDate" />
                        <flux:input label="Ended Date" type="date" wire:model.live="endedDate" />
                    </div>

                    <div class="flex">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary">Save changes
                        </flux:button>
                    </div>
                </form>
            </div>
        </flux:modal>
    </x-sltas.layout>
</section>
