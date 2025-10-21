<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EducationApp</title>

    {{-- <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png"> --}}

    <link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="/favicon/site.webmanifest" />

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <div>
        @include('header')
    </div>

    <main>
        <section
            class="relative flex h-screen items-center bg-gradient-to-br from-blue-50 via-white to-blue-100 dark:from-gray-900 dark:via-gray-950 dark:to-blue-950">
            <div
                class="absolute inset-x-0 top-0 h-[2px] bg-gradient-to-r from-blue-600 via-cyan-400 to-indigo-600 animate-gradient-x">
            </div>

            <div class="max-w-7xl mx-auto px-6 py-20 lg:py-28 flex flex-col lg:flex-row items-center gap-10">
                <div class="flex-1 text-center lg:text-left">
                    <h1
                        class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-blue-900 dark:text-white leading-tight">
                        Empowering the Future of Education
                    </h1>
                    <p class="mt-5 text-lg text-gray-700 dark:text-gray-300 max-w-2xl mx-auto lg:mx-0">
                        Welcome to the <span class="font-semibold text-blue-700 dark:text-cyan-400">National Education
                            System</span> — a digital hub for teachers, students, and institutions to collaborate,
                        innovate, and grow through technology and knowledge.
                    </p>

                    <div class="mt-8 flex flex-wrap justify-center lg:justify-start gap-4">
                        <a href="#learn-more"
                            class="px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-md transition-all duration-300">
                            Learn More
                        </a>
                        <a href="#get-app"
                            class="px-6 py-3 rounded-lg border border-blue-600 text-blue-700 hover:bg-blue-50 dark:text-cyan-300 dark:border-cyan-400 dark:hover:bg-gray-800 font-semibold transition-all duration-300">
                            Get the App
                        </a>
                    </div>
                </div>

                <div class="flex-1 flex flex-col justify-center items-center lg:justify-end">
                    <img src="{{ asset('images/hero.png') }}" alt="Education Illustration"
                        class="w-72 sm:w-96 lg:w-[420px] drop-shadow-xl transition-transform duration-500 hover:scale-105" />

                    <div
                        class="w-full max-w-md mt-10 p-4 lg:p-6 bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-xl shadow-2xl ring-1 ring-gray-200 dark:ring-gray-700">
                        <div class="grid grid-cols-3 divide-x divide-gray-300 dark:divide-gray-700">
                            <div class="flex flex-col items-center justify-center px-2 py-1">
                                <span class="block text-3xl font-extrabold text-blue-700 dark:text-cyan-400">10K+</span>
                                <span
                                    class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Schools</span>
                            </div>
                            <div class="flex flex-col items-center justify-center px-2 py-1">
                                <span
                                    class="block text-3xl font-extrabold text-blue-700 dark:text-cyan-400">250K+</span>
                                <span
                                    class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Teachers</span>
                            </div>
                            <div class="flex flex-col items-center justify-center px-2 py-1">
                                <span class="block text-3xl font-extrabold text-blue-700 dark:text-cyan-400">4M+</span>
                                <span
                                    class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Students</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative py-20 sm:py-28 bg-cover bg-center"
            style="background-image: url('/images/education-bg.png');">

            <div
                class="absolute inset-0 bg-gradient-to-br from-blue-50/90 via-white/90 to-blue-100/90 dark:from-gray-900/90 dark:via-gray-950/90 dark:to-blue-950/90">
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-lg text-blue-700 dark:text-cyan-400 font-semibold tracking-wider uppercase">
                        EMIS PROFESSIONAL SUITE
                    </h2>
                    <p class="mt-2 text-4xl font-extrabold text-blue-900 dark:text-white tracking-tight sm:text-5xl">
                        A Unified Platform for Educational Excellence
                    </p>
                    <p class="mt-4 max-w-3xl text-xl text-gray-700 dark:text-gray-300 lg:mx-auto">
                        Our modular, enterprise-grade system provides integrated management tools across every facet of
                        your institution.
                    </p>
                </div>

                <div class="mt-16 grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3">

                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-cyan-400 rounded-lg opacity-0 group-hover:opacity-100 transition duration-300">
                        </div>
                        <div
                            class="relative p-8 bg-white dark:bg-gray-800 rounded-lg shadow-xl ring-1 ring-gray-200 dark:ring-gray-700 h-full transform group-hover:shadow-2xl transition duration-300">
                            <div class="p-3 inline-block bg-blue-600 rounded-md shadow-lg">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0v8" />
                                </svg>
                            </div>
                            <h3
                                class="mt-6 text-xl font-bold tracking-tight text-blue-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-cyan-400 transition duration-300">
                                Student Data Management
                            </h3>
                            <p class="mt-4 text-base text-gray-700 dark:text-gray-400">
                                Centralized records for enrollment, attendance, demographics, and secure health
                                information tracking.
                            </p>
                        </div>
                    </div>

                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-cyan-400 rounded-lg opacity-0 group-hover:opacity-100 transition duration-300">
                        </div>
                        <div
                            class="relative p-8 bg-white dark:bg-gray-800 rounded-lg shadow-xl ring-1 ring-gray-200 dark:ring-gray-700 h-full transform group-hover:shadow-2xl transition duration-300">
                            <div class="p-3 inline-block bg-blue-600 rounded-md shadow-lg">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6m4 0h6m-3-6v6m4-6V7a2 2 0 00-2-2h-2a2 2 0 00-2 2v6m-4-6V7a2 2 0 00-2-2h-2a2 2 0 00-2 2v6" />
                                </svg>
                            </div>
                            <h3
                                class="mt-6 text-xl font-bold tracking-tight text-blue-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-cyan-400 transition duration-300">
                                Performance & Reporting
                            </h3>
                            <p class="mt-4 text-base text-gray-700 dark:text-gray-400">
                                Generate instant reports on academic progress, resource allocation, and budget tracking
                                for informed strategy.
                            </p>
                        </div>
                    </div>

                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-cyan-400 rounded-lg opacity-0 group-hover:opacity-100 transition duration-300">
                        </div>
                        <div
                            class="relative p-8 bg-white dark:bg-gray-800 rounded-lg shadow-xl ring-1 ring-gray-200 dark:ring-gray-700 h-full transform group-hover:shadow-2xl transition duration-300">
                            <div class="p-3 inline-block bg-blue-600 rounded-md shadow-lg">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20v-2c0-.656-.126-1.283-.356-1.857M9 20H4v-2a3 3 0 015-2.236M9 20v-2a3 3 0 00-3.14-2.813M15 16.5a4.5 4.5 0 10-9 0M7.25 18H5a2 2 0 00-2 2v2M19 18h-2.25M12 11a4.5 4.5 0 100-9 4.5 4.5 0 000 9z" />
                                </svg>
                            </div>
                            <h3
                                class="mt-6 text-xl font-bold tracking-tight text-blue-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-cyan-400 transition duration-300">
                                HR & Staff Management
                            </h3>
                            <p class="mt-4 text-base text-gray-700 dark:text-gray-400">
                                Manage staff profiles, payroll data, leave requests, performance appraisals, and
                                professional development.
                            </p>
                        </div>
                    </div>

                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-cyan-400 rounded-lg opacity-0 group-hover:opacity-100 transition duration-300">
                        </div>
                        <div
                            class="relative p-8 bg-white dark:bg-gray-800 rounded-lg shadow-xl ring-1 ring-gray-200 dark:ring-gray-700 h-full transform group-hover:shadow-2xl transition duration-300">
                            <div class="p-3 inline-block bg-blue-600 rounded-md shadow-lg">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944c-1.285.0-2.5.25-3.618.729m7.236 0c.345-.164.707-.29 1.082-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3
                                class="mt-6 text-xl font-bold tracking-tight text-blue-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-cyan-400 transition duration-300">
                                Exams & Assessment
                            </h3>
                            <p class="mt-4 text-base text-gray-700 dark:text-gray-400">
                                Automated tools for secure exam scheduling, online testing, grading, and result
                                publication.
                            </p>
                        </div>
                    </div>

                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-cyan-400 rounded-lg opacity-0 group-hover:opacity-100 transition duration-300">
                        </div>
                        <div
                            class="relative p-8 bg-white dark:bg-gray-800 rounded-lg shadow-xl ring-1 ring-gray-200 dark:ring-gray-700 h-full transform group-hover:shadow-2xl transition duration-300">
                            <div class="p-3 inline-block bg-blue-600 rounded-md shadow-lg">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m-5 0v-6a2 2 0 012-2h2a2 2 0 012 2v6m0-2h4m-4 0h4m-4 0v2m4-2v2" />
                                </svg>
                            </div>
                            <h3
                                class="mt-6 text-xl font-bold tracking-tight text-blue-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-cyan-400 transition duration-300">
                                Education Office Integration
                            </h3>
                            <p class="mt-4 text-base text-gray-700 dark:text-gray-400">
                                Facilitate seamless data aggregation, compliance reporting, and communication with
                                regional/national education offices.
                            </p>
                        </div>
                    </div>

                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-cyan-400 rounded-lg opacity-0 group-hover:opacity-100 transition duration-300">
                        </div>
                        <div
                            class="relative p-8 bg-white dark:bg-gray-800 rounded-lg shadow-xl ring-1 ring-gray-200 dark:ring-gray-700 h-full transform group-hover:shadow-2xl transition duration-300">
                            <div class="p-3 inline-block bg-blue-600 rounded-md shadow-lg">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 14v3m4-3v3m4-3v3M3 21h18M5 4h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                </svg>
                            </div>
                            <h3
                                class="mt-6 text-xl font-bold tracking-tight text-blue-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-cyan-400 transition duration-300">
                                Institution & Facility
                            </h3>
                            <p class="mt-4 text-base text-gray-700 dark:text-gray-400">
                                Oversight for infrastructure, asset inventory, facility scheduling, and resource
                                maintenance across campus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div id="contact-us"
                class="overflow-hidden bg-white py-16 px-4 dark:bg-slate-900 sm:px-6 lg:px-8 lg:py-24">
                <div class="relative mx-auto max-w-xl">

                    <!-- Background Pattern -->
                    <svg class="absolute left-full translate-x-1/2 transform" width="404" height="404"
                        fill="none" viewBox="0 0 404 404" aria-hidden="true">
                        <defs>
                            <pattern id="pattern-left" x="0" y="0" width="20" height="20"
                                patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4"
                                    class="text-gray-200 dark:text-slate-600" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="404" fill="url(#pattern-left)" />
                    </svg>

                    <svg class="absolute right-full bottom-0 -translate-x-1/2 transform" width="404"
                        height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                        <defs>
                            <pattern id="pattern-right" x="0" y="0" width="20" height="20"
                                patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4"
                                    class="text-gray-200 dark:text-slate-800" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="404" fill="url(#pattern-right)" />
                    </svg>

                    <!-- Section Title -->
                    <div class="text-center">
                        <h2
                            class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-slate-200 sm:text-4xl">
                            Contact Us
                        </h2>
                        <p class="mt-4 text-lg leading-6 text-gray-500 dark:text-slate-400">
                            Please use the form below to contact us. Thank you!
                        </p>
                    </div>

                    <!-- Contact Form -->
                    <div class="mt-12">
                        <form wire:submit.prevent="sendMessage"
                            class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">

                            <!-- Name -->
                            <div class="sm:col-span-2">
                                <flux:input id="name" type="text" wire:model.defer="name" label="Name"
                                    placeholder="Your full name" />
                                <flux:error name="name" />
                            </div>

                            <!-- Email -->
                            <div class="sm:col-span-2">
                                <flux:input id="email" type="email" wire:model.defer="email" label="Email"
                                    placeholder="you@example.com" />
                                <flux:error name="email" />
                            </div>

                            <!-- Message -->
                            <div class="sm:col-span-2">
                                <flux:textarea id="message" rows="4" wire:model.defer="message" label="Message"
                                    placeholder="Write your message here..." />
                                <flux:error name="message" />
                            </div>

                            <!-- Submit -->
                            <div class="flex justify-end sm:col-span-2">
                                <flux:button type="submit" variant="primary" class="px-6">
                                    Send Message
                                </flux:button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>


    </main>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif

    <div>
        @include('footer')
    </div>
</body>

</html>
