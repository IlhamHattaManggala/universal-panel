@extends('universal-panel::layout')

@section('content')
<div class="space-y-6">
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-200 dark:border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
                <a href="/admin/posts" class="hover:text-sky-500">Posts</a>
                <span>/</span>
                <span class="text-sky-500 font-medium">Categories</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Post Categories</h1>
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-5 shadow-sm space-y-3">
            <h2 class="text-sm font-bold text-slate-900 dark:text-slate-100">Add New Category</h2>
            <div>
                <label class="block text-xs text-slate-600 dark:text-slate-400 mb-1">Category Name</label>
                <input type="text" placeholder="e.g. Tutorials" class="w-full bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-800 rounded px-3 py-1.5 text-xs text-slate-800 dark:text-slate-200 focus:outline-none focus:border-sky-500" />
            </div>
            <button class="px-3.5 py-1.5 rounded bg-[#2271b1] text-white text-xs font-semibold">Save Category</button>
        </div>

        <div class="md:col-span-2 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-100 dark:bg-slate-950 text-slate-600 dark:text-slate-400 border-b border-slate-200 dark:border-slate-800 uppercase font-semibold text-[10px]">
                    <tr>
                        <th class="py-3 px-4">Name</th>
                        <th class="py-3 px-4">Slug</th>
                        <th class="py-3 px-4">Count</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800/60">
                    <tr>
                        <td class="py-3 px-4 font-semibold text-slate-900 dark:text-slate-100">Tutorials</td>
                        <td class="py-3 px-4 text-slate-400">tutorials</td>
                        <td class="py-3 px-4 font-bold text-sky-500">12</td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4 font-semibold text-slate-900 dark:text-slate-100">Development</td>
                        <td class="py-3 px-4 text-slate-400">development</td>
                        <td class="py-3 px-4 font-bold text-sky-500">8</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
