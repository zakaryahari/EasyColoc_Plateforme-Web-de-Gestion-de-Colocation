<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Shared Expenses Feed - EasyColoc</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#6467f2",
                        "primary-dark": "#4f52c9",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101122",
                        "surface-light": "#ffffff",
                        "surface-dark": "#1a1b2e",
                        "border-light": "#eaeaef",
                        "border-dark": "#2a2b45",
                    },
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                        display: ["Inter", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                        lg: "0.75rem",
                        xl: "1rem",
                        "2xl": "1.5rem",
                        full: "9999px"
                    },
                    boxShadow: {
                        'soft': '0 2px 10px rgba(0, 0, 0, 0.03)',
                        'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.07)',
                    }
                },
            },
        }
    </script>
<style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        .dark .glass-card {
            background: rgba(26, 27, 46, 0.6);
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 min-h-screen transition-colors duration-200">
<div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden">
<!-- Header / Nav -->
<header class="sticky top-0 z-50 w-full border-b border-border-light dark:border-border-dark bg-surface-light/80 dark:bg-surface-dark/80 backdrop-blur-md">
<div class="flex h-16 items-center justify-between px-6 lg:px-10 max-w-[1400px] mx-auto w-full">
<div class="flex items-center gap-8">
<div class="flex items-center gap-3">
<div class="flex size-8 items-center justify-center rounded-lg bg-primary/10 text-primary">
<span class="material-symbols-outlined">account_balance_wallet</span>
</div>
<h2 class="text-slate-900 dark:text-white text-lg font-bold tracking-tight">EasyColoc</h2>
</div>
<!-- Desktop Nav -->
<nav class="hidden md:flex items-center gap-6">
<a class="text-slate-500 hover:text-primary dark:text-slate-400 dark:hover:text-primary-dark text-sm font-medium transition-colors" href="#">Dashboard</a>
<a class="text-slate-900 dark:text-white text-sm font-medium" href="#">Expenses</a>
<a class="text-slate-500 hover:text-primary dark:text-slate-400 dark:hover:text-primary-dark text-sm font-medium transition-colors" href="#">Settlements</a>
<a class="text-slate-500 hover:text-primary dark:text-slate-400 dark:hover:text-primary-dark text-sm font-medium transition-colors" href="#">Settings</a>
</nav>
</div>
<div class="flex items-center gap-4">
<!-- Search -->
<div class="hidden lg:flex items-center rounded-lg bg-slate-100 dark:bg-slate-800/50 px-3 py-1.5 focus-within:ring-2 focus-within:ring-primary/50 transition-all">
<span class="material-symbols-outlined text-slate-400 text-[20px]">search</span>
<input class="bg-transparent border-none text-sm text-slate-900 dark:text-white placeholder-slate-400 focus:ring-0 w-48" placeholder="Search expenses..." type="text"/>
</div>
<button class="flex items-center justify-center gap-2 rounded-lg bg-primary hover:bg-primary-dark text-white px-4 py-2 text-sm font-semibold transition-all shadow-lg shadow-primary/20">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>Add Expense</span>
</button>
<div class="h-9 w-9 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden ring-2 ring-white dark:ring-slate-800 cursor-pointer">
<img alt="User Profile" class="h-full w-full object-cover" data-alt="User profile picture" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDaKNk2UXAy3D_zUA_F8SSESx4cqeOcqx2pGCmRR0pIsEGmF-YkZkBJYWSlCUxr4K-pD8hRyhP8d0qPVLodIK3u85hjiTy2IZOjGbc4l2of43SVWxdEGjfy96dy2zGl-4x0CXUV8w1AMFiCUFW6LISrBLOsnHHy5TnLcDu8WoCNoquD1_lW2-6OflkLJ0xCz1ze9TMr-2glKfewKPw6_Ihy7nbgiVeUo20fHU7J57wLohtqbNcuWG7dJnBkUlAHgLt0DJCJ8rt0pA4"/>
</div>
</div>
</div>
</header>
<!-- Main Content -->
<main class="flex-1 w-full max-w-[1400px] mx-auto px-6 lg:px-10 py-8">
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
<div>
<h1 class="text-3xl font-bold text-slate-900 dark:text-white tracking-tight mb-2">Shared Expenses Feed</h1>
<p class="text-slate-500 dark:text-slate-400">Track collective spending and manage reimbursements efficiently.</p>
</div>
<div class="flex gap-3">
<button class="flex items-center gap-2 px-4 py-2 rounded-xl border border-border-light dark:border-border-dark bg-surface-light dark:bg-surface-dark hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors text-slate-700 dark:text-slate-300 text-sm font-medium shadow-sm">
<span class="material-symbols-outlined text-[18px]">download</span>
                        Export CSV
                    </button>
<button class="flex items-center gap-2 px-4 py-2 rounded-xl bg-surface-light dark:bg-surface-dark border border-border-light dark:border-border-dark hover:border-primary/50 text-slate-900 dark:text-white text-sm font-medium shadow-sm transition-all group">
<span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors text-[18px]">calendar_today</span>
<span>October 2023</span>
<span class="material-symbols-outlined text-slate-400 text-[18px]">expand_more</span>
</button>
</div>
</div>
<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
<!-- Stat Card 1 -->
<div class="glass-card p-5 rounded-2xl border border-white/20 dark:border-slate-700/50 shadow-soft flex flex-col gap-1">
<span class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Spending</span>
<div class="flex items-baseline justify-between">
<span class="text-2xl font-bold text-slate-900 dark:text-white">$4,250.00</span>
<span class="flex items-center text-xs font-semibold text-emerald-500 bg-emerald-500/10 px-2 py-0.5 rounded-full">
<span class="material-symbols-outlined text-[14px] mr-0.5">trending_up</span> 12%
                        </span>
</div>
</div>
<!-- Stat Card 2 -->
<div class="glass-card p-5 rounded-2xl border border-white/20 dark:border-slate-700/50 shadow-soft flex flex-col gap-1">
<span class="text-sm font-medium text-slate-500 dark:text-slate-400">Your Share</span>
<div class="flex items-baseline justify-between">
<span class="text-2xl font-bold text-slate-900 dark:text-white">$1,062.50</span>
<span class="text-xs font-medium text-slate-400 bg-slate-100 dark:bg-slate-800 px-2 py-0.5 rounded-full">No change</span>
</div>
</div>
<!-- Stat Card 3 -->
<div class="glass-card p-5 rounded-2xl border border-white/20 dark:border-slate-700/50 shadow-soft flex flex-col gap-1">
<span class="text-sm font-medium text-slate-500 dark:text-slate-400">Settled</span>
<div class="flex items-baseline justify-between">
<span class="text-2xl font-bold text-slate-900 dark:text-white">$3,200.00</span>
<span class="flex items-center text-xs font-semibold text-emerald-500 bg-emerald-500/10 px-2 py-0.5 rounded-full">
<span class="material-symbols-outlined text-[14px] mr-0.5">check</span> 5%
                        </span>
</div>
</div>
<!-- Stat Card 4 -->
<div class="glass-card p-5 rounded-2xl border border-white/20 dark:border-slate-700/50 shadow-soft flex flex-col gap-1">
<span class="text-sm font-medium text-slate-500 dark:text-slate-400">Pending</span>
<div class="flex items-baseline justify-between">
<span class="text-2xl font-bold text-slate-900 dark:text-white">$1,050.00</span>
<span class="flex items-center text-xs font-semibold text-red-500 bg-red-500/10 px-2 py-0.5 rounded-full">
<span class="material-symbols-outlined text-[14px] mr-0.5">trending_down</span> -2%
                        </span>
</div>
</div>
</div>
<!-- Feed Section -->
<div class="space-y-4">
<div class="flex items-center justify-between mb-2 px-2">
<h3 class="text-sm font-semibold uppercase text-slate-500 tracking-wider">Recent Transactions</h3>
<button class="text-sm text-primary hover:text-primary-dark font-medium hover:underline">View All</button>
</div>
<!-- Expense Card 1 -->
<div class="group relative flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-surface-light dark:bg-surface-dark rounded-xl border border-border-light dark:border-slate-700/60 shadow-sm hover:shadow-md hover:border-primary/30 transition-all duration-300">
<div class="flex items-center gap-4 w-full sm:w-auto">
<div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400">
<span class="material-symbols-outlined">shopping_basket</span>
</div>
<div class="flex flex-col">
<h4 class="text-base font-semibold text-slate-900 dark:text-white group-hover:text-primary transition-colors">Grocery Run - Whole Foods</h4>
<div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
<span class="flex items-center gap-1">
<img alt="Alex" class="h-4 w-4 rounded-full" data-alt="Small avatar of Alex" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAp6lo8BxKSSG_XmnQwUcdiRNrSIa4a7fpAu2xLky7q4TSh-48IdgzdD1LTdiar66saxAP3w--5HdV0DfbiQf7ofsB3sBXH6BkhSRwIgna8-noRhHnREI_0pEPumSGXRVg3AFeLx945T2R3WoiTzRICFfPaGpIfXaHdBQCkZC7VgqbSQpA7-mlb9qkseIr-6991x8xd15qR0HlnI8yhXn9fAXt-JF2YDhTGTLs0piJjHD2RqxB15eq5YUuAeueb1dmHQk5NdIBPGQU"/>
                                    Paid by Alex
                                </span>
<span>•</span>
<span>Oct 24, 2023</span>
</div>
</div>
</div>
<div class="mt-4 sm:mt-0 flex w-full sm:w-auto items-center justify-between sm:justify-end gap-6 pl-[4rem] sm:pl-0">
<div class="flex flex-col items-end">
<span class="text-lg font-bold text-slate-900 dark:text-white">$145.20</span>
<span class="text-xs font-medium text-slate-400">Split equally</span>
</div>
<button class="h-8 w-8 flex items-center justify-center rounded-full bg-slate-50 dark:bg-slate-800 text-slate-400 hover:text-primary hover:bg-primary/10 transition-colors">
<span class="material-symbols-outlined text-[20px]">chevron_right</span>
</button>
</div>
</div>
<!-- Expense Card 2 -->
<div class="group relative flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-surface-light dark:bg-surface-dark rounded-xl border border-border-light dark:border-slate-700/60 shadow-sm hover:shadow-md hover:border-primary/30 transition-all duration-300">
<div class="flex items-center gap-4 w-full sm:w-auto">
<div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400">
<span class="material-symbols-outlined">water_drop</span>
</div>
<div class="flex flex-col">
<h4 class="text-base font-semibold text-slate-900 dark:text-white group-hover:text-primary transition-colors">Water Bill - Oct</h4>
<div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
<span class="flex items-center gap-1">
<img alt="Sarah" class="h-4 w-4 rounded-full" data-alt="Small avatar of Sarah" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBwE6YY94uKOaq_CyPAQab8XlcuXaXR0mCBT-SZAHkPslB0IWKOarX2VF5IJTgTF8MjqpxG_3t8B6LaEg76biK8i1hLgywv02Qo7CfRRpbHL2P0zeHrOr3ZpGm41RRkQSR85Dl6q1KT52htLLWwb91nBBG9j2xbJRS62khfpffnZttLjAhY43VFUpq1wr4cgxIkjgqMEVuz_tPI5a0aydqiS1Kr65c0VarFnJbVzKz8CtUuHr4QH6QeryvoCdhTpxnmuWI0tobc-Uo"/>
                                    Paid by Sarah
                                </span>
<span>•</span>
<span>Oct 22, 2023</span>
</div>
</div>
</div>
<div class="mt-4 sm:mt-0 flex w-full sm:w-auto items-center justify-between sm:justify-end gap-6 pl-[4rem] sm:pl-0">
<div class="flex flex-col items-end">
<span class="text-lg font-bold text-slate-900 dark:text-white">$45.00</span>
<span class="text-xs font-medium text-emerald-500">Settled</span>
</div>
<button class="h-8 w-8 flex items-center justify-center rounded-full bg-slate-50 dark:bg-slate-800 text-slate-400 hover:text-primary hover:bg-primary/10 transition-colors">
<span class="material-symbols-outlined text-[20px]">chevron_right</span>
</button>
</div>
</div>
<!-- Expense Card 3 -->
<div class="group relative flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-surface-light dark:bg-surface-dark rounded-xl border border-border-light dark:border-slate-700/60 shadow-sm hover:shadow-md hover:border-primary/30 transition-all duration-300">
<div class="flex items-center gap-4 w-full sm:w-auto">
<div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400">
<span class="material-symbols-outlined">wifi</span>
</div>
<div class="flex flex-col">
<h4 class="text-base font-semibold text-slate-900 dark:text-white group-hover:text-primary transition-colors">Internet - Comcast</h4>
<div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
<span class="flex items-center gap-1">
<img alt="You" class="h-4 w-4 rounded-full" data-alt="Small avatar of You" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBmopjBjJfOsOuoDyNXvxVgIorn3-zekFAP-H4L5UG91LWPSOAaCOJCMQdsMqS_HA4Z8aaEbj2GiAdzdtW3IuVkFL0kHoQ0FtzLVKko1D9VGjxhnWl0ku6P0ly1y1RYSdlla4TSHtccP6Y4dIJ1QOHpdb2QpCRTlv2KKQIqSKzVxoaFBitrL-Qu-2Lx1J93d_oJde90h2kg5EGeL_IIGhfFHo9wyPQulU-VQCpehF2t5lmVl6XGhJ897yxVsX6GTZPKx_HZI6sc30M"/>
                                    Paid by You
                                </span>
<span>•</span>
<span>Oct 20, 2023</span>
</div>
</div>
</div>
<div class="mt-4 sm:mt-0 flex w-full sm:w-auto items-center justify-between sm:justify-end gap-6 pl-[4rem] sm:pl-0">
<div class="flex flex-col items-end">
<span class="text-lg font-bold text-slate-900 dark:text-white">$89.99</span>
<span class="text-xs font-medium text-slate-400">Waiting for 2</span>
</div>
<button class="h-8 w-8 flex items-center justify-center rounded-full bg-slate-50 dark:bg-slate-800 text-slate-400 hover:text-primary hover:bg-primary/10 transition-colors">
<span class="material-symbols-outlined text-[20px]">chevron_right</span>
</button>
</div>
</div>
<!-- Expense Card 4 -->
<div class="group relative flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-surface-light dark:bg-surface-dark rounded-xl border border-border-light dark:border-slate-700/60 shadow-sm hover:shadow-md hover:border-primary/30 transition-all duration-300">
<div class="flex items-center gap-4 w-full sm:w-auto">
<div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-pink-100 dark:bg-pink-900/30 text-pink-600 dark:text-pink-400">
<span class="material-symbols-outlined">local_pizza</span>
</div>
<div class="flex flex-col">
<h4 class="text-base font-semibold text-slate-900 dark:text-white group-hover:text-primary transition-colors">Friday Pizza Night</h4>
<div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
<span class="flex items-center gap-1">
<img alt="Mike" class="h-4 w-4 rounded-full" data-alt="Small avatar of Mike" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDeJOZzMeb7CSr5J869Ih7KKxZDn_Myc6qtLvbCXX-S3f5E_1n-aanLhjZuikrHlLMaAqTokHd5fnUWJd2se6WWnU9-P9X9OHYXg7eJIiNGDFa1R-W4_3TMPLPDzYXtMqRmxWYOJ6FEo_UDGFg4wCWpdmokYeiBH2dIRioybtAgsvqH2Xt1UQWvROaRvK_q_5dKfezIR9iKWQCK7i5m0Iftv0QAWejI2iO9EJN7pwCWjzNUrGn7Og8kOtDjFHPCkTrdj3Osusjx1Fg"/>
                                    Paid by Mike
                                </span>
<span>•</span>
<span>Oct 18, 2023</span>
</div>
</div>
</div>
<div class="mt-4 sm:mt-0 flex w-full sm:w-auto items-center justify-between sm:justify-end gap-6 pl-[4rem] sm:pl-0">
<div class="flex flex-col items-end">
<span class="text-lg font-bold text-slate-900 dark:text-white">$62.50</span>
<span class="text-xs font-medium text-slate-400">Split by 4</span>
</div>
<button class="h-8 w-8 flex items-center justify-center rounded-full bg-slate-50 dark:bg-slate-800 text-slate-400 hover:text-primary hover:bg-primary/10 transition-colors">
<span class="material-symbols-outlined text-[20px]">chevron_right</span>
</button>
</div>
</div>
<!-- Expense Card 5 -->
<div class="group relative flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 bg-surface-light dark:bg-surface-dark rounded-xl border border-border-light dark:border-slate-700/60 shadow-sm hover:shadow-md hover:border-primary/30 transition-all duration-300">
<div class="flex items-center gap-4 w-full sm:w-auto">
<div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400">
<span class="material-symbols-outlined">chair</span>
</div>
<div class="flex flex-col">
<h4 class="text-base font-semibold text-slate-900 dark:text-white group-hover:text-primary transition-colors">New Living Room Rug</h4>
<div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400">
<span class="flex items-center gap-1">
<img alt="Alex" class="h-4 w-4 rounded-full" data-alt="Small avatar of Alex" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBy_29thQlXJSKh4R7pP0BK13Zp-Harqd6IXwl2JTDX9-pCO7y6Jb4xyJ-gqUxfCSBLr9QXQZ2swxfRYb4tj-qYZq-hg8wRaj7O7jAI_p8u6ZWd_buGH3CFxa3Wvm3NZcRev6fyIXilKfwgc4tFEMUtbWBA-xm3KomAA11w_4pShiVZomLusTLSV1JN6eYTHD2Dc9uAS6-248puLGm74r1bdqo0yRD4Qf8AdGUMp_hPAXt6OEQlWrZCsgVQRu3OgOtJHoWD_OQbFHQ"/>
                                    Paid by Alex
                                </span>
<span>•</span>
<span>Oct 15, 2023</span>
</div>
</div>
</div>
<div class="mt-4 sm:mt-0 flex w-full sm:w-auto items-center justify-between sm:justify-end gap-6 pl-[4rem] sm:pl-0">
<div class="flex flex-col items-end">
<span class="text-lg font-bold text-slate-900 dark:text-white">$120.00</span>
<span class="text-xs font-medium text-emerald-500">Settled</span>
</div>
<button class="h-8 w-8 flex items-center justify-center rounded-full bg-slate-50 dark:bg-slate-800 text-slate-400 hover:text-primary hover:bg-primary/10 transition-colors">
<span class="material-symbols-outlined text-[20px]">chevron_right</span>
</button>
</div>
</div>
</div>
<div class="mt-8 flex justify-center">
<button class="px-6 py-2 text-sm font-medium text-slate-500 hover:text-slate-900 dark:hover:text-white transition-colors bg-transparent border border-transparent hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg">
                    Load More
                </button>
</div>
</main>
</div>
</body></html>