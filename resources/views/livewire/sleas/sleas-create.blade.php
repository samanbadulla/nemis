<div>
    @if (session()->has('success'))
        <div class="p-3 mb-3 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="p-3 mb-3 text-red-700 bg-red-100 rounded">
            {{ session('error') }}
        </div>
    @endif


    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Create SLEAS Officer') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create SLEAS Officer profile and account') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

                {{-- Step Progress Bar --}}
    <div class="flex max-w-xl justify-between items-center my-4">
        <div class="flex-1 relative">
            <div class="h-2 bg-gray-200 rounded-full">
                <div class="h-2 bg-blue-600 rounded-full transition-all duration-500"
                    style="width: {{ ($step / $maxStep) * 100 }}%"></div>
            </div>
        </div>
        <span class="ml-4 text-sm text-gray-600">Step {{ $step }} of {{ $maxStep }}</span>
    </div>

        <form wire:submit.prevent="save" class="mt-6 max-w-xl space-y-6">
            @csrf
            <!-- Personal Details -->
            @if ($step == 1)
                <div class="mt-6 max-w-xl space-y-6">
                    <flux:heading size="lg" level="2" class="mt-8 mb-4">Personal Details</flux:heading>
                    <flux:separator variant="subtle" />

                    <flux:field>
                        <flux:input label="National Identity Card (NIC)" wire:model.live="nic"
                            placeholder="Enter NIC" />
                    </flux:field>

                    <div class="flex gap-4">
                        <div class="w-1/5">
                            <flux:field>
                                <flux:select label="Title" wire:model.live="title">
                                    <option value="">Select</option>
                                    @foreach ($titleOptions as $data)
                                        <option value="{{ $data->title_id }}">{{ $data->title_name }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>

                        <div class="w-4/5">
                            <flux:field>
                                <flux:input label="Full Name" wire:model.live="fullName"
                                    placeholder="Enter full name" />
                            </flux:field>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <!-- Gender -->
                        <div class="w-1/2">
                            <flux:field>
                                <flux:select label="Gender" wire:model.live="gender">
                                    <option value="">Select</option>
                                    @foreach ($genderOptions as $data)
                                        <option value="{{ $data->gender_id }}">{{ $data->gender_name }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>

                        <!-- Birthday -->
                        <div class="w-1/2">
                            <flux:field>
                                <flux:input type="date" label="Birthday" wire:model.live="birthday" />
                            </flux:field>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Ethnicity -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Ethnicity" wire:model.live="ethnicity">
                                    <option value="">Select</option>
                                    @foreach ($ethnicityOptions as $data)
                                        <option value="{{ $data->ethnicity_id }}">{{ $data->ethnicity_name }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>

                        <!-- Religion Status -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Religion" wire:model.live="religion">
                                    <option value="">Select Religion</option>
                                    @foreach ($religionOptions as $data)
                                        <option value="{{ $data->religion_id }}">{{ $data->religion_name }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Civil Status -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Civil Status" wire:model.live="civilStatus">
                                    <option value="">Select</option>
                                    @foreach ($civilStatusOptions as $data)
                                        <option value="{{ $data->civil_status_id }}">{{ $data->civil_status_name }}
                                        </option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>

                        <!-- Blood Group -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Blood Group" wire:model.live="bloodGroup">
                                    <option value="">Select</option>
                                    @foreach ($bloodGroupOptions as $data)
                                        <option value="{{ $data->blood_group_id }}">{{ $data->blood_group }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>
                    </div>

                    <!-- Health Condition -->
                    <div class="w-full">
                        <flux:field>
                            <flux:select label="Healthy?" wire:model.live="healthCondition">
                                @foreach ($healthConditionOptions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </flux:select>
                        </flux:field>
                    </div>


                    <!-- Health Problem -->
                    @if ($healthCondition == false)
                        <div class="w-full">
                            <flux:field>
                                <flux:textarea label="Please provide details of the health problem."
                                    wire:model.live="healthProblem" placeholder="Enter health problem details here..."
                                    rows="4" />
                            </flux:field>
                        </div>
                    @endif

                </div>
            @endif

            <!-- Contact Details -->
            @if ($step === 2)
                <div class="mt-6 max-w-xl space-y-6">
                    <flux:heading size="lg" level="2" class="mt-8 mb-4">Contact Details</flux:heading>
                    <flux:separator variant="subtle" />

                    <flux:field>
                        <flux:input label="Contact" wire:model.live="contact" placeholder="Enter Contact" />
                    </flux:field>

                    <flux:field>
                        <flux:input label="Email" type="email" wire:model.live="email" placeholder="Enter email" />
                    </flux:field>

                    <flux:field>
                        <flux:select label="District" wire:model.live="district" placeholder="Select District">
                            <option value="">Select</option>
                            @foreach ($districtOption as $value => $data)
                                <option value="{{ $data->district_id }}">{{ $data->district_name }}</option>
                            @endforeach
                        </flux:select>
                    </flux:field>

                    <flux:field>
                        <flux:select label="Divisional Secretary office" wire:model.live="divisionalDecretaryOffice"
                            placeholder="Select Divisional Secretary office">
                            <option value="">Select</option>
                            @foreach ($divisionalSecretaryofficeOption as $value => $data)
                                <option value="{{ $data->dso_id }}">{{ $data->dso_name }}</option>
                            @endforeach
                        </flux:select>
                    </flux:field>

                    <flux:field>
                        <flux:select label="GN Division" wire:model.live="gnDivision" placeholder="Select GN Division">
                            <option value="">Select</option>
                            @foreach ($gnDivisionOption as $value => $data)
                                <option value="{{ $data->gn_division_id }}">{{ $data->gn_division_name }}</option>
                            @endforeach
                        </flux:select>
                    </flux:field>

                    <flux:field>
                        <flux:input label="Address Line 1" wire:model.live="addressLine1"
                            placeholder="Enter address line 1" />
                    </flux:field>

                    <flux:field>
                        <flux:input label="Address Line 2" wire:model.live="addressLine2"
                            placeholder="Enter address line 2" />
                    </flux:field>

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Address Line 3 -->
                        <div class="md:w-3/4 w-full">
                            <flux:field>
                                <flux:input label="Address Line 3" wire:model.live="addressLine3"
                                    placeholder="Enter address line 3" />
                            </flux:field>
                        </div>

                        <!-- Postal Code -->
                        <div class="md:w-1/4 w-full">
                            <flux:field>
                                <flux:input label="Postal Code" wire:model.live="postalCode"
                                    placeholder="Enter postal code" />
                            </flux:field>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- latitude -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:input label="Latitude" wire:model.live="latitude"
                                    placeholder="Enter latitude" />
                            </flux:field>
                        </div>

                        <!-- longitude -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:input label="Longitude" wire:model.live="longitude"
                                    placeholder="Enter longitude" />
                            </flux:field>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Appointment Details -->
            @if ($step === 3)
                <div class="mt-6 max-w-xl space-y-6">
                    <flux:heading size="lg" level="2" class="mt-8 mb-4">First Appointment Details
                    </flux:heading>
                    <flux:separator variant="subtle" />

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- First Appointment Date -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:input type="date" label="First Appointment Date"
                                    wire:model.live="firstAppointmentDate" />
                            </flux:field>
                        </div>

                        <!-- Appointment letter number -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:input label="Appointment Letter No" wire:model.live="appointmentLetterNo"
                                    placeholder="Enter letter number" />
                            </flux:field>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Service -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Service" wire:model.live="service">
                                    <option value="">Select</option>
                                    @foreach ($servicesOption as $service)
                                        <option value="{{ $service->service_id }}">{{ $service->service_name }}
                                        </option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>

                        <!-- Rank -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Service Rank" wire:model.live="serviceRank">
                                    <option value="">Select</option>
                                    @foreach ($ranksOption as $rank)
                                        <option value="{{ $rank->rank_id }}">{{ $rank->rank_name }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>
                    </div>

                    <flux:field>
                        <flux:select label="Appointed Position" wire:model.live="position">
                            <option value="">Select</option>
                            @foreach ($positionOption as $position)
                                <option value="{{ $position->position_id }}">{{ $position->position_name }}
                                </option>
                            @endforeach
                        </flux:select>
                    </flux:field>

                    <flux:select label="Working Place Level" wire:model.live="officeLevel">
                        <option value="">Select</option>
                        @foreach ($officeLevelOption as $level)
                            <option value="{{ $level->office_level_id }}">{{ $level->office_level_name }}</option>
                        @endforeach
                    </flux:select>

                    @if ($officeLevel == 'OLID006')
                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Office Level -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Zonal Education Office" wire:model.live="zonalEducationOffice">
                                    <option value="">Select</option>
                                    @foreach ($zonalEducationOfficeOption as $zone)
                                        <option value="{{ $zone->workplace_id }}">{{ $zone->short_name }}
                                        </option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>

                        <!-- Institution Type -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Institution Category" wire:model.live="institutionCategory">
                                    <option value="">Select</option>
                                    @foreach ($institutionCategoryOption as $data)
                                        <option value="{{ $data->institution_category_id }}">
                                            {{ $data->institution_category_name }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>
                    </div>
                    @endif

                    <flux:select label="Working Place" wire:model.live="institution">
                        <option value="">Select</option>
                        @foreach ($workingPlaceOption as $office)
                            <option value="{{ $office->workplace_id }}">{{ $office->office_name }}</option>
                        @endforeach
                    </flux:select>
                </div>
            @endif

            @if ($step === 4)

                <div class="mt-6 max-w-xl space-y-6">
                    <flux:heading size="lg" level="2" class="mt-8 mb-4">Current Appointment Details
                    </flux:heading>
                    <flux:separator variant="subtle" />
                    <flux:radio.group label="Select registration type for the Officer"
                        wire:model.live="teacherRegType">
                        <flux:radio name="teacherRegType" value="new" label="New Officer"
                            description="New Officer can perform any action." checked />
                        <flux:radio name="teacherRegType" value="existing" label="Existing Officer"
                            description="Existing Officer have the ability to read, create, and update." />
                    </flux:radio.group>

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- First Appointment Date -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:input type="date" label="Current Appointment Date"
                                    wire:model.live="currentAppointmentDate" />
                            </flux:field>
                        </div>

                        <!-- Appointment letter number -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:input label="Current Appointment Letter No"
                                    wire:model.live="currentAppointmentLetterNo" placeholder="Enter letter number" />
                            </flux:field>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Service -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Current Service" wire:model.live="currentService">
                                    <option value="">Select</option>
                                    @foreach ($servicesOption as $service)
                                        <option value="{{ $service->service_id }}">{{ $service->service_name }}
                                        </option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>

                        <!-- Rank -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Current Service Rank" wire:model.live="currentServiceRank">
                                    <option value="">Select</option>
                                    @foreach ($currentRanksOption as $rank)
                                        <option value="{{ $rank->rank_id }}">{{ $rank->rank_name }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>
                    </div>

                    <flux:field>
                        <flux:select label="Current Position" wire:model.live="currentPosition">
                            <option value="">Select</option>
                            @foreach ($currentPositionOption as $position)
                                <option value="{{ $position->position_id }}">{{ $position->position_name }}
                                </option>
                            @endforeach
                        </flux:select>
                    </flux:field>

                    <flux:select label="Working Place Level" wire:model.live="currentOfficeLevel">
                        <option value="">Select</option>
                        @foreach ($officeLevelOption as $level)
                            <option value="{{ $level->office_level_id }}">{{ $level->office_level_name }}</option>
                        @endforeach
                    </flux:select>

                    @if ($officeLevel == 'OLID006')
                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Office Level -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Zonal Education Office" wire:model.live="zonalEducationOffice">
                                    <option value="">Select</option>
                                    @foreach ($zonalEducationOfficeOption as $zone)
                                        <option value="{{ $zone->workplace_id }}">{{ $zone->short_name }}
                                        </option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>

                        <!-- Institution Type -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Institution Category" wire:model.live="institutionCategory">
                                    <option value="">Select</option>
                                    @foreach ($institutionCategoryOption as $data)
                                        <option value="{{ $data->institution_category_id }}">
                                            {{ $data->institution_category_name }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>
                    </div>
                    @endif

                    <flux:select label="Working Place" wire:model.live="currentInstitution">
                        <option value="">Select</option>
                        @foreach ($workingPlaceOption as $office)
                            <option value="{{ $office->workplace_id }}">{{ $office->office_name }}</option>
                        @endforeach
                    </flux:select>

                </div>
            @endif

            <div class="flex justify-between mt-4">
                @if ($step > 1)
                    <flux:button wire:click="previousStep">Previous</flux:button>
                @endif

                @if ($step < $maxStep)
                    <flux:button wire:click="nextStep" variant="primary">Next</flux:button>
                @else
                    <flux:button wire:click="save" variant="primary">submit</flux:button>
                @endif
            </div>

        </form>

        @if (session()->has('success'))
            <div class="mt-4 text-success">
                {{ session('success') }}
            </div>
        @endif

    </div>
</div>

