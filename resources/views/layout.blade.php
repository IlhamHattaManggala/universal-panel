<!DOCTYPE html>
<html lang="en" class="h-full dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universal Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <script>
        // Init theme from localStorage
        (function() {
            const theme = localStorage.getItem('universal_panel_theme');
            if (theme === 'light') {
                document.documentElement.classList.remove('dark');
            } else {
                document.documentElement.classList.add('dark');
            }
        })();

        function toggleTheme() {
            const html = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('universal_panel_theme', 'light');
                if (themeIcon) {
                    themeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>';
                    themeIcon.setAttribute('class', 'w-4 h-4 text-indigo-400');
                }
            } else {
                html.classList.add('dark');
                localStorage.setItem('universal_panel_theme', 'dark');
                if (themeIcon) {
                    themeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>';
                    themeIcon.setAttribute('class', 'w-4 h-4 text-amber-400');
                }
            }
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('panel-sidebar');
            const collapseText = document.getElementById('collapse-text');
            const sectionLabels = document.querySelectorAll('.sidebar-section-label');
            const chevrons = document.querySelectorAll('.sidebar-chevron');
            const submenus = document.querySelectorAll('.sidebar-submenu');
            const itemTexts = document.querySelectorAll('.sidebar-item-text');
            
            if (sidebar.classList.contains('w-[160px]')) {
                sidebar.classList.remove('w-[160px]');
                sidebar.classList.add('w-[52px]');
                if (collapseText) collapseText.classList.add('hidden');
                sectionLabels.forEach(el => el.classList.add('hidden'));
                chevrons.forEach(el => el.classList.add('hidden'));
                submenus.forEach(el => el.classList.add('hidden'));
                itemTexts.forEach(el => el.classList.add('hidden'));
            } else {
                sidebar.classList.remove('w-[52px]');
                sidebar.classList.add('w-[160px]');
                if (collapseText) collapseText.classList.remove('hidden');
                sectionLabels.forEach(el => el.classList.remove('hidden'));
                chevrons.forEach(el => el.classList.remove('hidden'));
                itemTexts.forEach(el => el.classList.remove('hidden'));
            }
        }

        function toggleSubmenu(id) {
            const sidebar = document.getElementById('panel-sidebar');
            if (sidebar && sidebar.classList.contains('w-[52px]')) {
                return; // Do not open submenus in 52px collapsed mode
            }
            const submenu = document.getElementById('submenu-' + id);
            const chevron = document.getElementById('chevron-' + id);
            if (submenu) {
                submenu.classList.toggle('hidden');
                if (chevron) {
                    chevron.classList.toggle('rotate-180');
                }
            }
        }

        function toggleProfileDropdown() {
            const profileDropdown = document.getElementById('profile-dropdown');
            const notifDropdown = document.getElementById('notif-dropdown');
            if (notifDropdown) notifDropdown.classList.add('hidden');
            if (profileDropdown) profileDropdown.classList.toggle('hidden');
        }

        function toggleNotifDropdown() {
            const notifDropdown = document.getElementById('notif-dropdown');
            const profileDropdown = document.getElementById('profile-dropdown');
            if (profileDropdown) profileDropdown.classList.add('hidden');
            if (notifDropdown) notifDropdown.classList.toggle('hidden');
        }

        document.addEventListener('keydown', function(e) {
            if ((e.metaKey || e.ctrlKey) && (e.key === 'k' || e.key === 'K')) {
                e.preventDefault();
                const searchInput = document.getElementById('panel-search-input');
                if (searchInput) searchInput.focus();
            }
        });
    </script>
    <style>
        /* Hide scrollbar visually while retaining full scroll functionality */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
            width: 0;
            height: 0;
        }
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</head>
@php 
    $panelPrefix = request()->is('superadmin*') ? 'superadmin' : 'admin'; 
    $panelTitle = $panelPrefix === 'superadmin' ? 'Superadmin Panel' : 'Universal Panel';
@endphp
<body class="h-full bg-slate-100 dark:bg-slate-950 text-slate-900 dark:text-slate-100 font-sans antialiased flex flex-col transition-colors duration-200 overflow-hidden">
    <header class="h-11 bg-white dark:bg-[#1d2327] border-b border-slate-200 dark:border-[#2c3338] text-slate-800 dark:text-slate-200 px-4 flex items-center justify-between text-xs select-none relative z-30 transition-colors shrink-0">
        <!-- Left side: Panel Name & Hamburger Menu -->
        <div class="flex items-center gap-4 shrink-0 min-w-max">
            <a href="/{{ $panelPrefix }}" class="font-bold text-slate-800 dark:text-slate-100 text-sm tracking-tight hover:text-sky-500 whitespace-nowrap flex items-center gap-2">
                @if($panelPrefix === 'superadmin')
                    <span class="px-1.5 py-0.5 rounded text-[10px] bg-sky-500 text-white font-extrabold tracking-wider uppercase">Super</span>
                @endif
                {{ $panelTitle }}
            </a>
            <button onclick="toggleSidebar()" class="p-1 rounded text-slate-400 hover:text-slate-700 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-[#2c3338] transition-colors focus:outline-none" title="Toggle Sidebar">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <!-- Center: Search Input centered -->
        <div class="flex-1 flex justify-center max-w-md mx-4">
            <div class="relative flex items-center w-full max-w-sm">
                <svg class="w-3.5 h-3.5 text-slate-400 absolute left-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input id="panel-search-input" type="text" placeholder="Search resources (Cmd+K)..." class="bg-slate-100 dark:bg-[#101517] text-slate-800 dark:text-slate-200 text-xs pl-8 pr-3 py-1 rounded border border-slate-300 dark:border-[#2c3338] focus:outline-none focus:border-sky-500 w-full transition-all" />
            </div>
        </div>

        <!-- Right side: Notification -> Light/Dark -> Profile -->
        <div class="flex items-center gap-3 shrink-0">
            <!-- 1. Notification Dropdown Toggle -->
            <div class="relative">
                <button onclick="toggleNotifDropdown()" class="p-1.5 rounded text-slate-400 hover:text-slate-700 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-[#2c3338] transition-colors relative focus:outline-none" title="Notifications">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-sky-500 rounded-full ring-2 ring-white dark:ring-[#1d2327]"></span>
                </button>

                <!-- Notification Dropdown Menu -->
                <div id="notif-dropdown" class="hidden absolute right-0 mt-2 w-72 bg-white dark:bg-[#1d2327] border border-slate-200 dark:border-[#2c3338] rounded-md shadow-xl py-1 z-50 text-xs text-slate-800 dark:text-slate-200 divide-y divide-slate-100 dark:divide-[#2c3338]">
                    <div class="px-3 py-2 flex items-center justify-between">
                        <span class="font-semibold text-slate-800 dark:text-slate-100">Notifications</span>
                        <span class="text-[10px] text-sky-500 hover:underline cursor-pointer">Mark all read</span>
                    </div>
                    <div class="max-h-64 overflow-y-auto divide-y divide-slate-100 dark:divide-[#2c3338]">
                        <div class="p-2.5 hover:bg-slate-50 dark:hover:bg-[#2c3338] transition-colors flex gap-2.5">
                            <svg class="w-4 h-4 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            <div>
                                <p class="font-semibold text-slate-800 dark:text-slate-100">Sentinel WAF Threat Blocked</p>
                                <p class="text-[11px] text-slate-500 dark:text-slate-400">SQL injection attempt blocked from IP 192.168.1.5</p>
                                <span class="text-[9px] text-slate-400 mt-1 block">5 mins ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Light / Dark Mode Toggle Button -->
            <button onclick="toggleTheme()" class="p-1.5 rounded text-slate-400 hover:text-slate-700 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-[#2c3338] transition-colors focus:outline-none" title="Toggle Theme (Light / Dark)">
                <svg id="theme-icon" class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </button>

            <!-- 3. Profile User Dropdown -->
            <div class="relative">
                <button onclick="toggleProfileDropdown()" class="flex items-center gap-2 focus:outline-none group">
                    <div class="w-7 h-7 rounded-full bg-[#2271b1] text-white flex items-center justify-center font-bold text-xs shadow-sm">
                        IH
                    </div>
                    <div class="hidden sm:block text-left">
                        <div class="font-semibold text-slate-800 dark:text-slate-100 text-xs leading-none">Ilham Hatta</div>
                        <div class="text-[10px] text-slate-500 dark:text-slate-400 leading-tight">Super Admin</div>
                    </div>
                    <svg class="w-3.5 h-3.5 text-slate-400 ml-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <!-- Profile Dropdown Menu -->
                <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-[#1d2327] border border-slate-200 dark:border-[#2c3338] rounded-md shadow-xl py-1 z-50 text-xs text-slate-800 dark:text-slate-200 divide-y divide-slate-100 dark:divide-[#2c3338]">
                    <div class="px-3 py-2">
                        <p class="font-semibold text-slate-800 dark:text-slate-100">Ilham Hatta</p>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400">Super Admin</p>
                    </div>
                    <div class="py-1">
                        <a href="/admin/profile" class="flex items-center gap-2 px-3 py-1.5 hover:bg-slate-50 dark:hover:bg-[#2c3338] hover:text-sky-500">
                            My Profile
                        </a>
                        <a href="/admin/settings" class="flex items-center gap-2 px-3 py-1.5 hover:bg-slate-50 dark:hover:bg-[#2c3338] hover:text-sky-500">
                            Settings
                        </a>
                    </div>
                    <div class="py-1">
                        <button class="w-full text-left flex items-center gap-2 px-3 py-1.5 text-rose-500 hover:bg-slate-50 dark:hover:bg-[#2c3338]">
                            Sign Out
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="flex flex-1 h-[calc(100vh-2.75rem)] overflow-hidden">
        <aside id="panel-sidebar" class="w-[160px] bg-white dark:bg-[#1d2327] border-r border-slate-200 dark:border-[#2c3338] text-slate-700 dark:text-slate-300 text-xs flex flex-col select-none transition-all duration-200 shrink-0 h-full">
            <nav class="flex-1 py-1 space-y-2 overflow-y-auto no-scrollbar">
                <!-- Group 1: MAIN -->
                <div class="space-y-0.5">
                    <div class="px-3 pt-2 pb-1 sidebar-section-label">
                        <span class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400 dark:text-slate-500 block truncate">MAIN</span>
                    </div>
                    <a href="/{{ $panelPrefix }}" title="Dashboard" class="flex items-center gap-2 px-3 py-1.5 {{ request()->is($panelPrefix) ? 'bg-[#2271b1] text-white font-semibold relative after:absolute after:right-0 after:top-1/2 after:-translate-y-1/2 after:border-y-8 after:border-y-transparent after:border-r-8 after:border-r-slate-50 dark:after:border-r-slate-950' : 'hover:bg-slate-100 dark:hover:bg-[#2c3338] text-slate-700 dark:text-slate-300' }}">
                        <svg class="w-4 h-4 {{ request()->is($panelPrefix) ? 'text-white' : 'text-slate-400 group-hover:text-sky-500' }} shrink-0 mx-auto sm:mx-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                        <span class="sidebar-item-text truncate">Dashboard</span>
                    </a>
                    <a href="/{{ $panelPrefix }}/analytics" title="Analytics" class="flex items-center gap-2 px-3 py-1.5 {{ request()->is($panelPrefix . '/analytics') ? 'bg-[#2271b1] text-white font-semibold relative after:absolute after:right-0 after:top-1/2 after:-translate-y-1/2 after:border-y-8 after:border-y-transparent after:border-r-8 after:border-r-slate-50 dark:after:border-r-slate-950' : 'hover:bg-slate-100 dark:hover:bg-[#2c3338] text-slate-700 dark:text-slate-300' }}">
                        <svg class="w-4 h-4 {{ request()->is($panelPrefix . '/analytics') ? 'text-white' : 'text-slate-400 group-hover:text-sky-500' }} shrink-0 mx-auto sm:mx-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        <span class="sidebar-item-text truncate">Analytics</span>
                    </a>
                </div>

                <!-- Group 2: CONTENT -->
                <div class="space-y-0.5">
                    <div class="px-3 pt-2 pb-1 sidebar-section-label">
                        <span class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400 dark:text-slate-500 block truncate">CONTENT</span>
                    </div>
                    
                    <!-- Accordion Posts -->
                    <div>
                        <div onclick="toggleSubmenu('posts')" title="Posts" class="flex items-center justify-between px-3 py-1.5 cursor-pointer hover:bg-slate-100 dark:hover:bg-[#2c3338] text-slate-700 dark:text-slate-300">
                            <div class="flex items-center gap-2 truncate">
                                <svg class="w-4 h-4 text-slate-400 shrink-0 mx-auto sm:mx-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <span class="sidebar-item-text truncate">Posts</span>
                            </div>
                            <svg id="chevron-posts" class="sidebar-chevron w-3 h-3 text-slate-400 shrink-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                        <div id="submenu-posts" class="sidebar-submenu bg-slate-50 dark:bg-[#101517] py-1">
                            <a href="/{{ $panelPrefix }}/posts" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">All Posts</a>
                            <a href="/{{ $panelPrefix }}/posts/create" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">Add New</a>
                            <a href="/{{ $panelPrefix }}/posts/categories" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">Categories</a>
                            <a href="/{{ $panelPrefix }}/posts/tags" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">Tags</a>
                        </div>
                    </div>

                    <!-- Accordion Pages -->
                    <div>
                        <div onclick="toggleSubmenu('pages')" title="Pages" class="flex items-center justify-between px-3 py-1.5 cursor-pointer hover:bg-slate-100 dark:hover:bg-[#2c3338] text-slate-700 dark:text-slate-300">
                            <div class="flex items-center gap-2 truncate">
                                <svg class="w-4 h-4 text-slate-400 shrink-0 mx-auto sm:mx-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                <span class="sidebar-item-text truncate">Pages</span>
                            </div>
                            <svg id="chevron-pages" class="sidebar-chevron w-3 h-3 text-slate-400 shrink-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                        <div id="submenu-pages" class="sidebar-submenu hidden bg-slate-50 dark:bg-[#101517] py-1">
                            <a href="/{{ $panelPrefix }}/pages" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">All Pages</a>
                            <a href="/{{ $panelPrefix }}/pages/create" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">Add New Page</a>
                        </div>
                    </div>

                    <a href="/{{ $panelPrefix }}/media" title="Media" class="flex items-center gap-2 px-3 py-1.5 hover:bg-slate-100 dark:hover:bg-[#2c3338] text-slate-700 dark:text-slate-300">
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-sky-500 shrink-0 mx-auto sm:mx-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="sidebar-item-text truncate">Media</span>
                    </a>
                </div>

                <!-- Group 3: USER MANAGEMENT -->
                <div class="space-y-0.5">
                    <div class="px-3 pt-2 pb-1 sidebar-section-label">
                        <span class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400 dark:text-slate-500 block truncate">USER MANAGEMENT</span>
                    </div>

                    <!-- Accordion Users -->
                    <div>
                        <div onclick="toggleSubmenu('users')" title="Users" class="flex items-center justify-between px-3 py-1.5 cursor-pointer hover:bg-slate-100 dark:hover:bg-[#2c3338] text-slate-700 dark:text-slate-300">
                            <div class="flex items-center gap-2 truncate">
                                <svg class="w-4 h-4 text-slate-400 shrink-0 mx-auto sm:mx-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                <span class="sidebar-item-text truncate">Users</span>
                            </div>
                            <svg id="chevron-users" class="sidebar-chevron w-3 h-3 text-slate-400 shrink-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                        <div id="submenu-users" class="sidebar-submenu hidden bg-slate-50 dark:bg-[#101517] py-1">
                            <a href="/{{ $panelPrefix }}/resources/users" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">All Users</a>
                            <a href="/{{ $panelPrefix }}/users/create" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">Add New User</a>
                            <a href="/{{ $panelPrefix }}/profile" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">My Profile</a>
                        </div>
                    </div>

                    <a href="/{{ $panelPrefix }}/roles" title="Roles & Perms" class="flex items-center gap-2 px-3 py-1.5 hover:bg-slate-100 dark:hover:bg-[#2c3338] text-slate-700 dark:text-slate-300 {{ request()->is($panelPrefix . '/roles') ? 'bg-[#2271b1] text-white font-semibold' : '' }}">
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-sky-500 shrink-0 mx-auto sm:mx-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        <span class="sidebar-item-text truncate">Roles</span>
                    </a>

                    <a href="/{{ $panelPrefix }}/permissions" title="Permissions Matrix" class="flex items-center gap-2 px-3 py-1.5 hover:bg-slate-100 dark:hover:bg-[#2c3338] text-slate-700 dark:text-slate-300 {{ request()->is($panelPrefix . '/permissions') ? 'bg-[#2271b1] text-white font-semibold' : '' }}">
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-sky-500 shrink-0 mx-auto sm:mx-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/></svg>
                        <span class="sidebar-item-text truncate">Permissions</span>
                    </a>
                </div>

                <!-- Group 4: SYSTEM -->
                <div class="space-y-0.5">
                    <div class="px-3 pt-2 pb-1 sidebar-section-label">
                        <span class="text-[9px] font-extrabold uppercase tracking-wider text-slate-400 dark:text-slate-500 block truncate">SYSTEM</span>
                    </div>
                    
                    <!-- Accordion Sentinel Security -->
                    <div>
                        <div onclick="toggleSubmenu('security')" title="Sentinel WAF" class="flex items-center justify-between px-3 py-1.5 cursor-pointer hover:bg-slate-100 dark:hover:bg-[#2c3338] text-slate-700 dark:text-slate-300">
                            <div class="flex items-center gap-2 truncate">
                                <svg class="w-4 h-4 text-slate-400 shrink-0 mx-auto sm:mx-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <span class="sidebar-item-text truncate">Sentinel WAF</span>
                            </div>
                            <svg id="chevron-security" class="sidebar-chevron w-3 h-3 text-slate-400 shrink-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                        <div id="submenu-security" class="sidebar-submenu hidden bg-slate-50 dark:bg-[#101517] py-1">
                            <a href="/admin/security/logs" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">Threat Logs</a>
                            <a href="/admin/security/blacklist" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">Blocked IPs</a>
                        </div>
                    </div>

                    <!-- Accordion Settings -->
                    <div>
                        <div onclick="toggleSubmenu('settings')" title="Settings" class="flex items-center justify-between px-3 py-1.5 cursor-pointer hover:bg-slate-100 dark:hover:bg-[#2c3338] text-slate-700 dark:text-slate-300">
                            <div class="flex items-center gap-2 truncate">
                                <svg class="w-4 h-4 text-slate-400 shrink-0 mx-auto sm:mx-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span class="sidebar-item-text truncate">Settings</span>
                            </div>
                            <svg id="chevron-settings" class="sidebar-chevron w-3 h-3 text-slate-400 shrink-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                        <div id="submenu-settings" class="sidebar-submenu hidden bg-slate-50 dark:bg-[#101517] py-1">
                            <a href="/admin/settings/general" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">General</a>
                            <a href="/admin/settings/reading" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">Writing & Reading</a>
                            <a href="/admin/settings/api" class="block pl-9 pr-3 py-1 text-[11px] text-slate-500 dark:text-slate-400 hover:text-sky-500">API Keys</a>
                        </div>
                    </div>
                </div>
            </nav>
            <button onclick="toggleSidebar()" class="h-10 border-t border-slate-200 dark:border-[#2c3338] flex items-center px-3 text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white text-xs gap-2 transition-colors">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                <span id="collapse-text" class="truncate">Collapse menu</span>
            </button>
        </aside>

        <!-- Main Content Area with Dynamic Section Yield -->
        <main class="flex-1 p-6 space-y-6 max-w-full overflow-x-auto bg-slate-50 dark:bg-slate-950 transition-colors duration-200">
            @yield('content')
        </main>
    </div>
</body>
</html>
