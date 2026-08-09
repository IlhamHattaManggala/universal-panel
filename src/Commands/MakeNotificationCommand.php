<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeNotificationCommand extends Command
{
    protected $signature = 'make:panel-notification {name : The name of the notification}';

    protected $description = 'Create a new Universal Panel topbar notification class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Notification') ? $name : "{$name}Notification";

        $directory = app_path('UniversalPanel/Notifications');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Notification {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Notifications;

class {$className}
{
    public static string \$title = '{$name}';

    public static string \$type = 'info';

    public function getBody(): string
    {
        return 'System notification message details.';
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Topbar Notification [app/UniversalPanel/Notifications/{$className}.php] created successfully.");

        return self::SUCCESS;
    }
}
