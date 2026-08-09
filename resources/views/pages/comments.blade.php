@extends('universal-panel::layout')

@section('content')
<div class="space-y-6">
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-200 dark:border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
                <a href="/admin" class="hover:text-sky-500">Admin</a>
                <span>/</span>
                <span class="text-sky-500 font-medium">Comments</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">User Comments</h1>
        </div>
    </header>

    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm space-y-3">
        <div class="p-3 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-lg text-xs space-y-1">
            <div class="flex justify-between items-center">
                <span class="font-bold text-slate-800 dark:text-slate-200">Sarah Connor on "Getting Started with Universal Panel"</span>
                <span class="text-[10px] text-slate-400">1 hour ago</span>
            </div>
            <p class="text-slate-600 dark:text-slate-400">Awesome package! The UI layout is super clean and fast.</p>
        </div>
    </div>
</div>
@endsection
