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
                <span class="text-sky-500 font-medium">Settings</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Global System Settings</h1>
        </div>

        <div class="flex items-center gap-2">
            <button class="px-3.5 py-1.5 rounded-md bg-[#2271b1] hover:bg-sky-600 text-white text-xs font-semibold flex items-center gap-1.5 transition-colors shadow-sm">
                Save Settings
            </button>
        </div>
    </header>

    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-6 shadow-sm max-w-3xl space-y-4">
        <div>
            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Application / Site Title</label>
            <input type="text" value="Universal Panel" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded px-3 py-2 text-xs text-slate-800 dark:text-slate-200 focus:outline-none focus:border-sky-500" />
        </div>

        <div>
            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Admin Email Notification</label>
            <input type="email" value="admin@example.com" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded px-3 py-2 text-xs text-slate-800 dark:text-slate-200 focus:outline-none focus:border-sky-500" />
        </div>

        <div>
            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Default User Role on Registration</label>
            <select class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded px-3 py-2 text-xs text-slate-800 dark:text-slate-200 focus:outline-none focus:border-sky-500">
                <option value="subscriber">Subscriber</option>
                <option value="editor">Editor</option>
                <option value="admin">Administrator</option>
            </select>
        </div>
    </div>
</div>
@endsection
