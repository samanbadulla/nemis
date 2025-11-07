<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Create Teacher') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create teacher profile and account') }}</flux:subheading>
        <flux:separator variant="subtle" />

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
        </div>

        {{-- Step Progress Bar --}}
        <div class="max-w-xl my-8">
            <div class="flex justify-between items-center mb-3">
                <span class="text-sm font-medium text-gray-700">Step {{ $step }} of {{ $maxStep }}</span>
                <span class="text-sm font-semibold text-blue-600">{{ round(($step / $maxStep) * 100) }}% Complete</span>
            </div>
            <div class="relative">
                <div class="h-3 bg-gray-200 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-blue-500 to-purple-600 rounded-full transition-all duration-700 ease-out"
                        style="width: {{ ($step / $maxStep) * 100 }}%">
                        <div class="h-full bg-gradient-to-r from-blue-400 to-purple-500 animate-pulse"></div>
                    </div>
                </div>
                <div class="absolute inset-0 flex justify-between items-center pointer-events-none">
                    @for ($i = 1; $i <= $maxStep; $i++)
                        <div class="relative">
                            <div
                                class="w-6 h-6 rounded-full border-4 border-white shadow-lg transition-all duration-300 
                              {{ $i <= $step ? 'bg-gradient-to-r from-blue-500 to-purple-600 scale-125' : 'bg-gray-300' }}">
                            </div>
                            @if ($i <= $step)
                                <svg class="absolute top-1 left-1 w-4 h-4 text-white" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            @endif
                        </div>
                    @endfor
                </div>
            </div>
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
                                        <option value="{{ $data->blood_group_id }}">
                                            {{ $data->blood_group_name ?? $data->blood_group }}</option>
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
                    @if (!$healthCondition)
                        <div class="w-full">
                            <flux:field>
                                <flux:textarea label="Please provide details of the health problem."
                                    wire:model.live="healthProblem" placeholder="Enter health problem details here..."
                                    rows="4" />
                            </flux:field>
                        </div>
                    @endif

                    <flux:field>
                        <flux:select label="District" wire:model.live="district" placeholder="Select District">
                            <option value="">Select</option>
                            @foreach ($districtOption as $data)
                                <option value="{{ $data->district_id }}">{{ $data->district_name }}</option>
                            @endforeach
                        </flux:select>
                    </flux:field>

                    <flux:field>
                        <flux:select label="Divisional Secretary office" wire:model.live="divisionalDecretaryOffice"
                            placeholder="Select Divisional Secretary office">
                            <option value="">Select</option>
                            @foreach ($divisionalSecretaryofficeOption as $data)
                                <option value="{{ $data->dso_id }}">{{ $data->dso_name }}</option>
                            @endforeach
                        </flux:select>
                    </flux:field>

                    <flux:field>
                        <flux:select label="GN Division" wire:model.live="gnDivision" placeholder="Select GN Division">
                            <option value="">Select</option>
                            @foreach ($gnDivisionOption as $data)
                                <option value="{{ $data->gn_division_id }}">{{ $data->gn_division_name }}</option>
                            @endforeach
                        </flux:select>
                    </flux:field>
                </div>
            @endif

            <!-- Contact Details -->
            @if ($step === 2)
                <div class="mt-6 max-w-xl space-y-6">
                    <flux:heading size="lg" level="2" class="mt-8 mb-4">Contact Details</flux:heading>
                    <flux:separator variant="subtle" />

                    <flux:field>
                        <flux:input label="Contact" wire:model.live="contact"
                            placeholder="Enter Contact (10 digits)" />
                    </flux:field>

                    <flux:field>
                        <flux:input label="Email" type="email" wire:model.live="email"
                            placeholder="Enter email" />
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
                                    placeholder="Enter latitude (optional)" />
                            </flux:field>
                        </div>

                        <!-- longitude -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:input label="Longitude" wire:model.live="longitude"
                                    placeholder="Enter longitude (optional)" />
                            </flux:field>
                        </div>
                    </div>

                    <div
                        class="p-4 space-y-6 bg-gray-100 dark:bg-gray-900 rounded-md border border-gray-300 dark:border-gray-700">
                        <p class="text-gray-700 dark:text-gray-200 font-bold">
                            Temporary Address (If different from permanent address)
                        </p>

                        <flux:field class="text-gray-700 dark:text-gray-300">
                            <flux:input label="Address Line 1" wire:model.live="tAddressLine1"
                                class="bg-white dark:bg-gray-800 text-black dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-400"
                                placeholder="Enter address line 1" />
                        </flux:field>

                        <flux:field class="text-gray-700 dark:text-gray-300">
                            <flux:input label="Address Line 2" wire:model.live="tAddressLine2"
                                class="bg-white dark:bg-gray-800 text-black dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-400"
                                placeholder="Enter address line 2" />
                        </flux:field>

                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="md:w-3/4 w-full">
                                <flux:field class="text-gray-700 dark:text-gray-300">
                                    <flux:input label="Address Line 3" wire:model.live="tAddressLine3"
                                        class="bg-white dark:bg-gray-800 text-black dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-400"
                                        placeholder="Enter address line 3" />
                                </flux:field>
                            </div>

                            <div class="md:w-1/4 w-full">
                                <flux:field class="text-gray-700 dark:text-gray-300">
                                    <flux:input label="Postal Code" wire:model.live="tPostalCode"
                                        class="bg-white dark:bg-gray-800 text-black dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-400"
                                        placeholder="Enter postal code" />
                                </flux:field>
                            </div>
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

                    <flux:field>
                        <flux:select label="Teacher appointment category" wire:model.live="teacherCategory">
                            <option value="">Select</option>
                            @foreach ($teacherCategoriesOption as $data)
                                <option value="{{ $data->categories_id }}">{{ $data->name }}</option>
                            @endforeach
                        </flux:select>
                    </flux:field>

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
                        <flux:select label="Types of teachers" wire:model.live="teacherType">
                            <option value="">Select</option>
                            @foreach ($teacherTypeOptions as $data)
                                <option value="{{ $data->teacher_types_id }}">{{ $data->type_name }}</option>
                            @endforeach
                        </flux:select>
                    </flux:field>

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Appointment Subject -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Appointment Subject" wire:model.live="appointmentSubject">
                                    <option value="">Select</option>
                                    @foreach ($appointmentSubjectOption as $subject)
                                        <option value="{{ $subject->a_subject_id }}">{{ $subject->name_en }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>

                        <!-- Appointment Medium -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Appointment medium" wire:model.live="appointmentMedium">
                                    <option value="">Select</option>
                                    @foreach ($appointmentMediumOptions as $medium)
                                        <option value="{{ $medium->medium_id }}">{{ $medium->name }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Main teaching subject -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Main teaching subject" wire:model.live="mainTeachingSubject">
                                    <option value="">Select</option>
                                    @foreach ($subjectOption as $subject)
                                        <option value="{{ $subject->subject_id }}">{{ $subject->name_en }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>

                        <!-- Teaching subject -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Secondary teaching subject"
                                    wire:model.live="secondaryTeachingSubject">
                                    <option value="">Select</option>
                                    @foreach ($subjectOption as $subject)
                                        <option value="{{ $subject->subject_id }}">{{ $subject->name_en }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Zonal Education Office -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Zonal Education Office" wire:model.live="zonalEducationOffice">
                                    <option value="">Select</option>
                                    @foreach ($zonalEducationOfficeOption as $zone)
                                        <option value="{{ $zone->workplace_id }}">{{ $zone->short_name }}</option>
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

                    <flux:field>
                        <flux:select label="First Appointment Institution" wire:model.live="institution">
                            <option value="">Select</option>
                            @foreach ($institutionOption as $institution)
                                <option value="{{ $institution->workplace_id }}">{{ $institution->name }}</option>
                            @endforeach
                        </flux:select>
                    </flux:field>
                </div>
            @endif

            @if ($step === 4)
                <div class="mt-6 max-w-xl space-y-6">
                    <flux:heading size="lg" level="2" class="mt-8 mb-4">Current Appointment Details
                    </flux:heading>
                    <flux:separator variant="subtle" />

                    <flux:radio.group label="Select registration type for the Teacher"
                        wire:model.live="teacherRegType">
                        <flux:radio name="teacherRegType" value="new" label="New teacher"
                            description="New teacher users can perform any action." />
                        <flux:radio name="teacherRegType" value="existing" label="Existing teacher"
                            description="Existing teacher users have the ability to read, create, and update." />
                    </flux:radio.group>

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Current Appointment Date -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:input type="date" label="Current Appointment Date"
                                    wire:model.live="currentAppointmentDate" />
                            </flux:field>
                        </div>

                        <!-- Current Appointment letter number -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:input label="Current Appointment Letter No"
                                    wire:model.live="currentAppointmentLetterNo" placeholder="Enter letter number" />
                            </flux:field>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Current Service -->
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

                        <!-- Current Rank -->
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
                        <flux:select label="Current teaching subject" wire:model.live="currentTeachingSubject">
                            <option value="">Select</option>
                            @foreach ($subjectOption as $subject)
                                <option value="{{ $subject->subject_id }}">{{ $subject->name_en }}</option>
                            @endforeach
                        </flux:select>
                    </flux:field>

                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Current Zonal Education Office -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Zonal Education Office"
                                    wire:model.live="currentZonalEducationOffice">
                                    <option value="">Select</option>
                                    @foreach ($zonalEducationOfficeOption as $zone)
                                        <option value="{{ $zone->workplace_id }}">{{ $zone->short_name }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>

                        <!-- Current Institution Category -->
                        <div class="md:w-1/2 w-full">
                            <flux:field>
                                <flux:select label="Institution Category"
                                    wire:model.live="currentInstitutionCategory">
                                    <option value="">Select</option>
                                    @foreach ($institutionCategoryOption as $data)
                                        <option value="{{ $data->institution_category_id }}">
                                            {{ $data->institution_category_name }}</option>
                                    @endforeach
                                </flux:select>
                            </flux:field>
                        </div>
                    </div>

                    <flux:field>
                        <flux:select label="Current Appointment Institution" wire:model.live="currentInstitution">
                            <option value="">Select</option>
                            @foreach ($currentInstitutionOption as $institution)
                                <option value="{{ $institution->workplace_id }}">{{ $institution->name }}
                                </option>
                            @endforeach
                        </flux:select>
                    </flux:field>
                </div>
            @endif

            <div class="flex justify-between mt-8">
                @if ($step > 1)
                    <flux:button type="button" wire:click="previousStep">Previous</flux:button>
                @else
                    <div></div> <!-- Empty div for spacing -->
                @endif

                @if ($step < $maxStep)
                    <flux:button type="button" wire:click="nextStep" variant="primary">Next</flux:button>
                @else
                    <flux:button type="submit" variant="primary" wire:loading.attr="disabled">
                        <span wire:loading.remove>Create Teacher</span>
                        <span wire:loading>Creating...</span>
                    </flux:button>
                @endif
            </div>
        </form>
    </div>
</div>
