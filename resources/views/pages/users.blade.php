@extends('universal-panel::layout')

@section('content')
<div class="space-y-6">
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-200 dark:border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
                <a href="/admin" class="hover:text-sky-500">Admin</a>
                <span>/</span>
                <span>User Management</span>
                <span>/</span>
                <span class="text-sky-500 font-medium">Users</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Users Resource</h1>
        </div>

        <div class="flex items-center gap-2">
            <button class="px-3.5 py-1.5 rounded-md bg-[#2271b1] hover:bg-sky-600 text-white text-xs font-semibold flex items-center gap-1.5 transition-colors shadow-sm">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add New User
            </button>
        </div>
    </header>

    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
        <div class="p-4 border-b border-slate-200 dark:border-slate-800 flex justify-between items-center">
            <h2 class="text-base font-bold text-slate-900 dark:text-slate-100">User Accounts</h2>
            <button class="px-3 py-1.5 rounded-md border border-slate-300 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 text-slate-700 dark:text-slate-300 text-xs font-medium">Filter Users</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-100 dark:bg-slate-950 text-slate-600 dark:text-slate-400 border-b border-slate-200 dark:border-slate-800 uppercase font-semibold text-[10px]">
                    <tr>
                        <th class="py-3 px-4">User</th>
                        <th class="py-3 px-4">Role</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Registered</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800/60">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/40">
                        <td class="py-3 px-4 font-medium flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full bg-sky-600/20 text-sky-500 font-bold flex items-center justify-center text-xs">I</div>
                            <div>
                                <div class="font-semibold text-slate-900 dark:text-slate-100">Ilham Hatta</div>
                                <div class="text-[11px] text-slate-400">ilham@example.com</div>
                            </div>
                        </td>
                        <td class="py-3 px-4 font-semibold text-sky-500">Super Admin</td>
                        <td class="py-3 px-4"><span class="px-2 py-0.5 rounded-full text-[10px] bg-emerald-500/10 text-emerald-500 font-semibold">Active</span></td>
                        <td class="py-3 px-4 text-slate-400">2026-08-01</td>
                        <td class="py-3 px-4 text-right">
                            <button class="text-slate-400 hover:text-amber-500"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
