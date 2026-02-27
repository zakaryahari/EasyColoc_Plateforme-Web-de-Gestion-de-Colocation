<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>EasyColoc Admin - Gestion des Utilisateurs</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#6467f2",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101122",
                    },
                    fontFamily: {
                        "display": ["Inter"]
                    },
                    borderRadius: {"DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px"},
                },
            },
        }
    </script>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 min-h-screen">
<div class="flex h-screen overflow-hidden">
<!-- SideNavBar -->
<aside class="w-64 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 flex flex-col shrink-0">
<div class="p-6 flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-primary flex items-center justify-center text-white">
<span class="material-symbols-outlined">home_work</span>
</div>
<div>
<h1 class="text-slate-900 dark:text-white font-bold text-lg leading-tight">EasyColoc</h1>
<p class="text-slate-500 text-xs font-medium">Admin Console</p>
</div>
</div>
<nav class="flex-1 px-4 space-y-1">
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="text-sm font-medium">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 bg-primary/10 text-primary rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">group</span>
<span class="text-sm font-medium">Users</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">receipt_long</span>
<span class="text-sm font-medium">Expenses</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="text-sm font-medium">Settings</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">description</span>
<span class="text-sm font-medium">Logs</span>
</a>
</nav>
<div class="p-4 border-t border-slate-200 dark:border-slate-800">
<div class="flex items-center gap-3 p-2">
<div class="size-8 rounded-full bg-slate-200" data-alt="Admin user profile avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC4vZIV0oRCguWQ618AMoX0pFkqQ821nU6UDXpN1KZSmzTDZoxH4NCHqDYNgcM2aeFFXleiAb-mdHcOfFlJ0l1hkqeMeUkmZwN2LnlskWLBnRDLM1Y3LkJisT_ZJ4GzDT1qz0GtCDQNS2GECLRoBrho0qVccjGr9oO3thUUULvmhP2z_zsxvFIKXYL9AfUBBsP7w06ZVOFT2SYxB4VtTsE9iVlSVj-JA3utLbvK9mcirEnPZRKTTgOaiiFHkaPG81zXiZK4De9pe8c'); background-size: cover;"></div>
<div class="flex-1 overflow-hidden">
<p class="text-sm font-medium truncate">System Admin</p>
<p class="text-xs text-slate-500 truncate">admin@easycoloc.com</p>
</div>
<span class="material-symbols-outlined text-slate-400 text-sm">logout</span>
</div>
</div>
</aside>
<!-- Main Content -->
<main class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark">
<div class="max-w-7xl mx-auto p-8">
<!-- Stat Cards Row -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
<div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
<div class="flex justify-between items-start mb-4">
<span class="text-slate-500 text-sm font-medium">Total Users</span>
<div class="p-2 bg-primary/10 rounded-lg text-primary">
<span class="material-symbols-outlined">person</span>
</div>
</div>
<div class="flex items-baseline gap-2">
<p class="text-2xl font-bold text-slate-900 dark:text-white">1,284</p>
<span class="text-emerald-500 text-xs font-semibold">+12%</span>
</div>
</div>
<div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
<div class="flex justify-between items-start mb-4">
<span class="text-slate-500 text-sm font-medium">Active Colocations</span>
<div class="p-2 bg-primary/10 rounded-lg text-primary">
<span class="material-symbols-outlined">apartment</span>
</div>
</div>
<div class="flex items-baseline gap-2">
<p class="text-2xl font-bold text-slate-900 dark:text-white">432</p>
<span class="text-emerald-500 text-xs font-semibold">+5%</span>
</div>
</div>
<div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
<div class="flex justify-between items-start mb-4">
<span class="text-slate-500 text-sm font-medium">Total Expenses</span>
<div class="p-2 bg-primary/10 rounded-lg text-primary">
<span class="material-symbols-outlined">payments</span>
</div>
</div>
<div class="flex items-baseline gap-2">
<p class="text-2xl font-bold text-slate-900 dark:text-white">$12,850</p>
<span class="text-emerald-500 text-xs font-semibold">+18%</span>
</div>
</div>
<div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
<div class="flex justify-between items-start mb-4">
<span class="text-slate-500 text-sm font-medium">Banned Users</span>
<div class="p-2 bg-red-500/10 rounded-lg text-red-500">
<span class="material-symbols-outlined">block</span>
</div>
</div>
<div class="flex items-baseline gap-2">
<p class="text-2xl font-bold text-slate-900 dark:text-white">14</p>
<span class="text-red-500 text-xs font-semibold">-2%</span>
</div>
</div>
</div>
<!-- Main Section Header -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
<h2 class="text-2xl font-bold text-slate-900 dark:text-white">Gestion des Utilisateurs</h2>
<div class="flex items-center gap-3">
<button class="px-4 py-2 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-lg text-sm font-medium hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors flex items-center gap-2">
<span class="material-symbols-outlined text-base">download</span>
                            Export CSV
                        </button>
<button class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors flex items-center gap-2">
<span class="material-symbols-outlined text-base">person_add</span>
                            Ajouter un utilisateur
                        </button>
</div>
</div>
<!-- Table Area -->
<div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
<div class="p-4 border-b border-slate-200 dark:border-slate-800 flex justify-end">
<div class="relative w-full max-w-sm">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-slate-50 dark:bg-slate-800 border-none rounded-lg text-sm focus:ring-2 focus:ring-primary/20 placeholder:text-slate-400" placeholder="Rechercher un utilisateur..." type="text"/>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-slate-50 dark:bg-slate-800/50">
<th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider w-12">#</th>
<th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Name</th>
<th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Email</th>
<th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Reputation</th>
<th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
<th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Role</th>
<th class="px-6 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 dark:divide-slate-800">
<!-- Row 1 -->
<tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/50 transition-colors">
<td class="px-6 py-4 text-sm text-slate-500">1</td>
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="size-10 rounded-full bg-slate-100" data-alt="Alice Chen avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA7QazYEgfgu5cCHhAzDSU8Ew7XAAT5cuKUIaN0PLa6R65AMzPjmW9WH0x3eZguLlBgJbqOWe3OUaHHWOSbrOVLdM1I9tePXhjaoe8bPECAdLMJ89mHOsiznDJCufVBuLdBJGigkpJUsHrRUDkS1OEO97Qc4iD5CrhbuekgXu-OGpDuwE2p4FMeBq6axbUoWdmCJ5ASZ3uitUyC72ysi3PUHT7iWBuh6tTdVfKE9_xpaBpmI8uo4UsVKMoze_m0v05amd4r40mz4Yc'); background-size: cover;"></div>
<span class="text-sm font-semibold text-slate-900 dark:text-white">Alice Chen</span>
</div>
</td>
<td class="px-6 py-4 text-sm text-slate-500">alice@example.com</td>
<td class="px-6 py-4">
<span class="text-sm font-medium text-slate-700 dark:text-slate-300">98 pts</span>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">
                                            Active
                                        </span>
</td>
<td class="px-6 py-4 text-sm text-slate-500 font-medium">Admin</td>
<td class="px-6 py-4 text-right">
<button class="px-3 py-1.5 bg-slate-100 dark:bg-slate-800 text-slate-400 rounded-lg text-xs font-bold cursor-not-allowed" disabled="">
                                            Protected
                                        </button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/50 transition-colors">
<td class="px-6 py-4 text-sm text-slate-500">2</td>
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="size-10 rounded-full bg-slate-100" data-alt="Bob Smith avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA04rsNiurVc4kVi8K41KtJJ_Cm-gIQIK5NIPUxzQ_NCt6IST8kIh0_AhKqOZkFhFnJJFGARkd9FNAUhIzO86WVMMkYZTytzaRfJKn5ZJRl8aUSUe5vg-dQoc17i6jyYR1aPF27o5uenY7em3RPAVhaA-s_O7FLuZRMmktvyM1ppsdMA0qi4wFkq0bgwjmAalOhiT-dwMBaCHRU0OCKDSxMcyevpE7v8g8MTjR5WWMPBkhxUOIAqi_p1nKphJTGaJjU4QlwbGs8oC4'); background-size: cover;"></div>
<span class="text-sm font-semibold text-slate-900 dark:text-white">Bob Smith</span>
</div>
</td>
<td class="px-6 py-4 text-sm text-slate-500">bob@example.com</td>
<td class="px-6 py-4">
<span class="text-sm font-medium text-slate-700 dark:text-slate-300">45 pts</span>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">
                                            Active
                                        </span>
</td>
<td class="px-6 py-4 text-sm text-slate-500">Member</td>
<td class="px-6 py-4 text-right">
<button class="px-3 py-1.5 border border-red-200 text-red-600 dark:border-red-900/50 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg text-xs font-bold transition-colors">
                                            Ban
                                        </button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/50 transition-colors">
<td class="px-6 py-4 text-sm text-slate-500">3</td>
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="size-10 rounded-full bg-slate-100" data-alt="Evan Wright avatar" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBqLqL513MTjyUE8lo7MhrzoD5h3nj4VU7oDEZBf_Swh509oJOm4qiT4FT5SBRXprCPt4H80BHkZMySFPDofxKQHcin4ZaXyu9fwR6ks7XBWGwRMHCzJdS-dJm2hfE0S2Uc9n2c1ML81slzFdbolRIOZqvKRr49touAEZZQpO9kjfPhH14L1Vv9zmXPlnNleHOUX17o75UkiBqULQbrVzMTDjliRWhNpeT5Oc6SGVc4zSSsuuY3PV1NUxADycH2b-bDuEv-DbyrL58'); background-size: cover;"></div>
<span class="text-sm font-semibold text-slate-900 dark:text-white">Evan Wright</span>
</div>
</td>
<td class="px-6 py-4 text-sm text-slate-500">evan@example.com</td>
<td class="px-6 py-4">
<span class="text-sm font-medium text-slate-700 dark:text-slate-300">12 pts</span>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                            Banned
                                        </span>
</td>
<td class="px-6 py-4 text-sm text-slate-500">Member</td>
<td class="px-6 py-4 text-right">
<button class="px-3 py-1.5 border border-emerald-200 text-emerald-600 dark:border-emerald-900/50 dark:text-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 rounded-lg text-xs font-bold transition-colors">
                                            Unban
                                        </button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination (Added for completeness) -->
<div class="px-6 py-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
<p class="text-sm text-slate-500">Showing 1 to 3 of 1,284 users</p>
<div class="flex items-center gap-2">
<button class="p-2 bg-slate-50 dark:bg-slate-800 rounded-lg text-slate-400 hover:text-slate-600">
<span class="material-symbols-outlined text-sm">chevron_left</span>
</button>
<button class="size-8 rounded-lg bg-primary text-white text-sm font-medium">1</button>
<button class="size-8 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 text-sm font-medium">2</button>
<button class="size-8 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 text-sm font-medium">3</button>
<span class="px-2 text-slate-400">...</span>
<button class="p-2 bg-slate-50 dark:bg-slate-800 rounded-lg text-slate-400 hover:text-slate-600">
<span class="material-symbols-outlined text-sm">chevron_right</span>
</button>
</div>
</div>
</div>
</div>
</main>
</div>
</body></html>