@extends('universal-panel::layout')

@section('content')
<div class="space-y-6">
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-200 dark:border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
                <a href="/admin" class="hover:text-sky-500">Admin</a>
                <span>/</span>
                <span class="text-sky-500 font-medium">Roles & Permissions</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Roles & Permissions Matrix</h1>
        </div>
        <button class="px-3.5 py-1.5 rounded-md bg-[#2271b1] text-white text-xs font-semibold">Create New Role</button>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm space-y-2">
            <span class="px-2 py-0.5 rounded text-[10px] bg-sky-500/10 text-sky-500 font-bold">Role #1</span>
            <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100">Super Administrator</h2>
            <p class="text-xs text-slate-500">Full unlimited access to all system resources and security controls.</p>
        </div>
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm space-y-2">
            <span class="px-2 py-0.5 rounded text-[10px] bg-indigo-500/10 text-indigo-500 font-bold">Role #2</span>
            <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100">Content Editor</h2>
            <p class="text-xs text-slate-500">Can create, publish, and delete posts, pages, and media files.</p>
        </div>
    </div>
</div>
@endsection
