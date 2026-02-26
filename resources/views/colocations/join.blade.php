<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join a House</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-auto px-4">
        <div class="bg-slate-800 rounded-2xl p-8 border-2 border-slate-700">
            <h1 class="text-3xl font-bold text-white mb-2">Join a House</h1>
            <p class="text-slate-400 mb-8">Enter your invitation token to join</p>

            @if(session('error'))
                <div class="bg-red-500/10 border border-red-500 text-red-500 px-4 py-3 rounded-lg mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('invitations.join.manual') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="token" class="block text-sm font-medium text-slate-300 mb-2">Invitation Token</label>
                    <input type="text" 
                           name="token" 
                           id="token" 
                           required
                           class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent font-mono"
                           placeholder="Enter your token here">
                    @error('token')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" 
                        class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3 rounded-lg transition-colors">
                    Join House
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('welcome') }}" class="text-slate-400 hover:text-slate-300">
                    ← Back to home
                </a>
            </div>
        </div>
    </div>
</body>
</html>
