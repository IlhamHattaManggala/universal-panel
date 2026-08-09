@extends('universal-panel::layout')

@section('content')
<div class="space-y-6">
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-200 dark:border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
                <a href="/admin" class="hover:text-sky-500">Admin</a>
                <span>/</span>
                <span>System</span>
                <span>/</span>
                <span class="text-sky-500 font-medium">Sentinel WAF</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Sentinel Security WAF</h1>
        </div>

        <div class="flex items-center gap-2">
            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-500 border border-emerald-500/20">
                Firewall Active
            </span>
        </div>
    </header>

    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm">
        <h2 class="text-base font-bold text-slate-900 dark:text-slate-100 mb-3">Threat Detection Log</h2>
        <div class="space-y-2">
            <div class="p-3 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-lg flex items-center justify-between text-xs">
                <div class="flex items-center gap-3">
                    <span class="px-2 py-0.5 rounded bg-rose-500/10 text-rose-500 font-semibold text-[10px]">SQLi Blocked</span>
                    <span class="font-mono text-slate-700 dark:text-slate-300">192.168.1.5</span>
                    <span class="text-slate-400">SELECT * FROM users WHERE 1=1--</span>
                </div>
                <span class="text-[10px] text-slate-400">5 minutes ago</span>
            </div>
        </div>
    </div>
</div>
@endsection
