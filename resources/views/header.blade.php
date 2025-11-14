<header
    class="fixed top-0 left-0 w-full z-50 border-b border-indigo-700/50
           bg-gray-950/90 backdrop-blur-md shadow-lg shadow-gray-950/40 transition-all duration-300">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-3">

        <a href="#" class="inline-flex items-center">
            <img src="{{ asset('images/Emblem_of_Sri_Lanka.svg') }}" alt="logo" class="h-12 w-auto p-1">
            <span class="ml-3 text-xl font-black text-white tracking-wide hidden sm:inline">
                <span class="text-blue-300">E</span>ducation
                <span class="text-blue-300">M</span>anagement
                <span class="text-blue-300">I</span>nformation
                <span class="text-blue-300">S</span>ystem
            </span>

            <span class="ml-3 text-xl font-extrabold text-white tracking-wide block sm:hidden">
                EMIS
            </span>
        </a>

        @if (Route::has('login'))
            <nav class="flex items-center gap-3 text-sm">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-5 py-1.5 rounded-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 transition-all duration-200 shadow-lg shadow-blue-500/20">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('oidc.login') }}"
                        class="px-5 py-1.5 rounded-md border border-gray-700 text-indigo-200 hover:text-blue-400 hover:border-blue-500 transition-all duration-200">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-5 py-1.5 rounded-md border border-blue-600 bg-blue-600 text-white hover:bg-blue-700 hover:border-blue-700 transition-all duration-200 shadow-lg shadow-blue-500/30">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</header>