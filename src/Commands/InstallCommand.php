<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'universal-panel:install';

    protected $description = 'Install and publish all Universal Panel resources and assets';

    public function handle(): int
    {
        $this->info('Installing Universal Panel...');

        $this->call('vendor:publish', [
            '--tag' => 'universal-panel-config',
            '--force' => true,
        ]);

        $this->call('vendor:publish', [
            '--tag' => 'universal-panel-views',
            '--force' => true,
        ]);

        $this->info('Universal Panel installed successfully!');
        $this->comment('Visit /admin to view your dashboard.');

        return self::SUCCESS;
    }
}
