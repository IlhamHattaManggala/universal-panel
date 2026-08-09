<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakePageCommand extends Command
{
    protected $signature = 'make:panel-page {name : The name of the custom admin page}';

    protected $description = 'Create a new Universal Panel custom page class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Page') ? $name : "{$name}Page";

        $directory = app_path('UniversalPanel/Pages');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Page {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Pages;

class {$className}
{
    public static string \$title = '{$name}';

    public static string \$slug = '{$className}';

    public static string \$icon = 'heroicon-o-document-text';

    public static function getNavigationGroup(): string
    {
        return 'SYSTEM';
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Custom Page [app/UniversalPanel/Pages/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
