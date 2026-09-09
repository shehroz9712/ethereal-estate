@props([
    'dark' => false,
    'activePage' => '',
])

@php
    $links = [
        'pre-construction' => ['route' => 'pre-construction', 'label' => 'Pre-Construction'],
        'properties'       => ['route' => 'properties.index',   'label' => 'Featured Properties'],
        'about'            => ['route' => 'about',              'label' => 'About Us'],
        'contact'          => ['route' => 'contact',            'label' => 'Contact Us'],
        'rebate'           => ['route' => 'rebate-calculator',  'label' => 'Calculate Your Rebate'],
    ];
@endphp

@if ($dark)
<!-- ═══════════ TRANSPARENT DARK NAVBAR (Hero video mode - matching Figma / old index.php) ═══════════ -->
<header id="site-navbar" class="absolute inset-x-0 top-0 z-50 flex items-center justify-between pe-6 sm:pe-10 lg:pe-16 py-5 transition-all duration-300">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="shrink-0 group block">
        <img src="{{ asset('assets/images/logo.png') }}"
             alt="Ethereal Estates"
             class=" w-auto object-contain transition-opacity duration-300 group-hover:opacity-85" />
    </a>

    <!-- Desktop Nav Links (exact 5 links from Figma) -->
    <nav class="hidden lg:flex items-center gap-7 xl:gap-9">
        @foreach ($links as $key => $link)
            <a href="{{ route($link['route']) }}"
               class="flex items-center gap-1.5 text-[12.5px] uppercase tracking-[0.17em] font-medium transition-colors duration-200 {{ $activePage === $key ? 'text-[#d5a94e]' : 'text-white hover:text-[#d5a94e]' }}">
                {{ $link['label'] }}
                <span class="text-[#d5a94e] text-xs">↗</span>
            </a>
        @endforeach
    </nav>

    <!-- Mobile Menu Button -->
    <div class="lg:hidden flex items-center">
        <button type="button"
                @click="menuOpen = !menuOpen"
                class="p-2 text-white hover:text-[#d5a94e] focus:outline-none"
                aria-label="Toggle Navigation Menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!menuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="menuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</header>

@else
<!-- ═══════════ LIGHT / STICKY NAVBAR (matching Figma Pre-Construction Listings.png) ═══════════ -->
<header id="site-navbar" class="sticky top-0 z-40 bg-white border-b border-gray-100 transition-all duration-300">
    <div class="flex items-center justify-between pe-6 sm:pe-10 lg:pe-16 py-4.5">
        
        <!-- Left: Continuous Gold Line from viewport edge to Logo (per Figma) -->
        <div class="flex items-center">
            <a href="{{ route('home') }}" class="shrink-0 group block">
                <img src="{{ asset('assets/images/logo-dark.png') }}"
                     onerror="this.src='{{ asset('assets/images/logo.png') }}'"
                     alt="Ethereal Estates"
                     class="w-auto object-contain transition-opacity duration-300 group-hover:opacity-85" />
            </a>
        </div>

        <!-- Desktop Nav Links (exact 5 links from Figma) -->
        <nav class="hidden lg:flex items-center gap-7 xl:gap-9">
            @foreach ($links as $key => $link)
                <a href="{{ route($link['route']) }}"
                   class="flex items-center gap-1.5 text-[12.5px] uppercase tracking-[0.17em] font-medium transition-colors duration-200 {{ $activePage === $key ? 'text-[#d5a94e]' : 'text-gray-900 hover:text-[#d5a94e]' }}">
                    {{ $link['label'] }}
                    <span class="text-[#d5a94e] text-xs">↗</span>
                </a>
            @endforeach
        </nav>

        <!-- Mobile Menu Button -->
        <div class="lg:hidden flex items-center">
            <button type="button"
                    @click="menuOpen = !menuOpen"
                    class="p-2 text-gray-900 hover:text-[#d5a94e] focus:outline-none"
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
