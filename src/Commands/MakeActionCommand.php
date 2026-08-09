<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeActionCommand extends Command
{
    protected $signature = 'make:panel-action {name : The name of the custom action}';

    protected $description = 'Create a new Universal Panel custom table or header action class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Action') ? $name : "{$name}Action";

        $directory = app_path('UniversalPanel/Actions');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Action {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Actions;

class {$className}
{
    public static string \$name = '{$name}';

    public static string \$label = '{$name}';

    public static string \$icon = 'heroicon-o-lightning-bolt';

    public function handle(\$record): void
    {
        // Custom action execution logic
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Custom Action [app/UniversalPanel/Actions/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
