<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-gray-800 p-6">
                <div class="m-x-auto">
                    <h2 class="text-2xl font-semibold mb-3">Welcome, {{ $user->name }}</h2>

                    @if ($user->workplace)
                        <p class="text-gray-700 dark:text-gray-300 mb-1">
                            <span class="font-medium">Workplace ID:</span> {{ $user->workplace->workplace_id }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300 mb-1">
                            <span class="font-medium">Office Level:</span> {{ $user->workplace->office_level_id }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300">
                            <span class="font-medium">Office Name:</span>
                            {{ $user->full_workplace->name ?? 'Not Assigned' }}
                        </p>
                    @else
                        <p class="text-gray-500 italic">No active workplace assigned.</p>
                    @endif
                </div>
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts.app>
