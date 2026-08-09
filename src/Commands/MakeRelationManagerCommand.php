<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeRelationManagerCommand extends Command
{
    protected $signature = 'make:panel-relation-manager {name : The name of the relation manager}';

    protected $description = 'Create a new Universal Panel relation manager class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'RelationManager') ? $name : "{$name}RelationManager";

        $directory = app_path('UniversalPanel/RelationManagers');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("RelationManager {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\RelationManagers;

class {$className}
{
    public static string \$relationship = 'comments';

    public static string \$recordTitleAttribute = 'content';
}
PHP;

        $this->files->put($path, $stub);

        $this->info("RelationManager [app/UniversalPanel/RelationManagers/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
