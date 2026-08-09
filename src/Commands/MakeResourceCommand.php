<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeResourceCommand extends Command
{
    protected $signature = 'make:panel-resource {name : The name of the resource model} {--g|generate : Generate corresponding Eloquent Model and Migration automatically} {--m|migration : Create a new migration file for the model} {--model : Create a new Eloquent model}';

    protected $description = 'Create a new Universal Panel resource class with optional Model & Migration generation';

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

        // Handle --generate, --migration, --model options
        $shouldGenerate = $this->option('generate') || $this->option('migration') || $this->option('model');

        if ($shouldGenerate) {
            $modelPath = app_path("Models/{$name}.php");
            if (! $this->files->exists($modelPath)) {
                $this->call('make:model', [
                    'name' => $name,
                    '--migration' => true,
                ]);
                $this->info(" [✓] Model [App\\Models\\{$name}] and Migration created.");
            }
        }

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

use Manggala\UniversalPanel\Resources\Resource;

class {$className} extends Resource
{
    public static ?string \$model = 'App\\\\Models\\\\{$name}';

    public static ?string \$label = '{$name}';

    public static ?string \$icon = 'heroicon-o-collection';

    public static ?string \$navigationGroup = 'CONTENT';

    public static function table(): array
    {
        return [
            // Define table columns here
        ];
    }

    public static function form(): array
    {
        return [
            // Define form fields here
        ];
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info(" [✓] Resource [app/UniversalPanel/Resources/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
