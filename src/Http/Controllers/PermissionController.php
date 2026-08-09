<?php

namespace Manggala\UniversalPanel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        $roles = [
            'Superadmin' => [
                'Posts' => ['view', 'create', 'edit', 'delete'],
                'Pages' => ['view', 'create', 'edit', 'delete'],
                'Media' => ['view', 'upload', 'delete'],
                'Users' => ['view', 'create', 'edit', 'delete'],
                'Security' => ['view', 'configure'],
                'Settings' => ['view', 'update'],
            ],
            'Admin' => [
                'Posts' => ['view', 'create', 'edit', 'delete'],
                'Pages' => ['view', 'create', 'edit'],
                'Media' => ['view', 'upload'],
                'Users' => ['view', 'create', 'edit'],
                'Security' => ['view'],
                'Settings' => ['view'],
            ],
            'Editor' => [
                'Posts' => ['view', 'create', 'edit'],
                'Pages' => ['view', 'create', 'edit'],
                'Media' => ['view', 'upload'],
                'Users' => [],
                'Security' => [],
                'Settings' => [],
            ],
            'Author' => [
                'Posts' => ['view', 'create'],
                'Pages' => [],
                'Media' => ['view', 'upload'],
                'Users' => [],
                'Security' => [],
                'Settings' => [],
            ],
        ];

        $modules = [
            'Posts' => ['view' => 'View Posts', 'create' => 'Create Posts', 'edit' => 'Edit Posts', 'delete' => 'Delete Posts'],
            'Pages' => ['view' => 'View Pages', 'create' => 'Create Pages', 'edit' => 'Edit Pages', 'delete' => 'Delete Pages'],
            'Media' => ['view' => 'View Media', 'upload' => 'Upload Media', 'delete' => 'Delete Media'],
            'Users' => ['view' => 'View Users', 'create' => 'Create Users', 'edit' => 'Edit Users', 'delete' => 'Delete Users'],
            'Security' => ['view' => 'View Security Logs', 'configure' => 'Configure WAF'],
            'Settings' => ['view' => 'View Settings', 'update' => 'Update Settings'],
        ];

        /** @phpstan-ignore argument.type */
        return view('universal-panel::pages.permissions', compact('roles', 'modules'));
    }

    public function update(Request $request)
    {
        return redirect()->back()->with('success', 'Permissions updated successfully!');
    }
}
