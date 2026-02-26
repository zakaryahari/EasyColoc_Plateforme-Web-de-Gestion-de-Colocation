<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#4f46e5", // Indigo-600 as the primary based on "Indigo" request
                        "background-light": "#f8fafd",
                        "background-dark": "#0f172a",
                    },
                    fontFamily: {
                        "display": ["Public Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <!-- Alpine.js for dropdown functionality -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<title>EasyColoc - Get Started</title>
</head>
<body class="font-display bg-background-light dark:bg-background-dark min-h-screen">
<div class="relative min-h-screen flex flex-col items-center justify-center p-6 overflow-hidden">
<!-- Background Decorative Elements -->
<div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-white to-indigo-100 dark:from-slate-900 dark:via-background-dark dark:to-indigo-950 -z-10"></div>
<div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-3xl"></div>
<div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-primary/10 rounded-full blur-3xl"></div>
<!-- Navigation / Logo Area -->
<header class="absolute top-0 w-full max-w-7xl px-8 py-6 flex justify-between items-center">
<a href="{{ route('colocations.choice') }}" class="flex items-center gap-2 group cursor-pointer">
<div class="bg-primary p-2 rounded-lg text-white shadow-lg shadow-primary/20">
<span class="material-symbols-outlined block text-2xl">home_work</span>
</div>
<h1 class="text-2xl font-black tracking-tight text-slate-900 dark:text-white">EasyColoc</h1>
</a>
<div class="flex items-center gap-4">
<!-- Replace your profile image div with this exact Breeze code -->
<x-dropdown align="right" width="48">
    <x-slot name="trigger">
        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
            <div>{{ Auth::user()->name }}</div>

            <div class="ms-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </button>
    </x-slot>

    <x-slot name="content">
        <!-- Reputation Display -->
        <div class="px-4 py-3 border-b border-gray-100">
            <p class="text-xs text-gray-500">Reputation: <span class="font-semibold text-indigo-600">{{ Auth::user()->reputation }} points</span></p>
        </div>

        <x-dropdown-link :href="route('profile.edit')">
            {{ __('Profile') }}
        </x-dropdown-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </x-slot>
</x-dropdown>

</div>
</header>
<!-- Main Content -->
<main class="w-full max-w-5xl mx-auto flex flex-col items-center gap-12 mt-12">
<!-- Hero Heading -->
<div class="text-center space-y-4 max-w-2xl">
<h2 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white leading-tight">
                    Welcome, <span class="text-primary">{{auth()->user()->name}}</span>
</h2>
<p class="text-lg text-slate-600 dark:text-slate-400 font-medium">
                    Let's get your colocation started. Choose how you'd like to begin your journey.
                </p>
</div>
<!-- Choice Cards Container -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full">
<!-- Card A: Create -->
<div class="group relative bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 flex flex-col items-center text-center">
<div class="mb-6 p-5 rounded-2xl bg-primary/10 text-primary group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-5xl">add_home</span>
</div>
<h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">Create a Colocation</h3>
<p class="text-slate-600 dark:text-slate-400 leading-relaxed mb-8 flex-grow">
                        Start a new house from scratch and invite your friends. You will be the Owner and manage all shared expenses.
                    </p>
<button class="w-full py-4 px-6 bg-primary hover:bg-primary/90 text-white rounded-xl font-bold text-lg shadow-lg shadow-primary/30 transition-all active:scale-[0.98]">
                        Create Now
                    </button>
</div>
<!-- Card B: Join -->
<div class="group relative bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 flex flex-col items-center text-center border-b-4 border-b-primary/20">
<div class="mb-6 p-5 rounded-2xl bg-indigo-50 dark:bg-slate-800 text-indigo-500 group-hover:scale-110 transition-transform duration-300">
<span class="material-symbols-outlined text-5xl">mail</span>
</div>
<h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3">Join via Invitation</h3>
<p class="text-slate-600 dark:text-slate-400 leading-relaxed mb-8 flex-grow">
                        Did a friend send you a link? Enter your invitation token here to join an existing house.
                    </p>
<div class="w-full space-y-4">
<div class="relative">
<input class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-900 dark:text-white focus:ring-2 focus:ring-primary/50 focus:border-primary outline-none transition-all text-center tracking-widest font-mono uppercase" placeholder="Invitation Token" type="text"/>
</div>
<button class="w-full py-4 px-6 border-2 border-primary text-primary hover:bg-primary hover:text-white rounded-xl font-bold text-lg transition-all active:scale-[0.98]">
                            Join House
                        </button>
</div>
</div>
</div>
<!-- Support Footer -->
<footer class="mt-8">
<p class="text-slate-500 dark:text-slate-500 text-sm flex items-center gap-2">
<span class="material-symbols-outlined text-sm">help_outline</span>
                    Need help? <a class="text-primary hover:underline font-semibold" href="#">Contact support</a>
</p>
</footer>
</main>
</div>
</body></html>