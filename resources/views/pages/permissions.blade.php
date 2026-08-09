@extends('universal-panel::layout')

@section('title', 'Permissions Matrix')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-xl font-bold tracking-tight text-slate-800 dark:text-slate-100">
                Permission Management Panel
            </h1>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                Configure visual permission checkboxes and access control matrix for Superadmin & Admin roles.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <a href="/admin/roles" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded text-xs font-medium border border-slate-300 dark:border-[#2c3338] bg-white dark:bg-[#1d2327] text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-[#2c3338] transition-colors">
                Manage Roles
            </a>
            <button form="permissions-form" type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded text-xs font-semibold bg-[#2271b1] hover:bg-sky-600 text-white transition-colors shadow-sm">
                Save Permissions Matrix
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="p-3 bg-emerald-500/10 border border-emerald-500/20 rounded-md text-emerald-600 dark:text-emerald-400 text-xs flex items-center justify-between">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <form id="permissions-form" action="/admin/permissions" method="POST" class="space-y-6">
        @csrf
        
        <div class="bg-white dark:bg-[#1d2327] border border-slate-200 dark:border-[#2c3338] rounded-lg shadow-sm overflow-hidden">
            <div class="px-4 py-3 border-b border-slate-200 dark:border-[#2c3338] bg-slate-50/50 dark:bg-[#252b30] flex items-center justify-between">
                <span class="text-xs font-bold text-slate-800 dark:text-slate-100">Module Access Control Matrix</span>
                <span class="text-[11px] text-slate-500 dark:text-slate-400">Superadmin has implicit full access</span>
            </div>

            <div class="overflow-x-auto no-scrollbar">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="border-b border-slate-200 dark:border-[#2c3338] bg-slate-100/50 dark:bg-[#1a1f23]">
                            <th class="py-3 px-4 font-semibold text-slate-700 dark:text-slate-300 w-64">Module & Permission</th>
                            @foreach(array_keys($roles) as $roleName)
                                <th class="py-3 px-4 font-semibold text-center text-slate-700 dark:text-slate-300">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold {{ $roleName === 'Superadmin' ? 'bg-sky-500/20 text-sky-600 dark:text-sky-400' : 'bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300' }}">
                                        {{ $roleName }}
                                    </span>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-[#2c3338]">
                        @foreach($modules as $moduleName => $permissionList)
                            <tr class="bg-slate-50/80 dark:bg-[#21262a]">
                                <td colspan="{{ count($roles) + 1 }}" class="py-2 px-4 font-bold text-slate-800 dark:text-slate-200 uppercase tracking-wider text-[10px]">
                                    📦 {{ $moduleName }} Module
                                </td>
                            </tr>
                            @foreach($permissionList as $permKey => $permLabel)
                                <tr class="hover:bg-slate-50 dark:hover:bg-[#252c31] transition-colors">
                                    <td class="py-2.5 px-4 font-medium text-slate-700 dark:text-slate-300 pl-8">
                                        {{ $permLabel }}
                                    </td>
                                    @foreach($roles as $roleName => $assignedModules)
                                        <td class="py-2.5 px-4 text-center">
                                            @php
                                                $isChecked = in_array($permKey, $assignedModules[$moduleName] ?? []);
                                                $isSuper = $roleName === 'Superadmin';
                                            @endphp
                                            <input 
                                                type="checkbox" 
                                                name="permissions[{{ $roleName }}][{{ $moduleName }}][]" 
                                                value="{{ $permKey }}"
                                                {{ $isChecked || $isSuper ? 'checked' : '' }}
                                                {{ $isSuper ? 'disabled' : '' }}
                                                class="rounded border-slate-300 dark:border-slate-700 text-[#2271b1] focus:ring-sky-500 w-4 h-4 cursor-pointer"
                                            />
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
@endsection
