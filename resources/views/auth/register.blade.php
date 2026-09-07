<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#06130d]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VIP Registration — Ethereal Estates</title>
    <meta name="description" content="Register for platinum pre-construction allocations and private advisory services with Ethereal Estates.">

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
            Join The Ethereal Circle
        </h2>
        <p class="mt-2 text-xs sm:text-sm text-white/60 font-light">
            Gain immediate priority privileges, builder price sheets, and direct advisory access.
        </p>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-[#102419]/90 border border-white/10 backdrop-blur-md py-8 px-6 sm:px-10 shadow-2xl rounded-2xl">
            
            <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">
                        Full Legal Name
                    </label>
                    <input id="name" name="name" type="text" required
                           value="{{ old('name') }}"
                           placeholder="e.g. Julian Vance"
                           class="w-full px-4 py-2.5 bg-black/40 border border-white/15 rounded-lg text-sm text-white placeholder-white/40 focus:outline-none focus:border-[#d5a94e] focus:ring-1 focus:ring-[#d5a94e] transition-colors" />
                    @error('name')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">
                        Email Address
                    </label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                           value="{{ old('email') }}"
                           placeholder="julian@example.com"
                           class="w-full px-4 py-2.5 bg-black/40 border border-white/15 rounded-lg text-sm text-white placeholder-white/40 focus:outline-none focus:border-[#d5a94e] focus:ring-1 focus:ring-[#d5a94e] transition-colors" />
                    @error('email')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">
                        Phone Number
                    </label>
                    <input id="phone" name="phone" type="tel"
                           value="{{ old('phone') }}"
                           placeholder="+1 (416) 555-0199"
                           class="w-full px-4 py-2.5 bg-black/40 border border-white/15 rounded-lg text-sm text-white placeholder-white/40 focus:outline-none focus:border-[#d5a94e] focus:ring-1 focus:ring-[#d5a94e] transition-colors" />
                    @error('phone')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">
                        Password (min. 8 characters)
                    </label>
                    <input id="password" name="password" type="password" required autocomplete="new-password"
                           placeholder="••••••••"
                           class="w-full px-4 py-2.5 bg-black/40 border border-white/15 rounded-lg text-sm text-white placeholder-white/40 focus:outline-none focus:border-[#d5a94e] focus:ring-1 focus:ring-[#d5a94e] transition-colors" />
                    @error('password')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-white/80 mb-1.5">
                        Confirm Password
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                           placeholder="••••••••"
                           class="w-full px-4 py-2.5 bg-black/40 border border-white/15 rounded-lg text-sm text-white placeholder-white/40 focus:outline-none focus:border-[#d5a94e] focus:ring-1 focus:ring-[#d5a94e] transition-colors" />
                </div>

                <!-- VIP Agreement Notice -->
                <div class="pt-2">
                    <p class="text-[11px] text-white/60 leading-normal">
                        By creating an account, you consent to receive prioritized pre-construction release alerts and property intelligence from Ethereal Estates.
                    </p>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit"
                            class="w-full py-3.5 px-4 bg-[#d5a94e] hover:bg-[#c4983e] text-gray-900 font-semibold text-xs uppercase tracking-[0.16em] rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 cursor-pointer">
                        Create VIP Account
                    </button>
                </div>

            </form>

            <div class="mt-6 pt-6 border-t border-white/10 text-center">
                <p class="text-xs text-white/60">
                    Already an Ethereal member?
                    <a href="{{ route('login') }}" class="font-semibold text-[#d5a94e] hover:underline ml-1">
                        Sign In Here
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
