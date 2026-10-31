@props([
    'dark' => false,
    'activePage' => '',
])

@php
    $links = [
        'pre-construction' => ['route' => 'pre-construction', 'label' => 'Pre-Construction'],
        'properties'       => ['route' => 'properties.index',   'label' => 'Featured Listings'],
        'about'            => ['route' => 'about',              'label' => 'Who We Are'],
        'contact'          => ['route' => 'contact',            'label' => 'Contact Us'],
        'rebate'           => ['route' => 'rebate-calculator',  'label' => 'Calculate Your Rebate'],
    ];
@endphp

@if ($dark)
<!-- ═══════════ TRANSPARENT DARK NAVBAR (Hero video mode) ═══════════ -->
<header id="site-navbar" class="absolute inset-x-0 top-0 z-50 flex items-center justify-between pl-2 sm:pl-3 lg:pl-4 pr-4 sm:pr-6 lg:pr-8 py-4 sm:py-5 transition-all duration-300">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="shrink-0 group block">
        <img src="{{ asset('assets/images/logo.png') }}"
             alt="Ethereal Estates"
             class="h-10 sm:h-12 md:h-14 w-auto object-contain transition-opacity duration-300 group-hover:opacity-85" />
    </a>

    <!-- Desktop Nav Links -->
    <nav class="hidden lg:flex items-center gap-6 xl:gap-8">
        @foreach ($links as $key => $link)
            <a href="{{ route($link['route']) }}"
               class="flex items-center gap-1.5 text-[12px] uppercase tracking-[0.17em] font-medium transition-colors duration-200 {{ $activePage === $key ? 'text-[#c5983e]' : 'text-white hover:text-[#c5983e]' }}">
                {{ $link['label'] }}
                <span class="text-[#c5983e] text-xs">↗</span>
            </a>
        @endforeach
    </nav>

    <!-- Right Utility Buttons: Search & Wishlist & Menu Toggle -->
    <div class="flex items-center gap-3 sm:gap-4">
        <!-- Search Trigger Button -->
        <button type="button"
                @click="openSearchModal()"
                class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/20 text-white text-xs tracking-wider transition-colors cursor-pointer"
                title="Search Properties">
            <svg class="w-3.5 h-3.5 text-[#c5983e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <span class="hidden md:inline text-[11px] uppercase tracking-wider font-medium">Search</span>
        </button>

        <!-- Saved Properties / Wishlist Trigger -->
        <button type="button"
                @click="savedDrawerOpen = true"
                class="relative flex items-center gap-1 px-3 py-1.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/20 text-white text-xs tracking-wider transition-colors cursor-pointer"
                title="Saved Properties">
            <span class="text-sm text-[#c5983e]">♥</span>
            <span class="hidden md:inline text-[11px] uppercase tracking-wider font-medium">Saved</span>
            <span class="ml-0.5 px-1.5 py-0.2 rounded-full bg-[#c5983e] text-[9.5px] text-white font-bold"
                  x-text="savedItems.length">0</span>
        </button>

        <!-- Mobile Menu Hamburger -->
        <button type="button"
                @click="menuOpen = !menuOpen"
                class="p-2 text-white hover:text-[#c5983e] focus:outline-none cursor-pointer"
                aria-label="Toggle Navigation Menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!menuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="menuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</header>

@else
<!-- ═══════════ LIGHT / STICKY NAVBAR ═══════════ -->
<header id="site-navbar" class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
    <div class="flex items-center justify-between pl-2 sm:pl-3 lg:pl-4 pr-4 sm:pr-6 lg:pr-8 py-3.5 sm:py-4">
        
        <!-- Left: Logo -->
        <div class="flex items-center">
            <a href="{{ route('home') }}" class="shrink-0 group block">
                <img src="{{ asset('assets/images/logo-dark.png') }}"
                     onerror="this.src='{{ asset('assets/images/logo.png') }}'"
                     alt="Ethereal Estates"
                     class="h-10 sm:h-12 md:h-14 w-auto object-contain transition-opacity duration-300 group-hover:opacity-85" />
            </a>
        </div>

        <!-- Desktop Nav Links -->
        <nav class="hidden lg:flex items-center gap-6 xl:gap-8">
            @foreach ($links as $key => $link)
                <a href="{{ route($link['route']) }}"
                   class="flex items-center gap-1.5 text-[12px] uppercase tracking-[0.17em] font-medium transition-colors duration-200 {{ $activePage === $key ? 'text-[#c5983e]' : 'text-gray-900 hover:text-[#c5983e]' }}">
                    {{ $link['label'] }}
                    <span class="text-[#c5983e] text-xs">↗</span>
                </a>
            @endforeach
        </nav>

        <!-- Right Utility Buttons: Search & Wishlist & Menu Toggle -->
        <div class="flex items-center gap-3 sm:gap-4">
            <!-- Search Trigger Button -->
            <button type="button"
                    @click="openSearchModal()"
                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-gray-50 hover:bg-gray-100 border border-gray-200 text-gray-800 text-xs tracking-wider transition-colors cursor-pointer"
                    title="Search Properties">
                <svg class="w-3.5 h-3.5 text-[#c5983e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <span class="hidden md:inline text-[11px] uppercase tracking-wider font-medium">Search</span>
            </button>

            <!-- Saved Properties / Wishlist Trigger -->
            <button type="button"
                    @click="savedDrawerOpen = true"
                    class="relative flex items-center gap-1 px-3 py-1.5 rounded-full bg-gray-50 hover:bg-gray-100 border border-gray-200 text-gray-800 text-xs tracking-wider transition-colors cursor-pointer"
                    title="Saved Properties">
                <span class="text-sm text-[#c5983e]">♥</span>
                <span class="hidden md:inline text-[11px] uppercase tracking-wider font-medium">Saved</span>
                <span class="ml-0.5 px-1.5 py-0.2 rounded-full bg-[#c5983e] text-[9.5px] text-white font-bold"
                      x-text="savedItems.length">0</span>
            </button>

            <!-- Mobile Menu Hamburger -->
            <button type="button"
                    @click="menuOpen = !menuOpen"
                    class="p-2 text-gray-900 hover:text-[#c5983e] focus:outline-none cursor-pointer"
                    aria-label="Toggle Navigation Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!menuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="menuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
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
     class="fixed inset-0 z-50 bg-[#06130d]/98 backdrop-blur-xl text-white flex flex-col justify-between pl-4 sm:pl-6 lg:pl-8 pr-6 sm:pr-8 lg:pr-10 py-6 sm:py-8 overflow-y-auto"
     style="display: none;">

    <!-- Top Bar Inside Overlay -->
    <div class="flex items-center justify-between">
        <a href="{{ route('home') }}" @click="menuOpen = false" class="block">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Ethereal Estates" class="h-10 sm:h-12 md:h-14 w-auto" />
        </a>
        <button type="button"
                @click="menuOpen = false"
                class="text-white hover:text-[#c5983e] p-2 text-lg cursor-pointer">
            ✕
        </button>
    </div>

    <!-- Main Navigation Links Grid -->
    <div class="max-w-4xl mx-auto w-full py-10 grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-6">
        <div>
            <p class="text-[11px] uppercase tracking-[0.24em] text-[#c5983e] font-semibold mb-6">Discover Portfolio</p>
            <div class="space-y-4 font-fragment text-2xl sm:text-3xl lg:text-4xl uppercase tracking-[0.04em]">
                <div>
                    <a href="{{ route('pre-construction') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#c5983e] transition-colors">
                        Pre-Construction <span class="text-lg text-[#c5983e]">↗</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('properties.index') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#c5983e] transition-colors">
                        Featured Listings <span class="text-lg text-[#c5983e]">↗</span>
                    </a>
                </div>
                <div>
                    <button type="button" @click="menuOpen = false; savedDrawerOpen = true;" class="inline-flex items-center gap-3 text-white/90 hover:text-[#c5983e] transition-colors text-left uppercase">
                        Saved Properties (<span x-text="savedItems.length">0</span>) <span class="text-lg text-[#c5983e]">♥</span>
                    </button>
                </div>
                <div>
                    <a href="{{ route('rebate-calculator') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#c5983e] transition-colors">
                        Rebate Calculator <span class="text-lg text-[#c5983e]">↗</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('genius') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#c5983e] transition-colors">
                        Genius Experience <span class="text-lg text-[#c5983e]">↗</span>
                    </a>
                </div>
            </div>
        </div>

        <div>
            <p class="text-[11px] uppercase tracking-[0.24em] text-[#c5983e] font-semibold mb-6">About & Advisory</p>
            <div class="space-y-4 font-fragment text-2xl sm:text-3xl lg:text-4xl uppercase tracking-[0.04em]">
                <div>
                    <a href="{{ route('about') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#c5983e] transition-colors">
                        Who We Are <span class="text-lg text-[#c5983e]">↗</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('our-story') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#c5983e] transition-colors">
                        Our Story <span class="text-lg text-[#c5983e]">↗</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('news.index') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#c5983e] transition-colors">
                        Ethereal Edit <span class="text-lg text-[#c5983e]">↗</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('join-ethereal') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#c5983e] transition-colors">
                        Join Ethereal <span class="text-lg text-[#c5983e]">↗</span>
                    </a>
                </div>
                <div>
                    <a href="{{ route('contact') }}" @click="menuOpen = false" class="inline-flex items-center gap-3 text-white/90 hover:text-[#c5983e] transition-colors">
                        Contact Us <span class="text-lg text-[#c5983e]">↗</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Info & Account Row -->
    <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row items-center justify-between gap-6 text-xs text-white/60 tracking-wider">
        <div class="flex items-center gap-6">
            <a href="mailto:office@etherealestates.ca" class="hover:text-[#c5983e] transition-colors">office@etherealestates.ca</a>
            <span>•</span>
            <a href="tel:+14373767611" class="hover:text-[#c5983e] transition-colors">+1 437-376-7611</a>
        </div>

        <div class="flex items-center gap-6 uppercase tracking-widest text-[11px]">
            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="text-[#c5983e] font-semibold">Admin Panel</a>
                @else
                    <a href="{{ route('user.dashboard') }}" class="text-[#c5983e] font-semibold">My Client Dashboard</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-red-400 transition-colors cursor-pointer">Sign Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-[#c5983e] transition-colors">Sign In</a>
                <a href="{{ route('register') }}" class="text-[#c5983e] font-semibold">Create Client Account</a>
            @endauth
        </div>
    </div>
</div>
