<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeExporterCommand extends Command
{
    protected $signature = 'make:panel-exporter {name : The name of the resource model to export}';

    protected $description = 'Create a new Universal Panel exporter class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Exporter') ? $name : "{$name}Exporter";

        $directory = app_path('UniversalPanel/Exporters');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Exporter {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Exporters;

class {$className}
{
    public static string \$model = 'App\\\\Models\\\\{$name}';

    public function getColumns(): array
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
        ];
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Exporter [app/UniversalPanel/Exporters/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
