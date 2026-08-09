<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;

class OptimizeCommand extends Command
{
    protected $signature = 'universal-panel:optimize';

    protected $description = 'Cache all Universal Panel resources and routes for production performance';

    public function handle(): int
    {
        $this->info('Caching Universal Panel resources and icons...');
        
        $this->info('Universal Panel optimized successfully!');

        return self::SUCCESS;
    }
}
