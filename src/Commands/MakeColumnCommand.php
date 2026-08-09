<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeColumnCommand extends Command
{
    protected $signature = 'make:panel-column {name : The name of the custom table column}';

    protected $description = 'Create a new Universal Panel custom table column class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Column') ? $name : "{$name}Column";

        $directory = app_path('UniversalPanel/Columns');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Column {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Columns;

class {$className}
{
    protected string \$name;

    public function __construct(string \$name)
    {
        \$this->name = \$name;
    }

    public static function make(string \$name): static
    {
        return new static(\$name);
    }

    public function render(\$record): string
    {
        return (string) (\$record->{\$this->name} ?? '');
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Custom Column [app/UniversalPanel/Columns/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
