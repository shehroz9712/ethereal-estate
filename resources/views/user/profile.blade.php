<x-user-layout title="Profile & Security">
    <div class="max-w-3xl space-y-8">
        
        <div>
            <h1 class="font-fragment text-2xl sm:text-3xl uppercase tracking-wide text-gray-900">
                Profile &amp; Account Settings
            </h1>
            <p class="text-xs sm:text-sm text-gray-500 font-light mt-1">
                Manage your legal identity, contact preferences, and security credentials.
            </p>
        </div>

        <form action="{{ route('user.profile.update') }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Personal Details Card -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-200/80 shadow-sm space-y-6">
                <div class="border-b border-gray-100 pb-4">
                    <h2 class="font-fragment text-base uppercase tracking-wider text-gray-900">
                        Personal Information
                    </h2>
                    <p class="text-xs text-gray-500 font-light mt-0.5">
                        Used for VIP agreements, purchase agreements, and builder allocations.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Full Legal Name
                        </label>
                        <input type="text" id="name" name="name" required
                               value="{{ old('name', $user->name) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Email Address
                        </label>
                        <input type="email" id="email" name="email" required
                               value="{{ old('email', $user->email) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Direct Phone Number
                        </label>
                        <input type="tel" id="phone" name="phone"
                               value="{{ old('phone', $user->phone) }}"
                               placeholder="+1 (416) 555-0199"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                        @error('phone')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Security & Password Card -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-200/80 shadow-sm space-y-6">
                <div class="border-b border-gray-100 pb-4">
                    <h2 class="font-fragment text-base uppercase tracking-wider text-gray-900">
                        Update Password
                    </h2>
                    <p class="text-xs text-gray-500 font-light mt-0.5">
                        Leave blank if you do not wish to change your account password.
                    </p>
                </div>

                <div class="space-y-4">
                    <div>
                        <label for="current_password" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Current Password
                        </label>
                        <input type="password" id="current_password" name="current_password"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                        @error('current_password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="new_password" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                                New Password
                            </label>
                            <input type="password" id="new_password" name="new_password"
                                   class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                            @error('new_password')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="new_password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                                Confirm New Password
                            </label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                   class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-4">
                <button type="submit"
                        class="px-6 py-3 bg-[#1a2e1e] hover:bg-[#d5a94e] hover:text-gray-900 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors shadow-sm cursor-pointer">
                    Save Changes
                </button>
            </div>

        </form>

    </div>
</x-user-layout>
