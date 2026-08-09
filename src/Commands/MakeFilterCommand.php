<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeFilterCommand extends Command
{
    protected $signature = 'make:panel-filter {name : The name of the custom table filter}';

    protected $description = 'Create a new Universal Panel custom table filter class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Filter') ? $name : "{$name}Filter";

        $directory = app_path('UniversalPanel/Filters');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Filter {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Filters;

use Illuminate\Database\Eloquent\Builder;

class {$className}
{
    public static string \$name = '{$name}';

    public static string \$label = '{$name}';

    public function apply(Builder \$query, \$value): Builder
    {
        return \$query;
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Custom Filter [app/UniversalPanel/Filters/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
