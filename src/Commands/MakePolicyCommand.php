<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakePolicyCommand extends Command
{
    protected $signature = 'make:panel-policy {name : The name of the model to generate a policy for}';

    protected $description = 'Create a new Universal Panel authorization policy class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Policy') ? $name : "{$name}Policy";

        $directory = app_path('Policies');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Policy {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\Policies;

use App\Models\\{$name};
use App\Models\User;

class {$className}
{
    public function viewAny(User \$user): bool
    {
        return true;
    }

    public function view(User \$user, {$name} \$model): bool
    {
        return true;
    }

    public function create(User \$user): bool
    {
        return true;
    }

    public function update(User \$user, {$name} \$model): bool
    {
        return true;
    }

    public function delete(User \$user, {$name} \$model): bool
    {
        return true;
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Policy [app/Policies/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
