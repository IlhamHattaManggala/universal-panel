import React, { useState, useEffect } from 'react';
import WordPressSidebar from '../Components/WordPressSidebar';
import TopAdminBar from '../Components/TopAdminBar';
import {
  TrendingUp,
  TrendingDown,
  Users,
  DollarSign,
  ShieldCheck,
  ShoppingBag,
  Plus,
  Filter,
  Download,
  MoreHorizontal,
  Edit,
  Eye,
  Trash2,
  ChevronLeft,
  ChevronRight,
  RefreshCw,
} from 'lucide-react';

export const Dashboard: React.FC = () => {
  const [sidebarCollapsed, setSidebarCollapsed] = useState(false);
  const [isDarkMode, setIsDarkMode] = useState(true);

  useEffect(() => {
    const savedTheme = localStorage.getItem('universal_panel_theme');
    if (savedTheme === 'light') {
      setIsDarkMode(false);
      document.documentElement.classList.remove('dark');
    } else {
      setIsDarkMode(true);
      document.documentElement.classList.add('dark');
    }
  }, []);

  const toggleSidebar = () => {
    setSidebarCollapsed((prev) => !prev);
  };

  const toggleTheme = () => {
    setIsDarkMode((prev) => {
      const nextMode = !prev;
      if (nextMode) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('universal_panel_theme', 'dark');
      } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('universal_panel_theme', 'light');
      }
      return nextMode;
    });
  };

  const sampleUsers = [
    { id: 1, name: 'Alex Morgan', email: 'alex.m@example.com', role: 'Super Admin', status: 'Active', registered: '2026-08-01' },
    { id: 2, name: 'Sarah Connor', email: 'sarah.c@example.com', role: 'Editor', status: 'Active', registered: '2026-08-03' },
    { id: 3, name: 'David Miller', email: 'david.m@example.com', role: 'Author', status: 'Pending', registered: '2026-08-05' },
    { id: 4, name: 'Emily Watson', email: 'emily.w@example.com', role: 'Subscriber', status: 'Active', registered: '2026-08-07' },
    { id: 5, name: 'Robert Chen', email: 'robert.c@example.com', role: 'Contributor', status: 'Blocked', registered: '2026-08-08' },
  ];

  return (
    <div className={`min-h-screen ${isDarkMode ? 'bg-slate-950 text-slate-100' : 'bg-slate-100 text-slate-900'} flex flex-col font-sans transition-colors duration-200`}>
      <TopAdminBar onToggleSidebar={toggleSidebar} isDarkTheme={isDarkMode} onToggleTheme={toggleTheme} />
      
      <div className="flex flex-1">
        <WordPressSidebar collapsed={sidebarCollapsed} onToggleCollapse={toggleSidebar} />
        
        <main className={`flex-1 p-6 space-y-6 max-w-full overflow-x-auto ${isDarkMode ? 'bg-slate-950' : 'bg-slate-50'}`}>
          {/* Header & Quick Action Buttons */}
          <header className="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-800 pb-4">
            <div>
              <div className="flex items-center gap-2 text-xs text-slate-400 mb-1">
                <span>Admin</span>
                <span>/</span>
                <span className="text-sky-400 font-medium">Dashboard Overview</span>
              </div>
              <h1 className={`text-2xl font-bold ${isDarkMode ? 'text-slate-100' : 'text-slate-900'}`}>Dashboard Overview</h1>
            </div>

            <div className="flex items-center gap-2">
              <button className={`px-3 py-1.5 rounded-md border text-xs font-medium flex items-center gap-1.5 transition-colors ${
                isDarkMode ? 'bg-slate-900 border-slate-800 text-slate-300 hover:bg-slate-800' : 'bg-white border-slate-300 text-slate-700 hover:bg-slate-100'
              }`}>
                <RefreshCw className="w-3.5 h-3.5 text-slate-400" />
                Refresh Data
              </button>
              <button className="px-3.5 py-1.5 rounded-md bg-[#2271b1] hover:bg-sky-600 text-white text-xs font-semibold flex items-center gap-1.5 transition-colors shadow-sm">
                <Plus className="w-3.5 h-3.5" />
                New Resource
              </button>
            </div>
          </header>

          {/* 4 Stat Cards Grid */}
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            {/* Card 1 */}
            <div className={`${isDarkMode ? 'bg-slate-900 border-slate-800' : 'bg-white border-slate-200 shadow-sm'} border rounded-xl p-5 relative overflow-hidden`}>
              <div className="flex items-center justify-between">
                <span className={`text-xs font-medium ${isDarkMode ? 'text-slate-400' : 'text-slate-500'}`}>Total Revenue</span>
                <div className="w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-500 flex items-center justify-center">
                  <DollarSign className="w-4 h-4" />
                </div>
              </div>
              <div className={`text-2xl font-bold ${isDarkMode ? 'text-slate-100' : 'text-slate-900'} mt-2`}>$128,450.00</div>
              <div className="flex items-center gap-1.5 mt-2 text-xs font-medium text-emerald-400">
                <TrendingUp className="w-3.5 h-3.5" />
                <span>+14.2%</span>
                <span className={`text-[11px] ${isDarkMode ? 'text-slate-500' : 'text-slate-400'} font-normal ml-1`}>vs last month</span>
              </div>
            </div>

            {/* Card 2 */}
            <div className={`${isDarkMode ? 'bg-slate-900 border-slate-800' : 'bg-white border-slate-200 shadow-sm'} border rounded-xl p-5 relative overflow-hidden`}>
              <div className="flex items-center justify-between">
                <span className={`text-xs font-medium ${isDarkMode ? 'text-slate-400' : 'text-slate-500'}`}>Active Users</span>
                <div className="w-8 h-8 rounded-lg bg-sky-500/10 text-sky-500 flex items-center justify-center">
                  <Users className="w-4 h-4" />
                </div>
              </div>
              <div className={`text-2xl font-bold ${isDarkMode ? 'text-slate-100' : 'text-slate-900'} mt-2`}>2,845</div>
              <div className="flex items-center gap-1.5 mt-2 text-xs font-medium text-sky-400">
                <TrendingUp className="w-3.5 h-3.5" />
                <span>+8.1%</span>
                <span className={`text-[11px] ${isDarkMode ? 'text-slate-500' : 'text-slate-400'} font-normal ml-1`}>vs last week</span>
              </div>
            </div>

            {/* Card 3 */}
            <div className={`${isDarkMode ? 'bg-slate-900 border-slate-800' : 'bg-white border-slate-200 shadow-sm'} border rounded-xl p-5 relative overflow-hidden`}>
              <div className="flex items-center justify-between">
                <span className={`text-xs font-medium ${isDarkMode ? 'text-slate-400' : 'text-slate-500'}`}>Sentinel Threats Blocked</span>
                <div className="w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-400 flex items-center justify-center">
                  <ShieldCheck className="w-4 h-4" />
                </div>
              </div>
              <div className={`text-2xl font-bold ${isDarkMode ? 'text-slate-100' : 'text-slate-900'} mt-2`}>142 Attacks</div>
              <div className="flex items-center gap-1.5 mt-2 text-xs font-medium text-emerald-400">
                <TrendingDown className="w-3.5 h-3.5" />
                <span>-24.5%</span>
                <span className={`text-[11px] ${isDarkMode ? 'text-slate-500' : 'text-slate-400'} font-normal ml-1`}>threat reduction</span>
              </div>
            </div>

            {/* Card 4 */}
            <div className={`${isDarkMode ? 'bg-slate-900 border-slate-800' : 'bg-white border-slate-200 shadow-sm'} border rounded-xl p-5 relative overflow-hidden`}>
              <div className="flex items-center justify-between">
                <span className={`text-xs font-medium ${isDarkMode ? 'text-slate-400' : 'text-slate-500'}`}>Pending Requests</span>
                <div className="w-8 h-8 rounded-lg bg-amber-500/10 text-amber-400 flex items-center justify-center">
                  <ShoppingBag className="w-4 h-4" />
                </div>
              </div>
              <div className={`text-2xl font-bold ${isDarkMode ? 'text-slate-100' : 'text-slate-900'} mt-2`}>18 Orders</div>
              <div className="flex items-center gap-1.5 mt-2 text-xs font-medium text-amber-400">
                <span>Action Required</span>
              </div>
            </div>
          </div>

          {/* Filament-Style Data Table Component */}
          <div className={`${isDarkMode ? 'bg-slate-900 border-slate-800' : 'bg-white border-slate-200 shadow-sm'} border rounded-xl overflow-hidden`}>
            {/* Table Header Controls */}
            <div className="p-4 border-b border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
              <div>
                <h2 className={`text-base font-bold ${isDarkMode ? 'text-slate-100' : 'text-slate-900'}`}>User Management Resource</h2>
                <p className={`text-xs ${isDarkMode ? 'text-slate-400' : 'text-slate-500'}`}>Registered accounts and access permission levels</p>
              </div>

              <div className="flex items-center gap-2">
                <button className={`px-3 py-1.5 rounded-md border text-xs font-medium flex items-center gap-1.5 ${
                  isDarkMode ? 'bg-slate-950 border-slate-800 text-slate-300 hover:bg-slate-800' : 'bg-slate-50 border-slate-300 text-slate-700'
                }`}>
                  <Filter className="w-3.5 h-3.5" /> Filter
                </button>
                <button className={`px-3 py-1.5 rounded-md border text-xs font-medium flex items-center gap-1.5 ${
                  isDarkMode ? 'bg-slate-950 border-slate-800 text-slate-300 hover:bg-slate-800' : 'bg-slate-50 border-slate-300 text-slate-700'
                }`}>
                  <Download className="w-3.5 h-3.5" /> Export
                </button>
              </div>
            </div>

            {/* Table Element */}
            <div className="overflow-x-auto">
              <table className="w-full text-left text-xs">
                <thead className={`${isDarkMode ? 'bg-slate-950 text-slate-400 border-slate-800' : 'bg-slate-100 text-slate-600 border-slate-200'} border-b uppercase font-semibold text-[10px] tracking-wider`}>
                  <tr>
                    <th className="py-3 px-4">User</th>
                    <th className="py-3 px-4">Role</th>
                    <th className="py-3 px-4">Status</th>
                    <th className="py-3 px-4">Registered Date</th>
                    <th className="py-3 px-4 text-right">Actions</th>
                  </tr>
                </thead>
                <tbody className={`divide-y ${isDarkMode ? 'divide-slate-800/60 text-slate-200' : 'divide-slate-200 text-slate-700'}`}>
                  {sampleUsers.map((user) => (
                    <tr key={user.id} className={`${isDarkMode ? 'hover:bg-slate-800/40' : 'hover:bg-slate-50'} transition-colors`}>
                      <td className="py-3 px-4 font-medium">
                        <div className="flex items-center gap-3">
                          <div className="w-7 h-7 rounded-full bg-sky-600/20 text-sky-400 flex items-center justify-center font-bold text-xs shrink-0">
                            {user.name.charAt(0)}
                          </div>
                          <div>
                            <div className={`font-semibold ${isDarkMode ? 'text-slate-100' : 'text-slate-900'}`}>{user.name}</div>
                            <div className="text-[11px] text-slate-400 font-normal">{user.email}</div>
                          </div>
                        </div>
                      </td>
                      <td className="py-3 px-4 font-medium text-slate-300">{user.role}</td>
                      <td className="py-3 px-4">
                        {user.status === 'Active' && (
                          <span className="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                            Active
                          </span>
                        )}
                        {user.status === 'Pending' && (
                          <span className="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20">
                            Pending
                          </span>
                        )}
                        {user.status === 'Blocked' && (
                          <span className="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-rose-500/10 text-rose-400 border border-rose-500/20">
                            Blocked
                          </span>
                        )}
                      </td>
                      <td className="py-3 px-4 text-slate-400">{user.registered}</td>
                      <td className="py-3 px-4 text-right">
                        <div className="flex items-center justify-end gap-1.5">
                          <button className="p-1 rounded text-slate-400 hover:text-sky-400 hover:bg-slate-800 transition-colors" title="View">
                            <Eye className="w-3.5 h-3.5" />
                          </button>
                          <button className="p-1 rounded text-slate-400 hover:text-amber-400 hover:bg-slate-800 transition-colors" title="Edit">
                            <Edit className="w-3.5 h-3.5" />
                          </button>
                          <button className="p-1 rounded text-slate-400 hover:text-rose-400 hover:bg-slate-800 transition-colors" title="Delete">
                            <Trash2 className="w-3.5 h-3.5" />
                          </button>
                        </div>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>

            {/* Table Footer Pagination */}
            <div className={`p-4 border-t ${isDarkMode ? 'border-slate-800 text-slate-400' : 'border-slate-200 text-slate-500'} flex items-center justify-between text-xs`}>
              <span>Showing <strong className="font-semibold text-slate-200">1</strong> to <strong className="font-semibold text-slate-200">5</strong> of <strong className="font-semibold text-slate-200">128</strong> results</span>
              <div className="flex items-center gap-1">
                <button className={`p-1.5 rounded border ${isDarkMode ? 'border-slate-800 hover:bg-slate-800' : 'border-slate-300 hover:bg-slate-100'} disabled:opacity-50`}>
                  <ChevronLeft className="w-3.5 h-3.5" />
                </button>
                <button className={`p-1.5 rounded border ${isDarkMode ? 'border-slate-800 hover:bg-slate-800' : 'border-slate-300 hover:bg-slate-100'}`}>
                  <ChevronRight className="w-3.5 h-3.5" />
                </button>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  );
};

export default Dashboard;
