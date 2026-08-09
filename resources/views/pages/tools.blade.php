@extends('universal-panel::layout')

@section('content')
<div class="space-y-6">
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-200 dark:border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
                <a href="/admin" class="hover:text-sky-500">Admin</a>
                <span>/</span>
                <span class="text-sky-500 font-medium">Tools</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">System Maintenance Tools</h1>
        </div>
    </header>

    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm space-y-3">
        <h2 class="text-base font-bold text-slate-900 dark:text-slate-100">Cache & Maintenance Utilities</h2>
        <div class="flex gap-2">
            <button class="px-3.5 py-1.5 rounded bg-slate-100 dark:bg-slate-800 text-xs font-semibold text-slate-700 dark:text-slate-300">Clear Application Cache</button>
            <button class="px-3.5 py-1.5 rounded bg-slate-100 dark:bg-slate-800 text-xs font-semibold text-slate-700 dark:text-slate-300">Optimize Route Caching</button>
        </div>
    </div>
</div>
@endsection
