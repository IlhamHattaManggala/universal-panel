<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeThemeCommand extends Command
{
    protected $signature = 'make:panel-theme {name : The name of the custom theme}';

    protected $description = 'Create a new Universal Panel theme CSS customization file';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::kebab($this->argument('name'));
        $fileName = "universal-panel-theme-{$name}.css";

        $directory = resource_path('css/vendor/universal-panel');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$fileName}";

        if ($this->files->exists($path)) {
            $this->error("Theme file {$fileName} already exists!");
            return self::FAILURE;
        }

        $stub = <<<CSS
/* Custom Universal Panel Theme: {$name} */
:root {
    --panel-primary-color: #2271b1;
    --panel-sidebar-bg-dark: #1d2327;
    --panel-sidebar-bg-light: #ffffff;
    --panel-topbar-height: 2.75rem;
    --panel-sidebar-width-expanded: 160px;
    --panel-sidebar-width-collapsed: 52px;
}
CSS;

        $this->files->put($path, $stub);

        $this->info("Custom Theme CSS [resources/css/vendor/universal-panel/{$fileName}] created successfully.");

        return self::SUCCESS;
    }
}
