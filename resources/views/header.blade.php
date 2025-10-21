<header
    class="fixed top-0 left-0 w-full z-50 border-b border-gray-200 dark:border-gray-800 
           bg-white/70 dark:bg-gray-900/60 backdrop-blur-md shadow-sm transition-all duration-300">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-3">

        <!-- Logo -->
        <a href="#" class="inline-flex items-center">
            <img src="{{ asset('images/Emblem_of_Sri_Lanka.svg') }}" alt="logo" class="h-12 w-auto p-1">
            <span class="ml-3 text-xl font-semibold text-blue-950 tracking-wide hidden sm:inline">
                <span class="text-blue-500">E</span>ducation
                <span class="text-blue-500">M</span>anagement
                <span class="text-blue-500">I</span>nformation
                <span class="text-blue-500">S</span>ystem
            </span>

            <span class="ml-3 text-xl font-semibold text-blue-900 tracking-wide block lg:hidden">
                EMIS
            </span>
        </a>

        @if (Route::has('login'))
            <nav class="flex items-center gap-3 text-sm">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-5 py-1.5 rounded-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 transition-all duration-200 shadow-sm hover:shadow-blue-500/20">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-5 py-1.5 rounded-md border border-gray-300 text-gray-800 hover:text-blue-600 hover:border-blue-500 dark:text-gray-100 dark:border-gray-700 dark:hover:text-blue-400 transition-all duration-200">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-5 py-1.5 rounded-md border border-blue-600 bg-blue-600 text-white hover:bg-blue-700 hover:border-blue-700 transition-all duration-200 shadow-sm hover:shadow-blue-500/30">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</header>
