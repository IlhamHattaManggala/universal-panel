<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeTenantCommand extends Command
{
    protected $signature = 'make:panel-tenant {name : The name of the tenant model}';

    protected $description = 'Create a new Universal Panel multi-tenancy configuration class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Tenant') ? $name : "{$name}Tenant";

        $directory = app_path('UniversalPanel/Tenants');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Tenant configuration {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Tenants;

class {$className}
{
    public static string \$model = 'App\\\\Models\\\\{$name}';

    public static string \$slugAttribute = 'slug';

    public static string \$nameAttribute = 'name';
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Tenant Config [app/UniversalPanel/Tenants/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
