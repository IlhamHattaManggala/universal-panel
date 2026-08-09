@extends('universal-panel::layout')

@section('content')
<div class="space-y-6">
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-200 dark:border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
                <a href="/admin" class="hover:text-sky-500">Admin</a>
                <span>/</span>
                <span class="text-sky-500 font-medium">Analytics & Reports</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Analytics Dashboard</h1>
        </div>
        <div class="flex items-center gap-2">
            <button class="px-3.5 py-1.5 rounded-md bg-[#2271b1] hover:bg-sky-600 text-white text-xs font-semibold flex items-center gap-1.5 transition-colors shadow-sm">
                Download PDF Report
            </button>
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm">
            <span class="text-xs text-slate-500">Total Page Views</span>
            <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">458,920</div>
            <span class="text-xs text-emerald-500 font-medium">+18.4% vs last week</span>
        </div>
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm">
            <span class="text-xs text-slate-500">Avg. Session Duration</span>
            <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">4m 32s</div>
            <span class="text-xs text-sky-500 font-medium">+5.2% vs last week</span>
        </div>
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm">
            <span class="text-xs text-slate-500">Bounce Rate</span>
            <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">28.4%</div>
            <span class="text-xs text-emerald-500 font-medium">-3.1% improved</span>
        </div>
    </div>
</div>
@endsection
