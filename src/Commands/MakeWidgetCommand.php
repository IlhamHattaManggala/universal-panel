<?php

namespace Manggala\UniversalPanel\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeWidgetCommand extends Command
{
    protected $signature = 'make:panel-widget {name : The name of the widget} {--stats : Create a Stats Widget} {--chart : Create a Chart Widget}';

    protected $description = 'Create a new Universal Panel dashboard widget class';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $name = Str::studly($this->argument('name'));
        $className = Str::endsWith($name, 'Widget') ? $name : "{$name}Widget";
        $type = $this->option('chart') ? 'chart' : 'stats';

        $directory = app_path('UniversalPanel/Widgets');
        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }

        $path = "{$directory}/{$className}.php";

        if ($this->files->exists($path)) {
            $this->error("Widget {$className} already exists!");
            return self::FAILURE;
        }

        $stub = <<<PHP
<?php

namespace App\UniversalPanel\Widgets;

class {$className}
{
    public static string \$type = '{$type}';

    public static int \$sort = 1;

    public function getData(): array
    {
        return [
            'title' => '{$name}',
            'value' => '1,234',
            'change' => '+12.5%',
            'trend' => 'up',
        ];
    }
}
PHP;

        $this->files->put($path, $stub);

        $this->info("Widget [app/UniversalPanel/Widgets/{$className}.php] ({$type}) created successfully.");

        return self::SUCCESS;
    }
}
