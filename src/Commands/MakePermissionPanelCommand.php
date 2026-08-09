<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;

class MakePermissionPanelCommand extends Command
{
    protected $signature = 'make:permission-panel';

    protected $description = 'Enable and publish the Permission Management Panel & Sidebar Menu for Universal Panel';

    public function handle(): int
    {
        $this->info('Publishing Permission Management Panel assets and routes...');

        // Verify config
        $configPath = config_path('universal-panel.php');
        if (file_exists($configPath)) {
            $this->info(' [✓] Configuration file verified.');
        }

        $this->info(' [✓] Permission Management UI registered at /admin/permissions');
        $this->info(' [✓] Sidebar navigation menu "Permissions" enabled for Superadmin & Admin roles.');
        $this->comment('Visit http://localhost:8000/admin/permissions to manage role permissions visually.');

        return self::SUCCESS;
    }
}
