@props([
    'dark' => false,
    'activePage' => '',
])

@php
    $links = [
        'pre-construction' => ['route' => 'pre-construction', 'label' => 'Pre-Construction'],
        'properties'       => ['route' => 'properties.index',   'label' => 'Featured Properties'],
        'about'            => ['route' => 'about',              'label' => 'About Us'],
        'news'             => ['route' => 'news.index',          'label' => 'Ethereal Edit'],
        'contact'          => ['route' => 'contact',            'label' => 'Contact Us'],
        'rebate'           => ['route' => 'rebate-calculator',  'label' => 'Calculate Your Rebate'],
    ];
@endphp

@if ($dark)
<!-- ═══════════ TRANSPARENT DARK NAVBAR (Hero video mode) ═══════════ -->
<header id="site-navbar" class="absolute inset-x-0 top-0 z-50 flex items-center justify-between pe-6 sm:pe-10 lg:pe-16 py-6 transition-all duration-300">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="shrink-0 group block">
        <img src="{{ asset('assets/images/logo.png') }}"
             alt="Ethereal Estates"
             class="h-8 sm:h-9 w-auto object-contain transition-opacity duration-300 group-hover:opacity-85" />
    </a>

    <!-- Desktop Nav Links -->
    <nav class="hidden xl:flex items-center gap-8 2xl:gap-10">
        @foreach ($links as $key => $link)
            <a href="{{ route($link['route']) }}"
               class="flex items-center gap-1.5 text-[12px] uppercase tracking-[0.18em] font-medium transition-colors duration-200 {{ $activePage === $key ? 'text-[#d5a94e]' : 'text-white/90 hover:text-[#d5a94e]' }}">
                {{ $link['label'] }}
                <span class="text-[#d5a94e] text-xs">↗</span>
            </a>
        @endforeach
    </nav>

    <!-- Right Controls: Auth + Two-Line Menu Icon -->
    <div class="flex items-center gap-4 sm:gap-6">
        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="hidden sm:inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.16em] font-semibold text-white/90 hover:text-[#d5a94e] border border-white/20 hover:border-[#d5a94e] rounded-full px-4 py-1.5 transition-colors">
                    Admin Portal <span class="text-[#d5a94e]">↗</span>
                </a>
            @else
                <a href="{{ route('user.dashboard') }}" class="hidden sm:inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.16em] font-semibold text-white/90 hover:text-[#d5a94e] border border-white/20 hover:border-[#d5a94e] rounded-full px-4 py-1.5 transition-colors">
                    Client Portal <span class="text-[#d5a94e]">↗</span>
                </a>
            @endif
        @else
            <a href="{{ route('login') }}" class="hidden sm:inline-flex items-center gap-1 text-[11px] uppercase tracking-[0.18em] font-medium text-white/80 hover:text-[#d5a94e] transition-colors">
                Sign In
            </a>
        @endauth

        <!-- Two-Line Animated Menu Icon (transforms into X) -->
        <button type="button"
                @click="menuOpen = !menuOpen"
                class="relative z-50 w-10 h-10 flex flex-col items-center justify-center gap-2 cursor-pointer p-2 rounded-full hover:bg-white/10 transition-colors focus:outline-none"
                aria-label="Toggle Navigation Menu">
            <span class="w-6 h-[1.5px] bg-white transition-all duration-300 transform origin-center"
                  :class="{ 'rotate-45 translate-y-[5px] !bg-white': menuOpen }"></span>
            <span class="w-6 h-[1.5px] bg-white transition-all duration-300 transform origin-center"
                  :class="{ '-rotate-45 -translate-y-[5px] !bg-white': menuOpen }"></span>
        </button>
    </div>
</header>

@else
<!-- ═══════════ LIGHT / STICKY NAVBAR ═══════════ -->
<header id="site-navbar" class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
    <div class="flex items-center justify-between px-6 sm:px-10 lg:px-16 py-4">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="shrink-0 group block">
            <img src="{{ asset('assets/images/logo-dark.png') }}"
                 onerror="this.src='{{ asset('assets/images/logo.png') }}'"
                 alt="Ethereal Estates"
                 class="h-8 sm:h-9 w-auto object-contain transition-opacity duration-300 group-hover:opacity-85" />
        </a>

        <!-- Desktop Nav Links -->
        <nav class="hidden xl:flex items-center gap-8 2xl:gap-10">
            @foreach ($links as $key => $link)
                <a href="{{ route($link['route']) }}"
                   class="flex items-center gap-1.5 text-[12px] uppercase tracking-[0.18em] font-medium transition-colors duration-200 {{ $activePage === $key ? 'text-[#d5a94e]' : 'text-gray-800 hover:text-[#d5a94e]' }}">
                    {{ $link['label'] }}
                    <span class="text-[#d5a94e] text-xs">↗</span>
                </a>
            @endforeach
        </nav>

        <!-- Right Controls: Auth + Two-Line Menu Icon -->
        <div class="flex items-center gap-4 sm:gap-6">
            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="hidden sm:inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.16em] font-semibold text-gray-800 hover:text-[#d5a94e] border border-gray-300 hover:border-[#d5a94e] rounded-full px-4 py-1.5 transition-colors">
                        Admin Portal <span class="text-[#d5a94e]">↗</span>
                    </a>
                @else
                    <a href="{{ route('user.dashboard') }}" class="hidden sm:inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.16em] font-semibold text-gray-800 hover:text-[#d5a94e] border border-gray-300 hover:border-[#d5a94e] rounded-full px-4 py-1.5 transition-colors">
                        Client Portal <span class="text-[#d5a94e]">↗</span>
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}" class="hidden sm:inline-flex items-center gap-1 text-[11px] uppercase tracking-[0.18em] font-medium text-gray-600 hover:text-[#d5a94e] transition-colors">
                    Sign In
                </a>
            @endauth

            <!-- Two-Line Animated Menu Icon (transforms into X) -->
            <button type="button"
                    @click="menuOpen = !menuOpen"
                    class="relative z-50 w-10 h-10 flex flex-col items-center justify-center gap-2 cursor-pointer p-2 rounded-full hover:bg-gray-100 transition-colors focus:outline-none"
                    aria-label="Toggle Navigation Menu">
                <span class="w-6 h-[1.5px] bg-gray-900 transition-all duration-300 transform origin-center"
                      :class="{ 'rotate-45 translate-y-[5px] !bg-white': menuOpen }"></span>
                <span class="w-6 h-[1.5px] bg-gray-900 transition-all duration-300 transform origin-center"
                      :class="{ '-rotate-45 -translate-y-[5px] !bg-white': menuOpen }"></span>
            </button>
        </div>
    </div>
</header>
@endif

<!-- ═══════════ FULLSCREEN LUXURY OVERLAY MENU ═══════════ -->
<div x-show="menuOpen"
     x-transition:enter="transition ease-out duration-400"
     x-transition:enter-start="opacity-0 translate-y-[-10px]"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-[-10px]"
     class="fixed inset-0 z-40 bg-[#06130d]/98 backdrop-blur-xl text-white flex flex-col justify-between p-8 sm:p-14 lg:p-20 overflow-y-auto"
     style="display: none;">

    <!-- Top Bar Inside Overlay -->
    <div class="flex items-center justify-between">
        <a href="{{ route('home') }}" @click="menuOpen = false" class="block">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Ethereal Estates" class="h-8 sm:h-9 w-auto" />
        </a>
        <span class="text-xs uppercase tracking-[0.2em] text-[#d5a94e] font-semibold hidden sm:inline">
            Menu
        </span>
    </div>

    <!-- Main Navigation Links Grid -->
    <div class="max-w-4xl mx-auto w-full py-10 grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-6">
        <div>
            <p class="text-[11px] uppercase tracking-[0.24em] text-[#d5a94e] font-semibold mb-6">Discover Portfolio</p>
            <div class="space-y-4 font-fragment text-2xl sm:text-3xl lg:text-4xl uppercase tracking-[0.04em]">
                <div>
                    <a href="{{ route('pre-construction') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#d5a94e] transition-colors">
                        Pre-Construction <span class="text-lg text-[#d5a94e]">↗</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('properties.index') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#d5a94e] transition-colors">
                        Featured Properties <span class="text-lg text-[#d5a94e]">↗</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('rebate-calculator') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#d5a94e] transition-colors">
                        Rebate Calculator <span class="text-lg text-[#d5a94e]">↗</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('genius') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#d5a94e] transition-colors">
                        Genius Experience <span class="text-lg text-[#d5a94e]">↗</span>
                    </a>
                </div>
            </div>
        </div>

        <div>
            <p class="text-[11px] uppercase tracking-[0.24em] text-[#d5a94e] font-semibold mb-6">About & Advisory</p>
            <div class="space-y-4 font-fragment text-2xl sm:text-3xl lg:text-4xl uppercase tracking-[0.04em]">
                <div>
                    <a href="{{ route('about') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#d5a94e] transition-colors">
                        About Us <span class="text-lg text-[#d5a94e]">↗</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('our-story') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#d5a94e] transition-colors">
                        Our Story <span class="text-lg text-[#d5a94e]">↗</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('news.index') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#d5a94e] transition-colors">
                        Ethereal Edit <span class="text-lg text-[#d5a94e]">↗</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('join-ethereal') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#d5a94e] transition-colors">
                        Join Ethereal <span class="text-lg text-[#d5a94e]">↗</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('contact') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#d5a94e] transition-colors">
                        Contact Us <span class="text-lg text-[#d5a94e]">↗</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Info & Account Row -->
    <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row items-center justify-between gap-6 text-xs text-white/60 tracking-wider">
        <div class="flex items-center gap-6">
            <a href="mailto:office@etherealestates.ca" class="hover:text-[#d5a94e] transition-colors">office@etherealestates.ca</a>
            <span>•</span>
            <a href="tel:+14373767611" class="hover:text-[#d5a94e] transition-colors">+1 437-376-7611</a>
        </div>

        <div class="flex items-center gap-6 uppercase tracking-widest text-[11px]">
            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="text-[#d5a94e] font-semibold">Admin Panel</a>
                @else
                    <a href="{{ route('user.dashboard') }}" class="text-[#d5a94e] font-semibold">My Client Dashboard</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-red-400 transition-colors cursor-pointer">Sign Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-[#d5a94e] transition-colors">Sign In</a>
                <a href="{{ route('register') }}" class="text-[#d5a94e] font-semibold">Create Client Account</a>
            @endauth
        </div>
    </div>
</div>
