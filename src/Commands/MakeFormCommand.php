<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeFormCommand extends Command
{
    protected $signature = 'make:panel-form {name : The name of the form schema class}';

    protected $description = 'Create a new Universal Panel form schema class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Form') ? $name : "{$name}Form";

        $directory = app_path('UniversalPanel/Forms');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Form {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Forms;

class {$className}
{
    public static function schema(): array
    {
        return [
            // Example Form Fields Schema
            'name' => [
                'type' => 'text',
                'label' => 'Full Name',
                'required' => true,
                'placeholder' => 'Enter name...',
            ],
            'email' => [
                'type' => 'email',
                'label' => 'Email Address',
                'required' => true,
            ],
            'role' => [
                'type' => 'select',
                'label' => 'User Role',
                'options' => [
                    'admin' => 'Super Admin',
                    'editor' => 'Editor',
                    'user' => 'Subscriber',
                ],
            ],
            'bio' => [
                'type' => 'textarea',
                'label' => 'Short Bio',
                'rows' => 4,
            ],
        ];
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Form Schema [app/UniversalPanel/Forms/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
