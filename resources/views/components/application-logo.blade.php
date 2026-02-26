<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700&display=swap" rel="stylesheet">
<style>
    .bg-primary { background-color: #4f46e5; }
    .shadow-primary\/20 { box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.2), 0 4px 6px -4px rgba(79, 70, 229, 0.2); }
</style>
<div {{ $attributes->merge(['class' => 'flex items-center gap-2']) }}>
    <div class="bg-primary p-2 rounded-lg text-white shadow-lg shadow-primary/20">
        <span class="material-symbols-outlined block text-2xl">home_work</span>
    </div>
    <span class="text-2xl font-black tracking-tight" style="font-family: 'Public Sans', sans-serif;">EasyColoc</span>
</div>
