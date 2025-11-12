<x-layouts.app :title="__('Dashboard')">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Education Management Dashboard</h1>
                <p class="text-gray-600 mt-2">Welcome to the National Education Management System</p>
            </div>
            <div class="flex items-center space-x-4 mt-4 lg:mt-0">
                <div class="text-right hidden lg:block">
                    <p class="text-sm font-medium text-gray-800">{{ now()->format('l, F j, Y') }}</p>
                    <p class="text-sm text-gray-500">{{ $user->workplace->full_workplace->name ?? 'National System' }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome Card & Quick Stats -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">
        <!-- Welcome Card -->
        <div
            class="lg:col-span-2 relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-100 border border-blue-100 p-6 shadow-sm hover:shadow-md transition-all duration-300 group">
            <div class="relative z-10">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Welcome back, {{ $user->name }}! 👋</h2>
                        <p class="text-gray-600 mb-4">Here's what's happening in the education system today.</p>

                        @if ($user->workplace)
                            <div class="space-y-2">
                                <div
                                    class="flex items-center text-gray-700 bg-white/60 rounded-lg p-3 backdrop-blur-sm border border-white/80">
                                    <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                    <span
                                        class="font-medium text-gray-800">{{ $user->full_workplace->name ?? 'Not Assigned' }}</span>
                                </div>
                                <div
                                    class="flex items-center text-gray-700 bg-white/60 rounded-lg p-3 backdrop-blur-sm border border-white/80">
                                    <svg class="w-5 h-5 mr-3 text-indigo-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                                        </path>
                                    </svg>
                                    <span class="text-gray-800">Level {{ $user->workplace->office_level_id }}</span>
                                </div>
                            </div>
                        @else
                            <p
                                class="text-gray-500 italic bg-white/60 rounded-lg p-3 backdrop-blur-sm border border-white/80">
                                No active workplace assigned.</p>
                        @endif
                    </div>
                    <div
                        class="ml-6 p-3 bg-white/80 rounded-xl border border-white/80 backdrop-blur-sm group-hover:scale-105 transition-transform">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Background decoration -->
            <div
                class="absolute top-0 right-0 w-32 h-32 bg-white/30 rounded-full -translate-y-16 translate-x-16 backdrop-blur-sm">
            </div>
            <div
                class="absolute bottom-0 left-0 w-24 h-24 bg-white/20 rounded-full translate-y-12 -translate-x-12 backdrop-blur-sm">
            </div>
        </div>

        <!-- Quick Stats -->
        <div
            class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-blue-100 transition-all duration-300 group cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Institutions</h3>
                <div class="p-3 bg-blue-50 rounded-xl group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-800 mb-2">{{ $institutionCount }}</div>
            <div class="flex items-center text-green-600 font-medium">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
                <span class="text-sm">100% Government schools</span>
            </div>
        </div>

        <div
            class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md hover:border-green-100 transition-all duration-300 group cursor-pointer">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Students</h3>
                <div class="p-3 bg-green-50 rounded-xl group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-800 mb-2">0</div>
            <div class="flex items-center text-green-600 font-medium">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
                <span class="text-sm">+0% enrollment</span>
            </div>
        </div>
    </div>

    <!-- Main Dashboard Grid -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-8">
        <!-- System Overview -->
        <div class="xl:col-span-2 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Teachers Card -->
                <div
                    class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Teachers enrollment</h3>
                        <div class="p-3 bg-purple-50 rounded-xl group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="text-2xl font-bold text-gray-800 mb-2">{{$teachersCount}}</div>
                    <div class="w-full bg-gray-100 rounded-full h-2 mb-3">
                        <div class="bg-purple-500 h-2 rounded-full transition-all duration-1000" style="width: 85%">
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 font-medium">85% positions filled</p>
                </div>

                <!-- Performance Metrics -->
                <div
                    class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Performance</h3>
                        <div class="p-3 bg-orange-50 rounded-xl group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="text-2xl font-bold text-gray-800 mb-2">78.3%</div>
                    <div class="w-full bg-gray-100 rounded-full h-2 mb-3">
                        <div class="bg-orange-500 h-2 rounded-full transition-all duration-1000" style="width: 78%">
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 font-medium">Average success rate</p>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold text-gray-800">Recent Activities</h3>
                    <button
                        class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center space-x-1 group">
                        <span>View all</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="space-y-4">
                    @foreach ([['icon' => '👨‍🏫', 'color' => 'bg-green-100 text-green-600', 'text' => 'New teacher registered at Colombo Central College', 'time' => '2 min ago'], ['icon' => '📊', 'color' => 'bg-blue-100 text-blue-600', 'text' => 'Monthly performance report generated', 'time' => '1 hour ago'], ['icon' => '🎓', 'color' => 'bg-purple-100 text-purple-600', 'text' => 'Training session scheduled for mathematics teachers', 'time' => '3 hours ago'], ['icon' => '💰', 'color' => 'bg-teal-100 text-teal-600', 'text' => 'Scholarship funds allocated for 2024', 'time' => '5 hours ago']] as $activity)
                        <div
                            class="flex items-center space-x-4 p-4 rounded-xl border border-gray-100 hover:bg-gray-50 hover:border-gray-200 transition-all duration-300 group cursor-pointer">
                            <div
                                class="w-10 h-10 {{ $activity['color'] }} rounded-lg flex items-center justify-center text-lg group-hover:scale-110 transition-transform">
                                {{ $activity['icon'] }}
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-800">{{ $activity['text'] }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $activity['time'] }}</p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 opacity-0 group-hover:opacity-100 transform translate-x-2 group-hover:translate-x-0 transition-all"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Quick Actions & Alerts -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-3">
                    @foreach ([['icon' => '🏫', 'text' => 'Add Institution', 'color' => 'bg-blue-50 hover:bg-blue-100 text-blue-600 border-blue-200'], ['icon' => '👥', 'text' => 'Manage Staff', 'color' => 'bg-green-50 hover:bg-green-100 text-green-600 border-green-200'], ['icon' => '📈', 'text' => 'Generate Reports', 'color' => 'bg-purple-50 hover:bg-purple-100 text-purple-600 border-purple-200'], ['icon' => '⚙️', 'text' => 'System Settings', 'color' => 'bg-gray-50 hover:bg-gray-100 text-gray-600 border-gray-200']] as $action)
                        <button
                            class="p-4 rounded-xl border-2 {{ $action['color'] }} transition-all duration-300 hover:scale-105 hover:shadow-sm group">
                            <div class="text-center">
                                <div class="text-2xl mb-2 group-hover:scale-110 transition-transform">
                                    {{ $action['icon'] }}</div>
                                <p class="text-sm font-medium">{{ $action['text'] }}</p>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- System Alerts -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-orange-100">
                <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z">
                            </path>
                        </svg>
                    </div>
                    System Alerts
                </h3>
                <div class="space-y-4">
                    <div
                        class="flex items-start space-x-3 p-3 bg-orange-50 rounded-lg border border-orange-100 hover:bg-orange-100 transition-colors cursor-pointer">
                        <div class="w-2 h-2 bg-orange-500 rounded-full mt-2 flex-shrink-0"></div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">5 institutions pending approval</p>
                            <p class="text-xs text-gray-600 mt-1">Requires immediate attention</p>
                        </div>
                    </div>
                    <div
                        class="flex items-start space-x-3 p-3 bg-red-50 rounded-lg border border-red-100 hover:bg-red-100 transition-colors cursor-pointer">
                        <div class="w-2 h-2 bg-red-500 rounded-full mt-2 flex-shrink-0"></div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">System backup overdue</p>
                            <p class="text-xs text-gray-600 mt-1">Schedule maintenance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Regional Distribution -->
    <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 mb-10">
    <div class="flex items-center justify-between mb-8">
        <h3 class="text-2xl font-bold text-gray-900">🗺️ Regional Distribution</h3>
        <button class="text-green-600 hover:text-green-700 font-semibold text-sm tracking-wide flex items-center space-x-1 group transition-colors duration-200">
            <span>View detailed report</span>
            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ($provinceCounts as $region)
            <div
                class="bg-teal-50 p-6 rounded-2xl border border-teal-200 text-center transition-all duration-300 transform hover:scale-105 hover:shadow-lg cursor-pointer
                hover:bg-teal-100 group">
                <div class="text-xl font-extrabold text-teal-700 mb-1 leading-snug group-hover:text-teal-800">{{ $region->province_name }}</div>
                <div class="text-lg font-medium text-gray-700 mt-2">{{ $region->total_institutions }} Institutions</div>
            </div>
        @endforeach
    </div>
</div>
</x-layouts.app>
