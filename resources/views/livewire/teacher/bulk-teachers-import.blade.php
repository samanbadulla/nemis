<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Bulk Teacher Import') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create multiple teacher profiles at once') }}
        </flux:subheading>
        <flux:separator variant="subtle" />

        {{-- Action Buttons --}}
        <div class="my-6">
            <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">📂 Import Teachers (Excel)</h2>

                @if (session()->has('success'))
                    <div class="p-3 mb-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="p-3 mb-4 text-sm text-red-800 bg-red-100 border border-red-300 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                <a href="{{ route('teachers.download.template') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Download Excel Template
                </a>


                <form wire:submit.prevent="import" class="space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-2 font-medium">Select Excel File (.xlsx / .xls)</label>
                        <input type="file" wire:model="file"
                            class="block w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                        @error('file')
                            <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" wire:loading.attr="disabled"
                            class="px-5 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition disabled:opacity-50">
                            <span wire:loading.remove>Import</span>
                            <span wire:loading>Importing...</span>
                        </button>
                    </div>
                </form>

                <div wire:loading.delay class="text-gray-500 mt-3 text-sm">
                    Processing file, please wait...
                </div>
            </div>

        </div>

        @if (session()->has('success') && !$showImportSection)
            <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
