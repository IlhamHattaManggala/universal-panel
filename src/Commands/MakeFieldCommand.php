<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeFieldCommand extends Command
{
    protected $signature = 'make:panel-field {name : The name of the custom field component}';

    protected $description = 'Create a new Universal Panel custom form field component';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Field') ? $name : "{$name}Field";

        $directory = app_path('UniversalPanel/Fields');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Custom Field {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Fields;

class {$className}
{
    protected string \$name;

    protected string \$label;

    protected bool \$required = false;

    public function __construct(string \$name)
    {
        \$this->name = \$name;
        \$this->label = (string) Str::of(\$name)->headline();
    }

    public static function make(string \$name): static
    {
        return new static(\$name);
    }

    public function required(bool \$condition = true): static
    {
        \$this->required = \$condition;
        return \$this;
    }

    public function render(): array
    {
        return [
            'name' => \$this->name,
            'label' => \$this->label,
            'required' => \$this->required,
            'component' => '{$className}',
        ];
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Custom Field [app/UniversalPanel/Fields/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
