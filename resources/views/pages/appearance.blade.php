@extends('universal-panel::layout')

@section('content')
<div class="space-y-6">
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-200 dark:border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
                <a href="/admin" class="hover:text-sky-500">Admin</a>
                <span>/</span>
                <span class="text-sky-500 font-medium">Appearance</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Theme & Appearance Customizer</h1>
        </div>
    </header>

    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm">
        <h2 class="text-base font-bold text-slate-900 dark:text-slate-100 mb-2">Active Admin Theme</h2>
        <p class="text-xs text-slate-500">Universal Panel Dark/Light Slate Theme v1.0 (WordPress & Filament Hybrid)</p>
    </div>
</div>
@endsection
