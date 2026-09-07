<x-admin-layout heading="User Accounts">
    <div class="space-y-6">
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="font-fragment text-2xl sm:text-3xl uppercase tracking-wide text-gray-900">
                    User Accounts &amp; Access Controls
                </h1>
                <p class="text-xs sm:text-sm text-gray-500 font-light mt-1">
                    Manage client registrations, elevated permissions, and portal credentials.
                </p>
            </div>
            <div class="text-xs text-gray-500 font-medium">
                {{ $users->total() }} Total Registered Accounts
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="bg-white p-4 rounded-xl border border-gray-200/80 shadow-sm">
            <form action="{{ route('admin.users.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                
                <div>
                    <input type="text" name="search" value="{{ $filters['search'] ?? '' }}"
                           placeholder="Search name, email, phone..."
                           class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-900 focus:bg-white focus:outline-none focus:border-[#d5a94e]" />
                </div>

                <div>
                    <select name="role" class="w-full px-3.5 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-700 focus:bg-white focus:outline-none focus:border-[#d5a94e]">
                        <option value="">All Roles</option>
                        <option value="user" {{ ($filters['role'] ?? '') == 'user' ? 'selected' : '' }}>Client / VIP Buyer</option>
                        <option value="admin" {{ ($filters['role'] ?? '') == 'admin' ? 'selected' : '' }}>System Administrator</option>
                    </select>
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" class="flex-1 py-2 bg-[#1a2e1e] hover:bg-gray-800 text-white rounded-lg text-xs font-semibold uppercase tracking-wider transition-colors cursor-pointer">
                        Filter Users
                    </button>
                    @if(!empty($filters['search']) || !empty($filters['role']))
                        <a href="{{ route('admin.users.index') }}" class="px-3 py-2 border border-gray-200 hover:border-gray-400 text-gray-600 rounded-lg text-xs font-semibold transition-colors">
                            Reset
                        </a>
                    @endif
                </div>

            </form>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-[10px] border-b border-gray-100">
                        <tr>
                            <th class="py-3.5 px-6 font-semibold">User Details</th>
                            <th class="py-3.5 px-6 font-semibold">Contact</th>
                            <th class="py-3.5 px-6 font-semibold">Account Role</th>
                            <th class="py-3.5 px-6 font-semibold">Registered Date</th>
                            <th class="py-3.5 px-6 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-4 px-6 font-medium text-gray-900 flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-full bg-[#1a2e1e] text-white flex items-center justify-center text-xs font-semibold flex-shrink-0">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </span>
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $user->name }}</p>
                                        <p class="text-[11px] text-gray-400">ID #{{ $user->id }}</p>
                                    </div>
                                </td>

                                <td class="py-4 px-6 text-gray-600">
                                    <div class="font-medium text-gray-900">{{ $user->email }}</div>
                                    <div class="text-[11px] text-gray-400">{{ $user->phone ?? 'No phone entered' }}</div>
                                </td>

                                <td class="py-4 px-6">
                                    <form action="{{ route('admin.users.update-role', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <select name="role" onchange="this.form.submit()"
                                                {{ $user->id === auth()->id() ? 'disabled' : '' }}
                                                class="text-xs px-2.5 py-1 rounded border font-medium focus:outline-none cursor-pointer
                                                {{ $user->isAdmin() ? 'bg-purple-50 text-purple-900 border-purple-200' : 'bg-gray-100 text-gray-800 border-gray-200' }}">
                                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Client Member</option>
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrator</option>
                                        </select>
                                    </form>
                                    @if($user->id === auth()->id())
                                        <span class="text-[10px] text-gray-400 ml-1">(Current Session)</span>
                                    @endif
                                </td>

                                <td class="py-4 px-6 text-gray-500 whitespace-nowrap">
                                    <div>{{ $user->created_at->format('M d, Y') }}</div>
                                    <div class="text-[10px] text-gray-400">{{ $user->created_at->diffForHumans() }}</div>
                                </td>

                                <td class="py-4 px-6 text-right whitespace-nowrap">
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to permanently delete user account \'{{ $user->name }}\'?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 text-red-400 hover:text-red-700 transition-colors cursor-pointer" title="Delete User">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-xs text-gray-400 italic">Self</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-gray-400">
                                    No user accounts match the criteria.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($users->hasPages())
                <div class="p-4 border-t border-gray-100 flex justify-center">
                    {{ $users->withQueryString()->links() }}
                </div>
            @endif
        </div>

    </div>
</x-admin-layout>
