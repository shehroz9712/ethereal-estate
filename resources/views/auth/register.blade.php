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
            VIP Circle
        </span>
    </div>

    <x-alerts />

    <div class="relative z-10 sm:mx-auto sm:w-full sm:max-w-md text-center mb-8">
        <a href="{{ route('home') }}" class="inline-block transition-transform hover:scale-105">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Ethereal Estates" class="h-12 sm:h-14 w-auto mx-auto drop-shadow-lg" />
        </a>
        <h2 class="mt-5 font-fragment text-2xl sm:text-3xl text-white uppercase tracking-[0.06em] font-normal">
            Join The Ethereal Circle
        </h2>
        <p class="mt-2 text-xs sm:text-sm text-gray-300 font-light max-w-sm mx-auto leading-relaxed">
            Gain immediate priority privileges, builder price sheets, and direct advisory access.
        </p>
    </div>

    <div class="relative z-10 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-[#0c1f15]/95 border border-[#c5983e]/25 backdrop-blur-xl py-8 px-6 sm:px-10 shadow-[0_25px_60px_-15px_rgba(0,0,0,0.8)] rounded-2xl relative overflow-hidden">
            <!-- Top Gold Accent Line -->
            <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-transparent via-[#c5983e] to-transparent"></div>

            <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-gray-200 mb-1.5">
                        Full Legal Name
                    </label>
                    <div class="relative">
                        <input id="name" name="name" type="text" required
                               value="{{ old('name') }}"
                               placeholder="e.g. Julian Vance"
                               class="w-full pl-10 pr-4 py-2.5 bg-[#06130d]/80 border border-white/15 rounded-xl text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#c5983e] focus:ring-1 focus:ring-[#c5983e] transition-colors" />
                        <i class="fa-solid fa-user absolute left-3.5 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                    </div>
                    @error('name')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-200 mb-1.5">
                        Email Address
                    </label>
                    <div class="relative">
                        <input id="email" name="email" type="email" autocomplete="email" required
                               value="{{ old('email') }}"
                               placeholder="julian@example.com"
                               class="w-full pl-10 pr-4 py-2.5 bg-[#06130d]/80 border border-white/15 rounded-xl text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#c5983e] focus:ring-1 focus:ring-[#c5983e] transition-colors" />
                        <i class="fa-solid fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                    </div>
                    @error('email')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-gray-200 mb-1.5">
                        Phone Number
                    </label>
                    <div class="relative">
                        <input id="phone" name="phone" type="tel"
                               value="{{ old('phone') }}"
                               placeholder="+1 (416) 555-0199"
                               class="w-full pl-10 pr-4 py-2.5 bg-[#06130d]/80 border border-white/15 rounded-xl text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#c5983e] focus:ring-1 focus:ring-[#c5983e] transition-colors" />
                        <i class="fa-solid fa-phone absolute left-3.5 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                    </div>
                    @error('phone')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-gray-200 mb-1.5">
                        Password (min. 8 characters)
                    </label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                               placeholder="••••••••"
                               class="w-full pl-10 pr-4 py-2.5 bg-[#06130d]/80 border border-white/15 rounded-xl text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#c5983e] focus:ring-1 focus:ring-[#c5983e] transition-colors" />
                        <i class="fa-solid fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-gray-200 mb-1.5">
                        Confirm Password
                    </label>
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                               placeholder="••••••••"
                               class="w-full pl-10 pr-4 py-2.5 bg-[#06130d]/80 border border-white/15 rounded-xl text-sm text-white placeholder-gray-500 focus:outline-none focus:border-[#c5983e] focus:ring-1 focus:ring-[#c5983e] transition-colors" />
                        <i class="fa-solid fa-shield absolute left-3.5 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                    </div>
                </div>

                <!-- VIP Agreement Notice -->
                <div class="pt-2">
                    <p class="text-[11px] text-gray-400 leading-normal">
                        By creating an account, you consent to receive prioritized pre-construction release alerts and property intelligence from Ethereal Estates.
                    </p>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit"
                            class="w-full py-3.5 px-4 bg-[#c5983e] hover:bg-[#b08432] text-white font-semibold text-xs uppercase tracking-[0.16em] rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 cursor-pointer flex items-center justify-center gap-2">
                        <span>Create VIP Account</span>
                        <i class="fa-solid fa-arrow-right text-[11px]"></i>
                    </button>
                </div>

            </form>

            <div class="mt-6 pt-6 border-t border-white/10 text-center">
                <p class="text-xs text-gray-400">
                    Already an Ethereal member?
                    <a href="{{ route('login') }}" class="font-semibold text-[#c5983e] hover:underline ml-1">
                        Sign In Here
                    </a>
                </p>
            </div>

        </div>
    </div>

</body>
</html>