@props([
    'dark' => false,
    'activePage' => '',
])

@php
    $menuItems = [
        ['label' => 'Pre-Construction',    'route' => 'pre-construction',  'active' => 'pre-construction'],
        ['label' => 'Featured Properties',  'route' => 'properties.index',  'active' => 'properties'],
        ['label' => 'About Us',             'route' => 'about',             'active' => 'about'],
        ['label' => 'Ethereal Edit',        'route' => 'ethereal-edit',     'active' => 'ethereal-edit'],
        ['label' => 'Join Ethereal',        'route' => 'join-ethereal',     'active' => 'join-ethereal'],
        ['label' => 'Contact Us',           'route' => 'contact',           'active' => 'contact'],
    ];
@endphp

<!-- ═══════════ HEADER NAVIGATION BAR ═══════════ -->
<header id="site-navbar" class="{{ $dark ? 'absolute inset-x-0 top-0 z-40 bg-transparent' : 'sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-100' }} transition-all duration-300">
    <div class="flex items-center justify-between pe-6 sm:pe-10 lg:pe-16 py-5">
        
        <!-- Logo Left -->
        <a href="{{ route('home') }}" class="shrink-0 group block z-40">
            @if($dark)
                <img src="{{ asset('assets/images/logo.png') }}"
                     alt="Ethereal Estates"
                     class="w-auto object-contain transition-opacity duration-300 group-hover:opacity-85" />
            @else
                <img src="{{ asset('assets/images/logo-dark.png') }}"
                     onerror="this.src='{{ asset('assets/images/logo.png') }}'"
                     alt="Ethereal Estates"
                     class="w-auto object-contain transition-opacity duration-300 group-hover:opacity-85" />
            @endif
        </a>

        <!-- Desktop Quick Links (Only on inner pages, hidden on homepage hero per specification) -->
        @if(!$dark)
            <nav class="hidden xl:flex items-center gap-8">
                @foreach ($menuItems as $item)
                    <a href="{{ route($item['route']) }}"
                       class="text-[12px] uppercase tracking-[0.18em] font-medium transition-colors duration-200 {{ $activePage === $item['active'] ? 'text-[#c5983e]' : 'text-gray-900 hover:text-[#c5983e]' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>
        @endif

        <!-- Space holder for right alignment -->
        <div class="w-8"></div>
    </div>
</header>

<!-- ═══════════ FIXED TWO-LINE MENU ICON (Transforms into 'X' in exact same position) ═══════════ -->
<button type="button"
        @click="menuOpen = !menuOpen"
        class="fixed top-5 sm:top-6 right-6 sm:right-10 lg:right-16 z-50 p-2 flex flex-col justify-center items-center gap-1.5 focus:outline-none group cursor-pointer"
        aria-label="Toggle Navigation Menu">
    <!-- Line 1 -->
    <span class="w-6 sm:w-7 h-[1.5px] transition-all duration-300 transform origin-center"
          :class="{
              'bg-white rotate-45 translate-y-[4px]': menuOpen,
              '{{ $dark ? 'bg-white group-hover:bg-[#c5983e]' : 'bg-gray-900 group-hover:bg-[#c5983e]' }}': !menuOpen
          }"></span>
    <!-- Line 2 -->
    <span class="w-6 sm:w-7 h-[1.5px] transition-all duration-300 transform origin-center"
          :class="{
              'bg-white -rotate-45 -translate-y-[3.5px]': menuOpen,
              '{{ $dark ? 'bg-white group-hover:bg-[#c5983e]' : 'bg-gray-900 group-hover:bg-[#c5983e]' }}': !menuOpen
          }"></span>
</button>

<!-- ═══════════ FULLSCREEN LUXURY OVERLAY MENU ═══════════ -->
<div x-show="menuOpen"
     x-transition:enter="transition ease-out duration-400"
     x-transition:enter-start="opacity-0 translate-y-[-12px]"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-[-12px]"
     class="fixed inset-0 z-40 bg-[#06130d]/98 backdrop-blur-2xl text-white flex flex-col justify-between p-6 sm:p-12 lg:p-16 overflow-y-auto"
     style="display: none;">

    <!-- Top Bar Inside Overlay -->
    <div class="flex items-center justify-between">
        <a href="{{ route('home') }}" @click="menuOpen = false" class="block">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Ethereal Estates" class="h-7 sm:h-8 w-auto" />
        </a>
    </div>

    <!-- Center Navigation Links (Exact 6 required by specification) -->
    <div class="max-w-3xl mx-auto w-full py-12 flex flex-col items-center text-center">
        <nav class="space-y-6 sm:space-y-8 font-fragment text-2xl sm:text-3xl lg:text-4xl uppercase tracking-[0.05em]">
            @foreach ($menuItems as $item)
                <div>
                    <a href="{{ route($item['route']) }}"
                       @click="menuOpen = false"
                       class="inline-block transition-colors duration-200 {{ $activePage === $item['active'] ? 'text-[#c5983e]' : 'text-white/85 hover:text-[#c5983e]' }}">
                        {{ $item['label'] }}
                    </a>
                </div>
            @endforeach
        </nav>
        
        <div class="pt-8">
            <a href="{{ route('rebate-calculator') }}"
               @click="menuOpen = false"
               class="text-xs uppercase tracking-[0.2em] text-[#c5983e] hover:text-white transition-colors font-medium">
                Calculate Your Rebate ↗
            </a>
        </div>
    </div>

    <!-- Bottom Contact & Account Row -->
    <div class="border-t border-white/10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-white/50 tracking-wider">
        <div class="flex items-center gap-6">
            <a href="mailto:office@etherealestates.ca" class="hover:text-[#c5983e] transition-colors">office@etherealestates.ca</a>
            <span>•</span>
            <a href="tel:+14373767611" class="hover:text-[#c5983e] transition-colors">+1 437 376 7611</a>
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
