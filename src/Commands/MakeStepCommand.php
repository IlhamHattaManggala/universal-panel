<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeStepCommand extends Command
{
    protected $signature = 'make:panel-step {name : The name of the wizard step}';

    protected $description = 'Create a new Universal Panel multi-step form wizard step class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Step') ? $name : "{$name}Step";

        $directory = app_path('UniversalPanel/Steps');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Wizard Step {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Steps;

class {$className}
{
    public static string \$label = '{$name}';

    public function schema(): array
    {
        return [
            // Step form fields schema
        ];
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Wizard Step [app/UniversalPanel/Steps/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
