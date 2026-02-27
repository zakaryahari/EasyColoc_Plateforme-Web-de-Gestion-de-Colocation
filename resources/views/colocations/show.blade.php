<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colocation Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">
    @php
        $user = auth()->user();
        $membership = $user->colocations()->wherePivot('left_at', null)->first();
        $colocation = $membership;
        $colocationId = $membership->id;
        
        $expenses = \App\Models\Expense::where('colocation_id', $colocationId)
            ->with(['payer', 'shares.user', 'category'])
            ->latest()
            ->get();
        
        $members = \App\Models\User::whereHas('colocations', function($q) use ($colocationId) {
            $q->where('colocations.id', $colocationId)->whereNull('colocation_user.left_at');
        })->get();
        
        $owedToMe = \App\Models\ExpenseShare::whereHas('expense', function($q) use ($colocationId) {
            $q->where('colocation_id', $colocationId)->where('payer_id', auth()->id());
        })
        ->where('user_id', '!=', auth()->id())
        ->where('is_paid', false)
        ->with('user')
        ->get()
        ->groupBy('user_id');
        
        $ownerId = DB::table('colocation_user')
            ->where('colocation_id', $colocationId)
            ->where('role', 'owner')
            ->whereNull('left_at')
            ->value('user_id');
        
        $categories = \App\Models\Category::all();
    @endphp

    <!-- Top Navigation -->
    <nav class="bg-slate-900/50 backdrop-blur-lg border-b border-slate-700/50 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <h1 class="text-2xl font-bold text-white">{{ $colocation->name }}</h1>
                    <span class="px-3 py-1 bg-indigo-600/20 text-indigo-400 text-sm rounded-full border border-indigo-500/30">
                        {{ $members->count() }} Members
                    </span>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm text-slate-400">Welcome back,</p>
                        <p class="text-white font-semibold">{{ auth()->user()->name }}</p>
                    </div>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center hover:ring-2 hover:ring-indigo-400 transition-all">
                            <span class="text-white font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
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
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content - Expenses -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 border border-slate-700/50 shadow-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-slate-400 text-sm mb-1">Total Expenses</p>
                                <p class="text-3xl font-bold text-white">{{ $expenses->count() }}</p>
                            </div>
                            <div class="w-12 h-12 bg-indigo-600/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 border border-slate-700/50 shadow-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-slate-400 text-sm mb-1">Your Reputation</p>
                                <p class="text-3xl font-bold text-white">{{ auth()->user()->reputation ?? 100 }}</p>
                            </div>
                            <div class="w-12 h-12 bg-green-600/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 border border-slate-700/50 shadow-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-slate-400 text-sm mb-1">Owed to You</p>
                                <p class="text-3xl font-bold text-white">{{ number_format($owedToMe->sum(fn($s) => $s->sum('amount')), 0) }} DH</p>
                            </div>
                            <div class="w-12 h-12 bg-yellow-600/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expense History -->
                <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 border border-slate-700/50 shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Recent Expenses
                        </h2>
                        <button onclick="document.getElementById('expenseModal').classList.remove('hidden')" 
                                class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-semibold px-6 py-2 rounded-xl transition-all shadow-lg hover:shadow-indigo-500/50 flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span>Add Expense</span>
                        </button>
                    </div>
                    
                    <div class="space-y-3">
                        @forelse($expenses as $expense)
                            <div class="block bg-slate-900/50 rounded-xl p-5 border border-slate-700/50 hover:border-indigo-500/50 transition-all hover:shadow-lg hover:shadow-indigo-500/10 group">
                                <div class="flex justify-between items-start">
                                    <a href="{{ route('expenses.show', $expense->id) }}" class="flex-1">
                                        <div class="flex items-center space-x-3 mb-2">
                                            <h3 class="text-lg font-semibold text-white group-hover:text-indigo-400 transition-colors">{{ $expense->title }}</h3>
                                            @if($expense->category)
                                                <span class="px-2 py-1 bg-indigo-600/20 text-indigo-400 text-xs rounded-lg border border-indigo-500/30">
                                                    {{ $expense->category->name }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="flex items-center space-x-4 text-sm text-slate-400">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                                <span class="text-indigo-400">{{ $expense->payer->name }}</span>
                                            </span>
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                {{ $expense->date->format('M d, Y') }}
                                            </span>
                                        </div>
                                    </a>
                                    <div class="flex items-center space-x-3">
                                        <p class="text-2xl font-bold text-white">{{ number_format($expense->amount, 2) }} DH</p>
                                        @if(auth()->id() == $ownerId)
                                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this expense?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-400 transition-colors p-2">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 mx-auto text-slate-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <p class="text-slate-400">No expenses yet</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Balance Card -->
                <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 border border-slate-700/50 shadow-xl">
                    <h3 class="text-lg font-bold text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Who Owes You
                    </h3>
                    
                    @forelse($owedToMe as $userId => $shares)
                        @php
                            $totalOwed = $shares->sum('amount');
                            $debtor = $shares->first()->user;
                        @endphp
                        <div class="mb-4 pb-4 border-b border-slate-700/50 last:border-0">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">{{ substr($debtor->name, 0, 1) }}</span>
                                    </div>
                                    <span class="text-slate-300 font-medium">{{ $debtor->name }}</span>
                                </div>
                                <span class="text-yellow-400 font-bold">{{ number_format($totalOwed, 2) }} DH</span>
                            </div>
                            <p class="text-xs text-slate-500 ml-10">owes you</p>
                        </div>
                    @empty
                        <p class="text-slate-500 text-sm text-center py-4">No pending payments</p>
                    @endforelse
                </div>

                <!-- Members Card -->
                <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 border border-slate-700/50 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-bold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Members
                        </h3>
                        @if(auth()->id() == $ownerId)
                            <button onclick="document.getElementById('inviteModal').classList.remove('hidden')" 
                                    class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white text-xs font-semibold px-3 py-1.5 rounded-lg transition-all shadow-lg hover:shadow-indigo-500/50 flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span>Invite</span>
                            </button>
                        @endif
                    </div>
                    
                    <div class="space-y-3">
                        @foreach($members as $member)
                            <div class="flex items-center justify-between p-3 bg-slate-900/50 rounded-xl border border-slate-700/30">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold">{{ substr($member->name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <p class="text-white font-medium">{{ $member->name }}</p>
                                        @if($member->id == $ownerId)
                                            <span class="text-xs text-indigo-400 flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                Owner
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-xs font-bold rounded-full shadow-lg">
                                    {{ $member->reputation ?? 100 }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Leave Button -->
                @if(auth()->id() == $ownerId && $members->count() > 1)
                    <div class="bg-slate-900/50 rounded-2xl p-4 border border-slate-700/50 text-center">
                        <svg class="w-12 h-12 mx-auto text-slate-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <p class="text-slate-400 text-sm">Owner cannot leave while other members are present</p>
                    </div>
                @else
                    <form action="{{ route('colocations.leave') }}" method="POST" onsubmit="return confirm('Are you sure you want to leave this colocation? Your reputation will decrease by 1 point.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white font-bold py-4 rounded-2xl transition-all shadow-lg hover:shadow-red-500/50 flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Leave Colocation</span>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <!-- Invite Modal -->
    <div id="inviteModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-8 shadow-2xl max-w-md w-full border border-slate-700">
            <h3 class="text-2xl font-bold text-white mb-6">Invite Someone</h3>

            <form id="inviteForm" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Email Address</label>
                    <input type="email" name="email" required
                           class="w-full px-4 py-3 bg-slate-900 border border-slate-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                           placeholder="friend@example.com">
                </div>

                <div id="inviteSuccess" class="hidden bg-indigo-600/20 border border-indigo-500/50 rounded-lg p-4">
                    <p class="text-indigo-300 text-sm font-medium" id="successMessage"></p>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" 
                            onclick="document.getElementById('inviteModal').classList.add('hidden'); document.getElementById('inviteSuccess').classList.add('hidden');"
                            class="px-6 py-3 border border-slate-600 text-slate-300 font-medium rounded-lg hover:bg-slate-700 transition-colors">
                        Close
                    </button>
                    <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-medium rounded-lg transition-all shadow-lg">
                        Send Invitation
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Expense Modal -->
    <div id="expenseModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl p-8 shadow-2xl max-w-2xl w-full">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Nouvelle dépense</h3>

            <form action="{{ route('expenses.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Titre -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Titre</label>
                    <input type="text" name="title" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                           placeholder="Enter ....">
                </div>

                <!-- Montant & Date -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Montant (DH)</label>
                        <input type="number" name="amount" step="0.01" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                               placeholder="0.00">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                        <input type="date" name="date" value="{{ date('Y-m-d') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Payé par & Catégorie -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Payé par</label>
                        <select name="payer_id" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">Sélectionner</option>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}" {{ $member->id == auth()->id() ? 'selected' : '' }}>
                                    {{ $member->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                        <select name="category_id" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">Sélectionner</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" 
                            onclick="document.getElementById('expenseModal').classList.add('hidden')"
                            class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors">
                        Annuler
                    </button>
                    <button type="submit" 
                            class="px-6 py-3 bg-[#4f46e5] hover:bg-[#4338ca] text-white font-medium rounded-lg transition-colors">
                        Enregistrer la dépense
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('inviteForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            try {
                const response = await fetch('{{ route('invitations.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        email: formData.get('email')
                    })
                });
                
                const data = await response.json();
                document.getElementById('successMessage').textContent = data.message;
                document.getElementById('inviteSuccess').classList.remove('hidden');
                this.reset();
            } catch (error) {
                alert('Error sending invitation');
            }
        });
    </script>
</body>
</html>
