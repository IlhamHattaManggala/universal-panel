<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeResourceCommand extends Command
{
    protected $signature = 'make:panel-resource {name : The name of the resource model}';

    protected $description = 'Create a new Universal Panel resource class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = "{$name}Resource";

        $directory = app_path('UniversalPanel/Resources');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Resource {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Resources;

class {$className}
{
    public static string \$model = 'App\\\\Models\\\\{$name}';

    public static string \$label = '{$name}';

    public static string \$icon = 'heroicon-o-collection';

    public static function getNavigationGroup(): string
    {
        return 'CONTENT';
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Resource [app/UniversalPanel/Resources/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
