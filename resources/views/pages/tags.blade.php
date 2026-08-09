@extends('universal-panel::layout')

@section('content')
<div class="space-y-6">
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-200 dark:border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
                <a href="/admin/posts" class="hover:text-sky-500">Posts</a>
                <span>/</span>
                <span class="text-sky-500 font-medium">Tags</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Post Tags</h1>
        </div>
    </header>

    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm">
        <div class="flex flex-wrap gap-2">
            <span class="px-3 py-1 bg-slate-100 dark:bg-slate-800 rounded-full text-xs text-slate-700 dark:text-slate-300 font-medium">#laravel</span>
            <span class="px-3 py-1 bg-slate-100 dark:bg-slate-800 rounded-full text-xs text-slate-700 dark:text-slate-300 font-medium">#react</span>
            <span class="px-3 py-1 bg-slate-100 dark:bg-slate-800 rounded-full text-xs text-slate-700 dark:text-slate-300 font-medium">#tailwindcss</span>
            <span class="px-3 py-1 bg-slate-100 dark:bg-slate-800 rounded-full text-xs text-slate-700 dark:text-slate-300 font-medium">#typescript</span>
        </div>
    </div>
</div>
@endsection
