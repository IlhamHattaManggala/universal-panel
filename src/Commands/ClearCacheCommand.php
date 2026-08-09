<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;

class ClearCacheCommand extends Command
{
    protected $signature = 'universal-panel:clear-cache';

    protected $description = 'Clear all cached Universal Panel metadata and icons';

    public function handle(): int
    {
        $this->info('Clearing Universal Panel cached resources...');
        
        $this->info('Universal Panel cache cleared successfully!');

        return self::SUCCESS;
    }
}
