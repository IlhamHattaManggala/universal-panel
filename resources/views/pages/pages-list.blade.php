@extends('universal-panel::layout')

@section('content')
<div class="space-y-6">
    <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-200 dark:border-slate-800 pb-4">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mb-1">
                <a href="/admin" class="hover:text-sky-500">Admin</a>
                <span>/</span>
                <span class="text-sky-500 font-medium">Pages</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Pages Resource</h1>
        </div>
    </header>

    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-100 dark:bg-slate-950 text-slate-600 dark:text-slate-400 border-b border-slate-200 dark:border-slate-800 uppercase font-semibold text-[10px]">
                <tr>
                    <th class="py-3 px-4">Title</th>
                    <th class="py-3 px-4">Slug</th>
                    <th class="py-3 px-4">Template</th>
                    <th class="py-3 px-4">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 dark:divide-slate-800/60">
                <tr>
                    <td class="py-3 px-4 font-semibold text-slate-900 dark:text-slate-100">Homepage Landing</td>
                    <td class="py-3 px-4 text-slate-400">/</td>
                    <td class="py-3 px-4 text-slate-500">LandingPageTemplate</td>
                    <td class="py-3 px-4"><span class="px-2 py-0.5 rounded-full text-[10px] bg-emerald-500/10 text-emerald-500 font-semibold">Published</span></td>
                </tr>
                <tr>
                    <td class="py-3 px-4 font-semibold text-slate-900 dark:text-slate-100">Privacy Policy & Terms</td>
                    <td class="py-3 px-4 text-slate-400">/privacy</td>
                    <td class="py-3 px-4 text-slate-500">DefaultDocument</td>
                    <td class="py-3 px-4"><span class="px-2 py-0.5 rounded-full text-[10px] bg-emerald-500/10 text-emerald-500 font-semibold">Published</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
