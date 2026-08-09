import React, { useState } from 'react';
import {
  LayoutDashboard,
  BarChart3,
  FileText,
  Image as ImageIcon,
  Layers,
  MessageSquare,
  Palette,
  Puzzle,
  Users,
  ShieldCheck,
  ShieldAlert,
  Wrench,
  Settings,
  ChevronDown,
  ChevronUp,
  ChevronLeft,
  ChevronRight,
} from 'lucide-react';

interface SubMenuItem {
  label: string;
  url: string;
  active?: boolean;
}

interface MenuItem {
  id: string;
  label: string;
  icon?: string;
  url?: string;
  active?: boolean;
  children?: SubMenuItem[];
}

interface MenuGroup {
  groupLabel?: string;
  items: MenuItem[];
}

interface WordPressSidebarProps {
  menuGroups?: MenuGroup[];
  currentUrl?: string;
  collapsed?: boolean;
  onToggleCollapse?: () => void;
}

const getIconComponent = (id: string) => {
  switch (id) {
    case 'dashboard':
      return <LayoutDashboard className="w-4 h-4" />;
    case 'analytics':
      return <BarChart3 className="w-4 h-4" />;
    case 'posts':
      return <FileText className="w-4 h-4" />;
    case 'media':
      return <ImageIcon className="w-4 h-4" />;
    case 'pages':
      return <Layers className="w-4 h-4" />;
    case 'comments':
      return <MessageSquare className="w-4 h-4" />;
    case 'users':
      return <Users className="w-4 h-4" />;
    case 'roles':
      return <ShieldCheck className="w-4 h-4" />;
    case 'appearance':
      return <Palette className="w-4 h-4" />;
    case 'plugins':
      return <Puzzle className="w-4 h-4" />;
    case 'security':
      return <ShieldAlert className="w-4 h-4" />;
    case 'tools':
      return <Wrench className="w-4 h-4" />;
    case 'settings':
      return <Settings className="w-4 h-4" />;
    default:
      return <FileText className="w-4 h-4" />;
  }
};

export const WordPressSidebar: React.FC<WordPressSidebarProps> = ({
  menuGroups = [
    {
      groupLabel: 'MAIN',
      items: [
        { id: 'dashboard', label: 'Dashboard', url: '/admin', active: true },
        { id: 'analytics', label: 'Analytics', url: '/admin/analytics' },
      ],
    },
    {
      groupLabel: 'CONTENT',
      items: [
        {
          id: 'posts',
          label: 'Posts',
          url: '/admin/posts',
          children: [
            { label: 'All Posts', url: '/admin/posts' },
            { label: 'Add New', url: '/admin/posts/create' },
            { label: 'Categories', url: '/admin/posts/categories' },
            { label: 'Tags', url: '/admin/posts/tags' },
          ],
        },
        {
          id: 'pages',
          label: 'Pages',
          url: '/admin/pages',
          children: [
            { label: 'All Pages', url: '/admin/pages' },
            { label: 'Add New Page', url: '/admin/pages/create' },
            { label: 'Page Templates', url: '/admin/pages/templates' },
          ],
        },
        {
          id: 'media',
          label: 'Media',
          url: '/admin/media',
          children: [
            { label: 'Media Library', url: '/admin/media' },
            { label: 'Add New File', url: '/admin/media/upload' },
          ],
        },
        { id: 'comments', label: 'Comments', url: '/admin/comments' },
      ],
    },
    {
      groupLabel: 'USER MANAGEMENT',
      items: [
        {
          id: 'users',
          label: 'Users',
          url: '/admin/users',
          children: [
            { label: 'All Users', url: '/admin/users' },
            { label: 'Add New User', url: '/admin/users/create' },
            { label: 'My Profile', url: '/admin/profile' },
          ],
        },
        {
          id: 'roles',
          label: 'Roles & Perms',
          url: '/admin/roles',
          children: [
            { label: 'All Roles', url: '/admin/roles' },
            { label: 'Permissions Matrix', url: '/admin/roles/permissions' },
          ],
        },
      ],
    },
    {
      groupLabel: 'SYSTEM',
      items: [
        {
          id: 'appearance',
          label: 'Appearance',
          url: '/admin/appearance',
          children: [
            { label: 'Themes', url: '/admin/appearance/themes' },
            { label: 'Theme Customize', url: '/admin/appearance/customize' },
            { label: 'Widgets', url: '/admin/appearance/widgets' },
            { label: 'Menus', url: '/admin/appearance/menus' },
          ],
        },
        { id: 'plugins', label: 'Plugins', url: '/admin/plugins' },
        {
          id: 'security',
          label: 'Sentinel WAF',
          url: '/admin/security',
          children: [
            { label: 'Threat Logs', url: '/admin/security/logs' },
            { label: 'Blocked IPs', url: '/admin/security/blacklist' },
            { label: 'Scanner Settings', url: '/admin/security/config' },
          ],
        },
        {
          id: 'settings',
          label: 'Settings',
          url: '/admin/settings',
          children: [
            { label: 'General', url: '/admin/settings/general' },
            { label: 'Writing & Reading', url: '/admin/settings/reading' },
            { label: 'API Keys', url: '/admin/settings/api' },
          ],
        },
      ],
    },
  ],
  collapsed: externalCollapsed,
  onToggleCollapse,
}) => {
  const [internalCollapsed, setInternalCollapsed] = useState(false);
  const isCollapsed = externalCollapsed !== undefined ? externalCollapsed : internalCollapsed;

  const handleToggle = () => {
    if (onToggleCollapse) {
      onToggleCollapse();
    } else {
      setInternalCollapsed(!internalCollapsed);
    }
  };

  const [expandedItems, setExpandedItems] = useState<Record<string, boolean>>({
    posts: true,
    users: false,
    appearance: false,
    security: false,
    settings: false,
  });

  const toggleExpand = (id: string) => {
    if (!isCollapsed) {
      setExpandedItems((prev) => ({ ...prev, [id]: !prev[id] }));
    }
  };

  return (
    <aside
      className={`bg-[#1d2327] dark:bg-[#1d2327] light:bg-white text-slate-300 dark:text-slate-300 light:text-slate-700 flex flex-col transition-all duration-200 select-none ${
        isCollapsed ? 'w-[52px]' : 'w-[160px]'
      } border-r border-[#2c3338] dark:border-[#2c3338] light:border-slate-200 h-[calc(100vh-2.75rem)] sticky top-11 text-xs shrink-0`}
    >
      {/* Navigation Items grouped by section labels */}
      <nav className="flex-1 py-1 space-y-2 overflow-y-auto no-scrollbar">
        {menuGroups.map((group, groupIdx) => (
          <div key={groupIdx} className="space-y-0.5">
            {/* Section Header Label */}
            {group.groupLabel && (
              <div className="px-3 pt-2 pb-1">
                {isCollapsed ? (
                  <div className="border-t border-[#2c3338] dark:border-[#2c3338] light:border-slate-200 my-1" />
                ) : (
                  <span className="text-[9px] font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-500 light:text-slate-400 block truncate">
                    {group.groupLabel}
                  </span>
                )}
              </div>
            )}

            {/* Section Items */}
            {group.items.map((item) => {
              const isActive = item.active;
              const hasChildren = item.children && item.children.length > 0;
              const isExpanded = expandedItems[item.id];

              return (
                <div key={item.id} className="relative group">
                  <div
                    onClick={() => hasChildren && toggleExpand(item.id)}
                    title={isCollapsed ? item.label : undefined}
                    className={`flex items-center ${
                      isCollapsed ? 'justify-center px-0 py-2.5' : 'justify-between px-3 py-1.5'
                    } cursor-pointer transition-colors ${
                      isActive
                        ? `bg-[#2271b1] text-white font-semibold relative ${
                            isCollapsed
                              ? 'after:absolute after:right-0 after:top-1/2 after:-translate-y-1/2 after:border-y-4 after:border-y-transparent after:border-r-4 after:border-r-slate-50 dark:after:border-r-slate-950'
                              : 'after:absolute after:right-0 after:top-1/2 after:-translate-y-1/2 after:border-y-8 after:border-y-transparent after:border-r-8 after:border-r-slate-50 dark:after:border-r-slate-950'
                          }`
                        : 'hover:bg-[#2c3338] dark:hover:bg-[#2c3338] light:hover:bg-slate-100 hover:text-sky-400 text-slate-300 dark:text-slate-300 light:text-slate-700'
                    }`}
                  >
                    <div className={`flex items-center ${isCollapsed ? 'justify-center w-full' : 'gap-2 truncate'}`}>
                      <span className="shrink-0 group-hover:text-sky-400">
                        {getIconComponent(item.id)}
                      </span>
                      {!isCollapsed && <span className="truncate">{item.label}</span>}
                    </div>
                    {!isCollapsed && hasChildren && (
                      <span className="text-slate-400 shrink-0 ml-1">
                        {isExpanded ? <ChevronUp className="w-3 h-3" /> : <ChevronDown className="w-3 h-3" />}
                      </span>
                    )}
                  </div>

                  {/* Submenu Children Accordion - ONLY rendered when expanded & NOT collapsed */}
                  {!isCollapsed && hasChildren && isExpanded && (
                    <div className="bg-[#101517] dark:bg-[#101517] light:bg-slate-50 py-1">
                      {item.children?.map((child, idx) => (
                        <a
                          key={idx}
                          href={child.url}
                          className="block pl-9 pr-3 py-1 text-[11px] text-slate-400 hover:text-sky-400 transition-colors"
                        >
                          {child.label}
                        </a>
                      ))}
                    </div>
                  )}
                </div>
              );
            })}
          </div>
        ))}
      </nav>

      {/* Bottom Collapse Toggle */}
      <button
        onClick={handleToggle}
        className={`h-10 border-t border-[#2c3338] dark:border-[#2c3338] light:border-slate-200 flex items-center ${
          isCollapsed ? 'justify-center px-0' : 'px-3 gap-2'
        } hover:bg-[#2c3338] dark:hover:bg-[#2c3338] light:hover:bg-slate-100 text-slate-400 hover:text-white dark:hover:text-white light:hover:text-slate-900 text-xs transition-colors`}
      >
        {isCollapsed ? (
          <ChevronRight className="w-4 h-4" />
        ) : (
          <>
            <ChevronLeft className="w-4 h-4 shrink-0" />
            <span className="truncate">Collapse menu</span>
          </>
        )}
      </button>
    </aside>
  );
};

export default WordPressSidebar;
