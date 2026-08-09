import React, { useEffect, useRef, useState } from 'react';
import {
  Menu,
  Search,
  Bell,
  Sun,
  Moon,
  User,
  ChevronDown,
  LogOut,
  Settings as SettingsIcon,
  CheckCircle,
  AlertTriangle,
  Info,
} from 'lucide-react';

interface TopAdminBarProps {
  panelName?: string;
  userName?: string;
  userRole?: string;
  onToggleSidebar?: () => void;
  isDarkTheme?: boolean;
  onToggleTheme?: () => void;
}

export const TopAdminBar: React.FC<TopAdminBarProps> = ({
  panelName = 'Universal Panel',
  userName = 'Ilham Hatta',
  userRole = 'Super Admin',
  onToggleSidebar,
  isDarkTheme: externalIsDark,
  onToggleTheme: externalToggleTheme,
}) => {
  const searchInputRef = useRef<HTMLInputElement>(null);
  const [internalDarkMode, setInternalDarkMode] = useState(true);
  const isDark = externalIsDark !== undefined ? externalIsDark : internalDarkMode;

  const [profileDropdownOpen, setProfileDropdownOpen] = useState(false);
  const [notifDropdownOpen, setNotifDropdownOpen] = useState(false);

  const [notifications, setNotifications] = useState([
    { id: 1, title: 'Sentinel WAF Alert', desc: '1 SQLi attack blocked from 192.168.1.5', time: '5m ago', type: 'warning' },
    { id: 2, title: 'New User Registered', desc: 'User Sarah Johnson created an account', time: '1h ago', type: 'info' },
    { id: 3, title: 'System Backup Complete', desc: 'Database backup stored successfully', time: '2h ago', type: 'success' },
  ]);

  useEffect(() => {
    const handleKeyDown = (e: KeyboardEvent) => {
      if ((e.metaKey || e.ctrlKey) && (e.key === 'k' || e.key === 'K')) {
        e.preventDefault();
        searchInputRef.current?.focus();
      }
    };

    window.addEventListener('keydown', handleKeyDown);
    return () => window.removeEventListener('keydown', handleKeyDown);
  }, []);

  const handleThemeToggle = () => {
    if (externalToggleTheme) {
      externalToggleTheme();
    } else {
      const nextMode = !internalDarkMode;
      setInternalDarkMode(nextMode);
      if (nextMode) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('universal_panel_theme', 'dark');
      } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('universal_panel_theme', 'light');
      }
    }
  };

  const markAllRead = () => {
    setNotifications([]);
  };

  return (
    <header className="h-11 bg-white dark:bg-[#1d2327] border-b border-slate-200 dark:border-[#2c3338] text-slate-800 dark:text-slate-200 px-4 flex items-center justify-between text-xs select-none relative z-30 transition-colors">
      {/* Left side: Panel Name & Hamburger Menu with fixed whitespace-nowrap shrink-0 */}
      <div className="flex items-center gap-4 shrink-0 min-w-max">
        <a href="/admin" className="font-bold text-slate-800 dark:text-slate-100 text-sm tracking-tight hover:text-sky-500 whitespace-nowrap">
          {panelName}
        </a>
        <button
          onClick={onToggleSidebar}
          className="p-1 rounded text-slate-400 hover:text-slate-800 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-[#2c3338] transition-colors focus:outline-none"
          title="Toggle Sidebar"
        >
          <Menu className="w-4 h-4" />
        </button>
      </div>

      {/* Center: Search Input in the middle */}
      <div className="flex-1 flex justify-center max-w-md mx-4">
        <div className="relative flex items-center w-full max-w-sm">
          <Search className="w-3.5 h-3.5 text-slate-400 absolute left-2.5" />
          <input
            ref={searchInputRef}
            type="text"
            placeholder="Search resources (Cmd+K)..."
            className="bg-slate-100 dark:bg-[#101517] text-slate-800 dark:text-slate-200 text-xs pl-8 pr-3 py-1 rounded border border-slate-300 dark:border-[#2c3338] focus:outline-none focus:border-sky-500 w-full transition-all"
          />
        </div>
      </div>

      {/* Right side: Notification -> Light/Dark -> Profile */}
      <div className="flex items-center gap-3 shrink-0">
        {/* 1. Notification Dropdown Toggle */}
        <div className="relative">
          <button
            onClick={() => {
              setNotifDropdownOpen((prev) => !prev);
              setProfileDropdownOpen(false);
            }}
            className="p-1.5 rounded text-slate-400 hover:text-slate-800 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-[#2c3338] transition-colors relative focus:outline-none"
            title="Notifications"
          >
            <Bell className="w-4 h-4" />
            {notifications.length > 0 && (
              <span className="absolute top-1 right-1 w-2 h-2 bg-sky-500 rounded-full ring-2 ring-white dark:ring-[#1d2327]" />
            )}
          </button>

          {/* Notification Dropdown Menu */}
          {notifDropdownOpen && (
            <div className="absolute right-0 mt-2 w-72 bg-white dark:bg-[#1d2327] border border-slate-200 dark:border-[#2c3338] rounded-md shadow-xl py-1 z-50 text-xs text-slate-800 dark:text-slate-200 divide-y divide-slate-100 dark:divide-[#2c3338]">
              <div className="px-3 py-2 flex items-center justify-between">
                <span className="font-semibold text-slate-800 dark:text-slate-100">Notifications</span>
                {notifications.length > 0 && (
                  <button onClick={markAllRead} className="text-[10px] text-sky-500 hover:underline">
                    Mark all read
                  </button>
                )}
              </div>
              <div className="max-h-64 overflow-y-auto divide-y divide-slate-100 dark:divide-[#2c3338]">
                {notifications.length === 0 ? (
                  <div className="p-4 text-center text-slate-400 text-xs">No unread notifications</div>
                ) : (
                  notifications.map((n) => (
                    <div key={n.id} className="p-2.5 hover:bg-slate-50 dark:hover:bg-[#2c3338] transition-colors flex gap-2.5">
                      {n.type === 'warning' && <AlertTriangle className="w-4 h-4 text-amber-500 shrink-0 mt-0.5" />}
                      {n.type === 'info' && <Info className="w-4 h-4 text-sky-500 shrink-0 mt-0.5" />}
                      {n.type === 'success' && <CheckCircle className="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" />}
                      <div className="flex-1 min-w-0">
                        <p className="font-semibold text-slate-800 dark:text-slate-100 truncate">{n.title}</p>
                        <p className="text-[11px] text-slate-500 dark:text-slate-400 leading-tight mt-0.5">{n.desc}</p>
                        <p className="text-[9px] text-slate-400 mt-1">{n.time}</p>
                      </div>
                    </div>
                  ))
                )}
              </div>
            </div>
          )}
        </div>

        {/* 2. Light / Dark Mode Toggle Icon */}
        <button
          onClick={handleThemeToggle}
          className="p-1.5 rounded text-slate-400 hover:text-slate-800 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-[#2c3338] transition-colors focus:outline-none cursor-pointer"
          title={isDark ? 'Switch to Light Mode' : 'Switch to Dark Mode'}
        >
          {isDark ? <Sun className="w-4 h-4 text-amber-400" /> : <Moon className="w-4 h-4 text-indigo-400" />}
        </button>

        <div className="h-4 w-px bg-slate-200 dark:bg-[#2c3338] mx-1" />

        {/* 3. User Profile Dropdown Toggle */}
        <div className="relative">
          <button
            onClick={() => {
              setProfileDropdownOpen((prev) => !prev);
              setNotifDropdownOpen(false);
            }}
            className="flex items-center gap-2 px-2 py-1 rounded hover:bg-slate-100 dark:hover:bg-[#2c3338] transition-colors focus:outline-none text-left"
          >
            <div className="w-7 h-7 rounded-full bg-sky-600 text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm">
              <User className="w-4 h-4" />
            </div>
            <div className="flex flex-col leading-tight">
              <span className="text-slate-800 dark:text-slate-100 font-semibold text-xs truncate max-w-[120px]">{userName}</span>
              <span className="text-[10px] text-slate-500 dark:text-slate-400 font-normal truncate max-w-[120px]">{userRole}</span>
            </div>
            <ChevronDown className="w-3.5 h-3.5 text-slate-400 ml-0.5 shrink-0" />
          </button>

          {/* Profile Dropdown Menu */}
          {profileDropdownOpen && (
            <div className="absolute right-0 mt-2 w-48 bg-white dark:bg-[#1d2327] border border-slate-200 dark:border-[#2c3338] rounded-md shadow-xl py-1 z-50 text-xs text-slate-800 dark:text-slate-200 divide-y divide-slate-100 dark:divide-[#2c3338]">
              <div className="px-3 py-2">
                <p className="font-semibold text-slate-800 dark:text-slate-100">{userName}</p>
                <p className="text-[10px] text-slate-500 dark:text-slate-400">{userRole}</p>
              </div>
              <div className="py-1">
                <a href="/admin/profile" className="flex items-center gap-2 px-3 py-1.5 hover:bg-slate-50 dark:hover:bg-[#2c3338] hover:text-sky-500">
                  <User className="w-3.5 h-3.5" /> My Profile
                </a>
                <a href="/admin/settings" className="flex items-center gap-2 px-3 py-1.5 hover:bg-slate-50 dark:hover:bg-[#2c3338] hover:text-sky-500">
                  <SettingsIcon className="w-3.5 h-3.5" /> Settings
                </a>
              </div>
              <div className="py-1">
                <button className="w-full text-left flex items-center gap-2 px-3 py-1.5 text-rose-500 hover:bg-slate-50 dark:hover:bg-[#2c3338]">
                  <LogOut className="w-3.5 h-3.5" /> Sign Out
                </button>
              </div>
            </div>
          )}
        </div>
      </div>
    </header>
  );
};

export default TopAdminBar;
