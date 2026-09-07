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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full flex flex-col justify-center py-12 px-6 sm:px-10 antialiased selection:bg-[#d5a94e] selection:text-black">

    <x-alerts />

    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-8">
        <a href="{{ route('home') }}" class="inline-block transition-transform hover:scale-105">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Ethereal Estates" class="h-10 w-auto mx-auto" />
        </a>
        <h2 class="mt-6 font-fragment text-2xl sm:text-3xl text-white uppercase tracking-[0.06em]">
            Client &amp; Partner Portal
        </h2>
        <p class="mt-2 text-xs sm:text-sm text-white/60 font-light">
            Sign in to access your saved developments, platinum allocations, and advisory reports.
        </p>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-[#102419]/90 border border-white/10 backdrop-blur-md py-8 px-6 sm:px-10 shadow-2xl rounded-2xl">
            
            <form action="{{ route('login.post') }}" method="POST" class="space-y-5" x-data="{ showPassword: false }">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-2">
                        Email Address
                    </label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                           value="{{ old('email') }}"
                           placeholder="name@example.com"
                           class="w-full px-4 py-3 bg-black/40 border border-white/15 rounded-lg text-sm text-white placeholder-white/40 focus:outline-none focus:border-[#d5a94e] focus:ring-1 focus:ring-[#d5a94e] transition-colors" />
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-white/80">
                            Password
                        </label>
                        <button type="button" @click="showPassword = !showPassword"
                                class="text-[11px] text-[#d5a94e] hover:underline cursor-pointer">
                            <span x-text="showPassword ? 'Hide' : 'Show'"></span>
                        </button>
                    </div>
                    <div class="relative">
                        <input id="password" name="password" :type="showPassword ? 'text' : 'password'" autocomplete="current-password" required
                               placeholder="••••••••"
                               class="w-full px-4 py-3 bg-black/40 border border-white/15 rounded-lg text-sm text-white placeholder-white/40 focus:outline-none focus:border-[#d5a94e] focus:ring-1 focus:ring-[#d5a94e] transition-colors" />
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 cursor-pointer text-white/70 hover:text-white">
                        <input type="checkbox" name="remember" class="rounded bg-black/40 border-white/20 text-[#d5a94e] focus:ring-[#d5a94e] h-4 w-4" />
                        <span>Keep me signed in</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit"
                            class="w-full py-3.5 px-4 bg-[#d5a94e] hover:bg-[#c4983e] text-gray-900 font-semibold text-xs uppercase tracking-[0.16em] rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 cursor-pointer">
                        Access Portal
                    </button>
                </div>

                <!-- Demo Access Quick-Fill Pill -->
                <div class="pt-4 mt-4 border-t border-white/10 text-center">
                    <p class="text-[10px] uppercase tracking-wider text-white/50 mb-2 font-medium">Quick Demo Accounts</p>
                    <div class="flex justify-center gap-2">
                        <button type="button"
                                onclick="document.getElementById('email').value='admin@etherealestates.ca';document.getElementById('password').value='password';"
                                class="px-2.5 py-1 text-[11px] rounded bg-white/10 hover:bg-white/20 text-[#d5a94e] border border-white/10 cursor-pointer">
                            Admin Demo
                        </button>
                        <button type="button"
                                onclick="document.getElementById('email').value='user@etherealestates.ca';document.getElementById('password').value='password';"
                                class="px-2.5 py-1 text-[11px] rounded bg-white/10 hover:bg-white/20 text-white/90 border border-white/10 cursor-pointer">
                            Client Demo
                        </button>
                    </div>
                </div>

            </form>

            <div class="mt-6 pt-6 border-t border-white/10 text-center">
                <p class="text-xs text-white/60">
                    Don't have an Ethereal VIP account?
                    <a href="{{ route('register') }}" class="font-semibold text-[#d5a94e] hover:underline ml-1">
                        Register for VIP Access
                    </a>
                </p>
                <div class="mt-4">
                    <a href="{{ route('home') }}" class="text-[11px] text-white/40 hover:text-white transition-colors">
                        ← Return to public website
                    </a>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
