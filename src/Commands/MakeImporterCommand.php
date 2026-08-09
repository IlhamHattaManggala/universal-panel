<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeImporterCommand extends Command
{
    protected $signature = 'make:panel-importer {name : The name of the resource model to import}';

    protected $description = 'Create a new Universal Panel importer class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Importer') ? $name : "{$name}Importer";

        $directory = app_path('UniversalPanel/Importers');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Importer {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Importers;

class {$className}
{
    public static string \$model = 'App\\\\Models\\\\{$name}';

    public function resolveRecord(array \$row)
    {
        return new (static::\$model)(\$row);
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Importer [app/UniversalPanel/Importers/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
