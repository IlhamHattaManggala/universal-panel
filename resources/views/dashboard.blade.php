@extends('universal-panel::layout')

@section('content')
<!-- Header & Actions -->
<header class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-200 dark:border-slate-800 pb-4">
    <div>
        <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
            <span>Admin</span>
            <span>/</span>
            <span class="text-sky-500 font-medium">Dashboard Overview</span>
        </div>
        <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Dashboard Overview</h1>
    </div>

    <div class="flex items-center gap-2">
        <button class="px-3 py-1.5 rounded-md border border-slate-300 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-700 dark:text-slate-300 text-xs font-medium flex items-center gap-1.5 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            Refresh Data
        </button>
        <button class="px-3.5 py-1.5 rounded-md bg-[#2271b1] hover:bg-sky-600 text-white text-xs font-semibold flex items-center gap-1.5 transition-colors shadow-sm">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Resource
        </button>
    </div>
</header>

<!-- 4 Stat Cards Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <!-- Card 1 -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm">
        <div class="flex items-center justify-between">
            <span class="text-xs font-medium text-slate-500 dark:text-slate-400">Total Revenue</span>
            <div class="w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-500 flex items-center justify-center font-bold">
                $
            </div>
        </div>
        <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-2">$128,450.00</div>
        <div class="flex items-center gap-1.5 mt-2 text-xs font-medium text-emerald-500 dark:text-emerald-400">
            <span>+14.2%</span>
            <span class="text-[11px] text-slate-400 font-normal ml-1">vs last month</span>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm">
        <div class="flex items-center justify-between">
            <span class="text-xs font-medium text-slate-500 dark:text-slate-400">Active Users</span>
            <div class="w-8 h-8 rounded-lg bg-sky-500/10 text-sky-500 flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
        </div>
        <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-2">2,845</div>
        <div class="flex items-center gap-1.5 mt-2 text-xs font-medium text-sky-500 dark:text-sky-400">
            <span>+8.1%</span>
            <span class="text-[11px] text-slate-400 font-normal ml-1">vs last week</span>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm">
        <div class="flex items-center justify-between">
            <span class="text-xs font-medium text-slate-500 dark:text-slate-400">Sentinel Threats Blocked</span>
            <div class="w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-500 flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
        </div>
        <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-2">142 Attacks</div>
        <div class="flex items-center gap-1.5 mt-2 text-xs font-medium text-emerald-500 dark:text-emerald-400">
            <span>-24.5%</span>
            <span class="text-[11px] text-slate-400 font-normal ml-1">threat reduction</span>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm">
        <div class="flex items-center justify-between">
            <span class="text-xs font-medium text-slate-500 dark:text-slate-400">Pending Requests</span>
            <div class="w-8 h-8 rounded-lg bg-amber-500/10 text-amber-500 flex items-center justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            </div>
        </div>
        <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-2">18 Orders</div>
        <div class="flex items-center gap-1.5 mt-2 text-xs font-medium text-amber-500 dark:text-amber-400">
            <span>Action Required</span>
        </div>
    </div>
</div>

<!-- Filament-Style Data Table Component -->
<div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
    <!-- Table Header Controls -->
    <div class="p-4 border-b border-slate-200 dark:border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div>
            <h2 class="text-base font-bold text-slate-900 dark:text-slate-100">User Management Resource</h2>
            <p class="text-xs text-slate-500 dark:text-slate-400">Registered accounts and access permission levels</p>
        </div>

        <div class="flex items-center gap-2">
            <button class="px-3 py-1.5 rounded-md border border-slate-300 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 text-slate-700 dark:text-slate-300 text-xs font-medium flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg> Filter
            </button>
            <button class="px-3.5 py-1.5 rounded-md border border-slate-300 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 text-slate-700 dark:text-slate-300 text-xs font-medium flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg> Export
            </button>
        </div>
    </div>

    <!-- Table Element -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-100 dark:bg-slate-950 text-slate-600 dark:text-slate-400 border-b border-slate-200 dark:border-slate-800 uppercase font-semibold text-[10px] tracking-wider">
                <tr>
                    <th class="py-3 px-4">User</th>
                    <th class="py-3 px-4">Role</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4">Registered Date</th>
                    <th class="py-3 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 dark:divide-slate-800/60 text-slate-700 dark:text-slate-200">
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/40 transition-colors">
                    <td class="py-3 px-4 font-medium">
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full bg-sky-600/20 text-sky-500 font-bold flex items-center justify-center text-xs shrink-0">A</div>
                            <div>
                                <div class="font-semibold text-slate-900 dark:text-slate-100">Alex Morgan</div>
                                <div class="text-[11px] text-slate-400 font-normal">alex.m@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-3 px-4 font-medium text-slate-600 dark:text-slate-300">Super Admin</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-500/10 text-emerald-500 border border-emerald-500/20">Active</span>
                    </td>
                    <td class="py-3 px-4 text-slate-400">2026-08-01</td>
                    <td class="py-3 px-4 text-right">
                        <div class="flex items-center justify-end gap-2 text-slate-400">
                            <button class="hover:text-sky-500" title="View"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
                            <button class="hover:text-amber-500" title="Edit"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/40 transition-colors">
                    <td class="py-3 px-4 font-medium">
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full bg-sky-600/20 text-sky-500 font-bold flex items-center justify-center text-xs shrink-0">S</div>
                            <div>
                                <div class="font-semibold text-slate-900 dark:text-slate-100">Sarah Connor</div>
                                <div class="text-[11px] text-slate-400 font-normal">sarah.c@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-3 px-4 font-medium text-slate-600 dark:text-slate-300">Editor</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-500/10 text-emerald-500 border border-emerald-500/20">Active</span>
                    </td>
                    <td class="py-3 px-4 text-slate-400">2026-08-03</td>
                    <td class="py-3 px-4 text-right">
                        <div class="flex items-center justify-end gap-2 text-slate-400">
                            <button class="hover:text-sky-500" title="View"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
                            <button class="hover:text-amber-500" title="Edit"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Table Footer Pagination -->
    <div class="p-4 border-t border-slate-200 dark:border-slate-800 text-slate-500 dark:text-slate-400 flex items-center justify-between text-xs">
        <span>Showing <strong class="font-semibold text-slate-800 dark:text-slate-200">1</strong> to <strong class="font-semibold text-slate-800 dark:text-slate-200">2</strong> of <strong class="font-semibold text-slate-800 dark:text-slate-200">128</strong> results</span>
        <div class="flex items-center gap-1">
            <button class="p-1.5 rounded border border-slate-300 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-800 disabled:opacity-50">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button class="p-1.5 rounded border border-slate-300 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-800">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>
    </div>
</div>
@endsection
