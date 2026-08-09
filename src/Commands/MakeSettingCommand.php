<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeSettingCommand extends Command
{
    protected $signature = 'make:panel-setting {name : The name of the settings page}';

    protected $description = 'Create a new Universal Panel dedicated settings page class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Setting') ? $name : "{$name}Setting";

        $directory = app_path('UniversalPanel/Settings');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Settings Page {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Settings;

class {$className}
{
    public static string \$title = '{$name} Settings';

    public static string \$group = 'SYSTEM';

    public function schema(): array
    {
        return [
            // Settings form schema
        ];
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Settings Page [app/UniversalPanel/Settings/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
