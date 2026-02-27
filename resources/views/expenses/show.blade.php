<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">
    <!-- Top Navigation -->
    <nav class="bg-slate-900/50 backdrop-blur-lg border-b border-slate-700/50 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('colocations.show') }}" class="text-slate-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <h1 class="text-2xl font-bold text-white">{{ $expense->title }}</h1>
                    @if($expense->category)
                        <span class="px-3 py-1 bg-indigo-600/20 text-indigo-400 text-sm rounded-full border border-indigo-500/30">
                            {{ $expense->category->name }}
                        </span>
                    @endif
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm text-slate-400">Total Amount</p>
                        <p class="text-2xl font-bold text-white">{{ number_format($expense->amount, 2) }} DH</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content - Expense Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Expense Info Card -->
                <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 border border-slate-700/50 shadow-xl">
                    <h2 class="text-xl font-bold text-white mb-6">Expense Information</h2>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-4 bg-slate-900/50 rounded-xl">
                            <span class="text-slate-400">Paid by</span>
                            <span class="text-white font-semibold">{{ $expense->payer->name }}</span>
                        </div>
                        <div class="flex justify-between items-center p-4 bg-slate-900/50 rounded-xl">
                            <span class="text-slate-400">Date</span>
                            <span class="text-white font-semibold">{{ $expense->date->format('M d, Y') }}</span>
                        </div>
                        <div class="flex justify-between items-center p-4 bg-slate-900/50 rounded-xl">
                            <span class="text-slate-400">Split between</span>
                            <span class="text-white font-semibold">{{ $expense->shares->count() }} members</span>
                        </div>
                        <div class="flex justify-between items-center p-4 bg-slate-900/50 rounded-xl">
                            <span class="text-slate-400">Amount per person</span>
                            <span class="text-white font-semibold">{{ number_format($expense->amount / $expense->shares->count(), 2) }} DH</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Qui doit à qui Card -->
                <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 border border-slate-700/50 shadow-xl">
                    <h3 class="text-lg font-bold text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Qui doit à qui ?
                    </h3>
                    
                    <div class="space-y-3">
                        @foreach($expense->shares as $share)
                            @if($share->user_id != $expense->payer_id)
                                <div class="p-4 bg-slate-900/50 rounded-xl border border-slate-700/30">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                                                <span class="text-white text-xs font-bold">{{ substr($share->user->name, 0, 1) }}</span>
                                            </div>
                                            <span class="text-white font-medium">{{ $share->user->name }}</span>
                                        </div>
                                        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center">
                                                <span class="text-white text-xs font-bold">{{ substr($expense->payer->name, 0, 1) }}</span>
                                            </div>
                                            <span class="text-slate-300">{{ $expense->payer->name }}</span>
                                        </div>
                                        <span class="{{ $share->is_paid ? 'text-green-500' : 'text-red-500' }} font-bold text-lg">
                                            {{ number_format($share->amount, 2) }} DH
                                        </span>
                                    </div>
                                    
                                    @if($share->is_paid)
                                        <div class="flex items-center justify-center space-x-2 text-green-500 text-sm font-semibold py-2">
                                            <span>Payé ✅</span>
                                        </div>
                                    @else
                                        @if(auth()->id() == $ownerId || auth()->id() == $share->user_id)
                                            <form action="{{ route('expense-shares.pay', $share->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="w-full bg-white hover:bg-slate-100 text-slate-900 text-sm font-semibold py-2 rounded-lg transition-colors border border-slate-300">
                                                    Marquer payé
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Members Card -->
                <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 border border-slate-700/50 shadow-xl">
                    <h3 class="text-lg font-bold text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Members
                    </h3>
                    
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
                                            <span class="text-xs text-indigo-400">Owner</span>
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
            </div>
        </div>
    </div>
</body>
</html>
