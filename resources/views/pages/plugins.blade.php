@extends('universal-panel::layout')

@section('content')
<div class="space-y-6">
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-200 dark:border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
                <a href="/admin" class="hover:text-sky-500">Admin</a>
                <span>/</span>
                <span class="text-sky-500 font-medium">Plugins</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Installed Panel Plugins</h1>
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm space-y-2">
            <div class="flex justify-between items-center">
                <h2 class="text-base font-bold text-slate-900 dark:text-slate-100">Sentinel WAF Security</h2>
                <span class="px-2 py-0.5 rounded text-[10px] bg-emerald-500/10 text-emerald-500 font-bold">Active</span>
            </div>
            <p class="text-xs text-slate-500">Provides real-time SQL injection protection & threat logging.</p>
        </div>
    </div>
</div>
@endsection
