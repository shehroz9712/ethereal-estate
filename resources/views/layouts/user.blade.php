<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#fbfbf9]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Client Portal' }} — Ethereal Estates</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full flex flex-col antialiased text-gray-900">

    <x-alerts />

    <!-- Navigation Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-6 sm:px-10 flex items-center justify-between h-16">
            <div class="flex items-center gap-6">
                <a href="{{ route('home') }}" class="block">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" onerror="this.src='{{ asset('assets/images/logo.png') }}'" alt="Ethereal Estates" class="h-7 w-auto" />
                </a>
                <span class="text-[11px] uppercase tracking-[0.2em] font-semibold text-[#d5a94e] hidden sm:inline">
                    Client Portal
                </span>
            </div>

            <div class="flex items-center gap-6">
                <a href="{{ route('home') }}" class="text-xs text-gray-500 hover:text-gray-900 transition-colors">
                    ← Back to Website
                </a>
                <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
                    <span class="w-8 h-8 rounded-full bg-[#1a2e1e] text-white flex items-center justify-center text-xs font-semibold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </span>
                    <span class="text-xs font-medium text-gray-700 hidden sm:inline">
                        {{ auth()->user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-xs text-red-600 hover:text-red-800 transition-colors ml-2 cursor-pointer">
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-6 sm:px-10 py-8 flex-1 w-full grid grid-cols-1 md:grid-cols-[240px_1fr] gap-8">
        <!-- Sidebar Navigation -->
        <aside class="space-y-1">
            <a href="{{ route('user.dashboard') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('user.dashboard') ? 'bg-[#1a2e1e] text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                <span>Dashboard Overview</span>
            </a>
            <a href="{{ route('user.saved-properties') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('user.saved-properties') ? 'bg-[#1a2e1e] text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                <span>Saved Properties</span>
            </a>
            <a href="{{ route('user.profile') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('user.profile') ? 'bg-[#1a2e1e] text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                <span>Profile & Security</span>
            </a>
            <div class="pt-6 mt-6 border-t border-gray-200">
                <p class="text-[10px] uppercase tracking-[0.16em] text-gray-400 font-semibold px-4 mb-2">Explore Real Estate</p>
                <a href="{{ route('pre-construction') }}" class="block px-4 py-1.5 text-xs text-gray-500 hover:text-[#d5a94e] transition-colors">Pre-Construction ↗</a>
                <a href="{{ route('properties.index') }}" class="block px-4 py-1.5 text-xs text-gray-500 hover:text-[#d5a94e] transition-colors">Featured Properties ↗</a>
                <a href="{{ route('rebate-calculator') }}" class="block px-4 py-1.5 text-xs text-gray-500 hover:text-[#d5a94e] transition-colors">Rebate Calculator ↗</a>
            </div>
        </aside>

        <!-- Main Content Slot -->
        <main class="min-w-0">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
