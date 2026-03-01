<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">
    @php
        $user = auth()->user();
    @endphp

    <!-- Top Navigation -->
    <nav class="bg-slate-900/50 backdrop-blur-lg border-b border-slate-700/50 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <h1 class="text-2xl font-bold text-white">Panneau Admin</h1>
                    <span class="px-3 py-1 bg-red-600/20 text-red-400 text-sm rounded-full border border-red-500/30">
                        {{ $users->count() }} Users
                    </span>
                </div>
                <div class="flex items-center space-x-4">
                    @if($user->hasActiveMembership())
                        <a href="{{ route('colocations.show') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-semibold px-4 py-2 rounded-lg transition-all shadow-lg">
                            Retour au Dashboard
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-semibold px-4 py-2 rounded-lg transition-all shadow-lg">
                            Retour au Dashboard
                        </a>
                    @endif
                    <div class="text-right">
                        <p class="text-sm text-slate-400">Admin</p>
                        <p class="text-white font-semibold">{{ $user->name }}</p>
                    </div>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center hover:ring-2 hover:ring-red-400 transition-all">
                            <span class="text-white font-bold">{{ substr($user->name, 0, 1) }}</span>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-slate-800 rounded-xl shadow-xl border border-slate-700 py-2 z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-slate-300 hover:bg-slate-700 hover:text-white transition-colors">
                                Edit Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-slate-300 hover:bg-slate-700 hover:text-white transition-colors">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 py-8">
        @if(session('success'))
            <div class="bg-green-500/20 border border-green-500 text-green-400 px-6 py-4 rounded-xl mb-6 flex items-center">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Statistics Header -->
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="bg-slate-800/50 rounded-xl p-4 border border-indigo-600/30">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-400 text-xs mb-1">Total Users</p>
                        <p class="text-2xl font-bold text-white">{{ $totalUsers }}</p>
                    </div>
                    <div class="w-10 h-10 bg-indigo-600/20 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-slate-800/50 rounded-xl p-4 border border-indigo-600/30">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-400 text-xs mb-1">Total Houses</p>
                        <p class="text-2xl font-bold text-white">{{ $totalColocations }}</p>
                    </div>
                    <div class="w-10 h-10 bg-purple-600/20 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-slate-800/50 rounded-xl p-4 border border-indigo-600/30">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-400 text-xs mb-1">Total Expenses</p>
                        <p class="text-2xl font-bold text-white">{{ number_format($totalExpenses, 0) }} DH</p>
                    </div>
                    <div class="w-10 h-10 bg-yellow-600/20 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-slate-800/50 rounded-xl p-4 border border-indigo-600/30">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-400 text-xs mb-1">Active Memberships</p>
                        <p class="text-2xl font-bold text-white">{{ $activeMemberships }}</p>
                    </div>
                    <div class="w-10 h-10 bg-green-600/20 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content - Users Table -->
            <div class="lg:col-span-2">
                <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 border border-slate-700/50 shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            Gestion des Utilisateurs
                        </h2>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-slate-700">
                                    <th class="px-4 py-3 text-left text-slate-400 font-semibold text-sm">User</th>
                                    <th class="px-4 py-3 text-left text-slate-400 font-semibold text-sm">Reputation</th>
                                    <th class="px-4 py-3 text-left text-slate-400 font-semibold text-sm">Status</th>
                                    <th class="px-4 py-3 text-left text-slate-400 font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700/50">
                                @foreach($users as $userItem)
                                    <tr class="hover:bg-slate-900/50 transition">
                                        <td class="px-4 py-4">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                                                    <span class="text-white text-sm font-bold">{{ substr($userItem->name, 0, 1) }}</span>
                                                </div>
                                                <div>
                                                    <div class="font-semibold text-white">{{ $userItem->name }}</div>
                                                    <div class="text-sm text-slate-400">{{ $userItem->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4">
                                            <span class="px-3 py-1 bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-sm font-bold rounded-full shadow-lg">
                                                {{ $userItem->reputation }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-4">
                                            @if($userItem->is_banned)
                                                <span class="flex items-center space-x-1 text-red-400">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                                                    </svg>
                                                    <span class="text-sm font-medium">Banni</span>
                                                </span>
                                            @else
                                                <span class="flex items-center space-x-1 text-green-400">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <span class="text-sm font-medium">Actif</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-4">
                                            <form action="{{ route('admin.toggleBan', $userItem->id) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="{{ $userItem->is_banned ? 'bg-green-600 hover:bg-green-700' : 'bg-red-600 hover:bg-red-700' }} text-white px-4 py-2 rounded-lg transition font-medium text-sm shadow-lg">
                                                    {{ $userItem->is_banned ? 'Débannir' : 'Bannir' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Sidebar - Stats -->
            <div class="space-y-6">
                <!-- Total Users Card -->
                <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 border border-slate-700/50 shadow-xl">
                    <h3 class="text-lg font-bold text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Statistiques
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-slate-900/50 rounded-xl border border-slate-700/30">
                            <div>
                                <p class="text-slate-400 text-sm">Total Users</p>
                                <p class="text-2xl font-bold text-white">{{ $users->count() }}</p>
                            </div>
                            <div class="w-12 h-12 bg-indigo-600/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-slate-900/50 rounded-xl border border-slate-700/30">
                            <div>
                                <p class="text-slate-400 text-sm">Active Users</p>
                                <p class="text-2xl font-bold text-green-400">{{ $users->where('is_banned', false)->count() }}</p>
                            </div>
                            <div class="w-12 h-12 bg-green-600/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-slate-900/50 rounded-xl border border-slate-700/30">
                            <div>
                                <p class="text-slate-400 text-sm">Banned Users</p>
                                <p class="text-2xl font-bold text-red-400">{{ $users->where('is_banned', true)->count() }}</p>
                            </div>
                            <div class="w-12 h-12 bg-red-600/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Admin Info Card -->
                <div class="bg-gradient-to-br from-red-800 to-red-900 rounded-2xl p-6 border border-red-700/50 shadow-xl">
                    <h3 class="text-lg font-bold text-white mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Admin Access
                    </h3>
                    <p class="text-red-200 text-sm leading-relaxed">
                        You have full administrative privileges. Use ban/unban actions carefully.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
