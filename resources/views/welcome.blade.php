<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Colocation App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold text-white mb-4">
                Welcome to <span class="text-indigo-500">Colocation</span>
            </h1>
            <p class="text-xl text-slate-400 max-w-2xl mx-auto">
                Manage your shared living expenses effortlessly. Start your own house or join an existing one.
            </p>
        </div>

        <!-- Choice Cards -->
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Card A: Start a New House -->
            <a href="{{ route('colocations.create.page') }}" 
               class="group bg-slate-800 rounded-2xl p-8 border-2 border-slate-700 hover:border-indigo-600 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-indigo-600/20">
                <div class="flex flex-col items-center text-center space-y-6">
                    <div class="w-20 h-20 bg-indigo-600 rounded-full flex items-center justify-center group-hover:bg-indigo-500 transition-colors">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white mb-2">Start a New House</h2>
                        <p class="text-slate-400">
                            Create your own colocation and invite roommates to join you.
                        </p>
                    </div>
                    <div class="pt-4">
                        <span class="inline-flex items-center text-indigo-400 font-semibold group-hover:text-indigo-300">
                            Get Started
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </a>

            <!-- Card B: Join a House -->
            <a href="{{ route('colocations.join.page') }}" 
               class="group bg-slate-800 rounded-2xl p-8 border-2 border-slate-700 hover:border-indigo-600 transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-indigo-600/20">
                <div class="flex flex-col items-center text-center space-y-6">
                    <div class="w-20 h-20 bg-indigo-600 rounded-full flex items-center justify-center group-hover:bg-indigo-500 transition-colors">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white mb-2">Join a House</h2>
                        <p class="text-slate-400">
                            Enter your invitation token to join an existing colocation.
                        </p>
                    </div>
                    <div class="pt-4">
                        <span class="inline-flex items-center text-indigo-400 font-semibold group-hover:text-indigo-300">
                            Join Now
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Footer -->
        <div class="text-center mt-16">
            <p class="text-slate-500">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold">Sign in</a>
            </p>
        </div>
    </div>
</body>
</html>
