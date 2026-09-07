<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Administration' }} — Ethereal Estates</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full flex flex-col antialiased text-gray-900" x-data="{ sidebarOpen: false }">

    <x-alerts />

    <div class="flex min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-40 w-64 bg-[#06130d] text-white flex flex-col transition-transform duration-300 transform -translate-x-full md:translate-x-0"
               :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }">
            
            <!-- Brand -->
            <div class="h-16 flex items-center justify-between px-6 border-b border-white/10">
                <a href="{{ route('admin.dashboard') }}" class="block">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Ethereal Estates" class="h-7 w-auto" />
                </a>
                <button type="button" @click="sidebarOpen = false" class="md:hidden text-gray-400 hover:text-white">✕</button>
            </div>

            <!-- Nav Items -->
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-md text-xs font-medium tracking-wide transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-[#d5a94e] text-gray-900 font-semibold shadow-sm' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Overview &amp; Analytics</span>
                </a>

                <a href="{{ route('admin.properties.index') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-md text-xs font-medium tracking-wide transition-colors {{ request()->routeIs('admin.properties.*') ? 'bg-[#d5a94e] text-gray-900 font-semibold shadow-sm' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span>Properties &amp; Projects</span>
                </a>

                <a href="{{ route('admin.inquiries.index') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-md text-xs font-medium tracking-wide transition-colors {{ request()->routeIs('admin.inquiries.*') ? 'bg-[#d5a94e] text-gray-900 font-semibold shadow-sm' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    <span>Inquiries &amp; VIP Leads</span>
                </a>

                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-md text-xs font-medium tracking-wide transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-[#d5a94e] text-gray-900 font-semibold shadow-sm' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>User Accounts</span>
                </a>

                <a href="{{ route('admin.articles.index') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-md text-xs font-medium tracking-wide transition-colors {{ request()->routeIs('admin.articles.*') ? 'bg-[#d5a94e] text-gray-900 font-semibold shadow-sm' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    <span>Ethereal Edit Posts</span>
                </a>
            </nav>

            <!-- Bottom User & Website link -->
            <div class="p-4 border-t border-white/10 space-y-2">
                <a href="{{ route('home') }}" target="_blank"
                   class="flex items-center justify-between px-3 py-2 rounded text-xs text-white/70 hover:text-white hover:bg-white/10 transition-colors">
                    <span>View Public Website</span>
                    <span class="text-[#d5a94e]">↗</span>
                </a>
                <div class="flex items-center justify-between px-3 pt-2">
                    <div class="flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-full bg-[#d5a94e] text-gray-900 font-bold flex items-center justify-center text-xs">
                            A
                        </span>
                        <div class="text-[11px] leading-tight">
                            <p class="font-medium text-white">{{ auth()->user()->name }}</p>
                            <p class="text-white/40 text-[9px] uppercase tracking-wider">Administrator</p>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-xs text-red-400 hover:text-red-300 cursor-pointer" title="Sign Out">
                            ⇥
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col md:pl-64">
            <!-- Topbar -->
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 sm:px-10 sticky top-0 z-20">
                <div class="flex items-center gap-4">
                    <button type="button" @click="sidebarOpen = true" class="md:hidden text-gray-600 hover:text-gray-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <h1 class="text-sm font-semibold text-gray-800 uppercase tracking-wider">
                        {{ $heading ?? 'Administrator Control Portal' }}
                    </h1>
                </div>

                <div class="flex items-center gap-4">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                        System Active
                    </span>
                </div>
            </header>

            <!-- Main Content Slot -->
            <main class="flex-1 p-6 sm:p-10 max-w-7xl w-full">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>
