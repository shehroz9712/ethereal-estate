<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#06130d]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sign In — Ethereal Estates</title>
    <meta name="description" content="Access your exclusive client portal or administration controls at Ethereal Estates.">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-[#06130d] text-white flex flex-col justify-center py-10 sm:py-14 px-6 sm:px-10 antialiased selection:bg-[#c5983e] selection:text-black relative overflow-x-hidden" style="background-color: #06130d;">

    <!-- Atmospheric luxury ambient glows -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#c5983e]/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-[#1a4a2b]/25 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[550px] h-[550px] bg-[#0c2417]/30 rounded-full blur-2xl"></div>
    </div>

    <!-- Back to Website header -->
    <div class="relative z-10 sm:mx-auto sm:w-full sm:max-w-md flex items-center justify-between mb-6">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.16em] text-gray-400 hover:text-[#c5983e] transition-colors">
            <i class="fa-solid fa-arrow-left text-[11px]"></i>
            <span>Back to Home</span>
        </a>
        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-[#c5983e]/15 border border-[#c5983e]/30 text-[#c5983e] text-[10px] font-semibold uppercase tracking-wider select-none">
            <span class="w-1.5 h-1.5 rounded-full bg-[#c5983e]"></span>
            VIP Portal
        </span>
    </div>

    <x-alerts />

    <!-- Brand Header -->
    <div class="relative z-10 sm:mx-auto sm:w-full sm:max-w-md text-center mb-8">
        <a href="{{ route('home') }}" class="inline-block transition-transform hover:scale-105">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Ethereal Estates" class="h-12 sm:h-14 w-auto mx-auto drop-shadow-lg" />
        </a>
        <h2 class="mt-5 font-fragment text-2xl sm:text-3xl text-white uppercase tracking-[0.06em] font-normal">
            Welcome Back
        </h2>
        <p class="mt-2 text-xs sm:text-sm text-gray-300 font-light max-w-sm mx-auto leading-relaxed">
            Sign in to access your saved developments, platinum allocations, and advisory reports.
        </p>
    </div>

    <!-- Form Card -->
    <div class="relative z-10 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-[#0c1f15]/95 border border-[#c5983e]/25 backdrop-blur-xl py-8 px-6 sm:px-10 shadow-[0_25px_60px_-15px_rgba(0,0,0,0.8)] rounded-2xl relative overflow-hidden">
            <!-- Top Gold Accent Line -->
            <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-transparent via-[#c5983e] to-transparent"></div>

            <form action="{{ route('login.post') }}" method="POST" class="space-y-5" x-data="{ showPassword: false }">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-200 mb-2">
                        Email Address
                    </label>
                    <div class="relative">
                        <input id="email" name="email" type="email" autocomplete="email" required
                               value="{{ old('email') }}"
                               placeholder="name@example.com"
                               class="w-full pl-10 pr-4 py-3 bg-[#06130d]/80 border border-white/15 rounded-xl text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#c5983e] focus:ring-1 focus:ring-[#c5983e] transition-colors" />
                        <i class="fa-solid fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                    </div>
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-gray-200">
                            Password
                        </label>
                        <button type="button" @click="showPassword = !showPassword"
                                class="text-xs text-[#c5983e] hover:text-[#e3b961] transition-colors inline-flex items-center gap-1 cursor-pointer">
                            <i :class="showPassword ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'" class="text-[11px]"></i>
                            <span x-text="showPassword ? 'Hide' : 'Show'"></span>
                        </button>
                    </div>
                    <div class="relative">
                        <input id="password" name="password" :type="showPassword ? 'text' : 'password'" autocomplete="current-password" required
                               placeholder="••••••••"
                               class="w-full pl-10 pr-4 py-3 bg-[#06130d]/80 border border-white/15 rounded-xl text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#c5983e] focus:ring-1 focus:ring-[#c5983e] transition-colors" />
                        <i class="fa-solid fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 cursor-pointer text-gray-300 hover:text-white">
                        <input type="checkbox" name="remember" class="rounded bg-[#06130d] border-white/20 text-[#c5983e] focus:ring-[#c5983e] h-4 w-4" />
                        <span>Keep me signed in</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit"
                            class="w-full py-3.5 px-4 bg-[#c5983e] hover:bg-[#b08432] text-white font-semibold text-xs uppercase tracking-[0.16em] rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 cursor-pointer flex items-center justify-center gap-2">
                        <span>Access Portal</span>
                        <i class="fa-solid fa-arrow-right text-[11px]"></i>
                    </button>
                </div>

                <!-- Demo Access Quick-Fill Pill -->
                <div class="pt-4 mt-4 border-t border-white/10 text-center">
                    <p class="text-[10px] uppercase tracking-wider text-gray-400 mb-2 font-medium">Quick Demo Accounts</p>
                    <div class="flex justify-center gap-2">
                        <button type="button"
                                onclick="document.getElementById('email').value='admin@etherealestates.ca';document.getElementById('password').value='password';"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs rounded-lg bg-white/10 hover:bg-white/20 text-[#c5983e] border border-[#c5983e]/30 transition-colors cursor-pointer">
                            <i class="fa-solid fa-user-shield text-[10px]"></i>
                            <span>Admin Demo</span>
                        </button>
                        <button type="button"
                                onclick="document.getElementById('email').value='user@etherealestates.ca';document.getElementById('password').value='password';"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs rounded-lg bg-white/10 hover:bg-white/20 text-gray-200 border border-white/15 transition-colors cursor-pointer">
                            <i class="fa-solid fa-user text-[10px]"></i>
                            <span>Client Demo</span>
                        </button>
                    </div>
                </div>

            </form>

            <div class="mt-6 pt-6 border-t border-white/10 text-center">
                <p class="text-xs text-gray-400">
                    Don't have an Ethereal VIP account?
                    <a href="{{ route('register') }}" class="font-semibold text-[#c5983e] hover:underline ml-1">
                        Register for VIP Access
                    </a>
                </p>
            </div>

        </div>
    </div>

</body>
</html>