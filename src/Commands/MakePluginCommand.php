<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakePluginCommand extends Command
{
    protected $signature = 'make:panel-plugin {name : The name of the panel plugin}';

    protected $description = 'Create a new Universal Panel add-on plugin class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Plugin') ? $name : "{$name}Plugin";

        $directory = app_path('UniversalPanel/Plugins');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Plugin {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Plugins;

class {$className}
{
    public static string \$id = '{$name}';

    public function register(): void
    {
        // Plugin registration logic
    }

    public function boot(): void
    {
        // Plugin boot logic
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Plugin [app/UniversalPanel/Plugins/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
