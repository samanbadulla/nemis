<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Create Institution') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create institution profile and account') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        <form wire:submit.prevent="save" class="mt-6 max-w-xl space-y-6">

            <div class="flex flex-col space-y-4">
                <div class="flex flex-col md:flex-row gap-4">
                    <!-- census_no -->
                    <div class="md:w-1/2 w-full">
                        <flux:field>
                            <flux:input label="Census No" wire:model.live="censusNo"
                                placeholder="Enter census number" />
                        </flux:field>
                    </div>

                    <!-- institutions_id Code -->
                    <div class="md:w-1/2 w-full">
                        <flux:field>
                            <flux:input label="Institutions ID" wire:model.live="institutionsId"
                                placeholder="SCH0001" />
                        </flux:field>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-4">
                    <!-- institution_category_id -->
                    <div class="md:w-1/2 w-full">
                        <flux:field>
                            <flux:input label="Institution Category ID" wire:model.live="institutionCategoryId"
                                placeholder="Enter institution category ID" />
                        </flux:field>
                    </div>

                    <!-- authority_id Code -->
                    <div class="md:w-1/2 w-full">
                        <flux:field>
                            <flux:input label="Authority ID" wire:model.live="authorityId"
                                placeholder="Enter authority ID" />
                        </flux:field>
                    </div>
                </div>

                <div>
                    <flux:label for="institution_name">{{ __('Institution Name') }}</flux:label>
                    <flux:input id="institution_name" type="text" wire:model="institution_name" required />
                </div>

                <div>
                    <flux:label for="address">{{ __('Address') }}</flux:label>
                    <flux:input id="address" type="text" wire:model="address" required />
                </div>

                <div>
                    <flux:label for="zone">{{ __('Zone') }}</flux:label>
                    <flux:input id="zone" type="text" wire:model="zone" required />
                </div>

                <div>
                    <flux:label for="status">{{ __('Status') }}</flux:label>
                    <flux:select id="status" wire:model="status" required>
                        <option value="active">{{ __('Active') }}</option>
                        <option value="inactive">{{ __('Inactive') }}</option>
                    </flux:select>
                </div>
            </div>

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary">
                    Create Institution
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
