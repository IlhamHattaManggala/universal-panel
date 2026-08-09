<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakePanelCommand extends Command
{
    protected $signature = 'make:panel-command {name : The name of the panel artisan command}';

    protected $description = 'Create a new Universal Panel panel-scoped background command';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Command') ? $name : "{$name}Command";
        $signatureName = Str::kebab($name);

        $directory = app_path('UniversalPanel/Commands');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Command {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Commands;

use Illuminate\Console\Command;

class {$className} extends Command
{
    protected \$signature = 'panel:{$signatureName}';

    protected \$description = 'Panel-scoped command for {$name}';

    public function handle(): int
    {
        \$this->info('Panel command executed successfully!');
        return self::SUCCESS;
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Panel Command [app/UniversalPanel/Commands/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
