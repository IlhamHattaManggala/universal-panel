<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeClusterCommand extends Command
{
    protected $signature = 'make:panel-cluster {name : The name of the resource cluster}';

    protected $description = 'Create a new Universal Panel cluster class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Cluster') ? $name : "{$name}Cluster";

        $directory = app_path('UniversalPanel/Clusters');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Cluster {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Clusters;

class {$className}
{
    public static string \$title = '{$name}';

    public static string \$slug = '{$name}';

    public static string \$icon = 'heroicon-o-squares-2x2';
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Cluster [app/UniversalPanel/Clusters/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
