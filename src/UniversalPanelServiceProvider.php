<?php

namespace Manggala\UniversalPanel;

use Illuminate\Support\ServiceProvider;
use Manggala\UniversalPanel\Commands\ClearCacheCommand;
use Manggala\UniversalPanel\Commands\DoctorCommand;
use Manggala\UniversalPanel\Commands\InstallCommand;
use Manggala\UniversalPanel\Commands\MakeActionCommand;
use Manggala\UniversalPanel\Commands\MakeClusterCommand;
use Manggala\UniversalPanel\Commands\MakeColumnCommand;
use Manggala\UniversalPanel\Commands\MakeExporterCommand;
use Manggala\UniversalPanel\Commands\MakeFieldCommand;
use Manggala\UniversalPanel\Commands\MakeFilterCommand;
use Manggala\UniversalPanel\Commands\MakeFormCommand;
use Manggala\UniversalPanel\Commands\MakeImporterCommand;
use Manggala\UniversalPanel\Commands\MakeNotificationCommand;
use Manggala\UniversalPanel\Commands\MakePageCommand;
use Manggala\UniversalPanel\Commands\MakePanelCommand;
use Manggala\UniversalPanel\Commands\MakePluginCommand;
use Manggala\UniversalPanel\Commands\MakePolicyCommand;
use Manggala\UniversalPanel\Commands\MakeRelationManagerCommand;
use Manggala\UniversalPanel\Commands\MakeResourceCommand;
use Manggala\UniversalPanel\Commands\MakeSettingCommand;
use Manggala\UniversalPanel\Commands\MakeStepCommand;
use Manggala\UniversalPanel\Commands\MakeTenantCommand;
use Manggala\UniversalPanel\Commands\MakeThemeCommand;
use Manggala\UniversalPanel\Commands\MakeUserCommand;
use Manggala\UniversalPanel\Commands\MakeWidgetCommand;
use Manggala\UniversalPanel\Commands\OptimizeCommand;

class UniversalPanelServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/universal-panel.php', 'universal-panel');

        $this->app->singleton('universal-panel', function () {
            return new PanelManager();
        });
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'universal-panel');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                DoctorCommand::class,
                MakeResourceCommand::class,
                MakeFormCommand::class,
                MakeFieldCommand::class,
                MakeActionCommand::class,
                MakeFilterCommand::class,
                MakeColumnCommand::class,
                MakePageCommand::class,
                MakeWidgetCommand::class,
                MakeRelationManagerCommand::class,
                MakePolicyCommand::class,
                MakeThemeCommand::class,
                MakeExporterCommand::class,
                MakeImporterCommand::class,
                MakeClusterCommand::class,
                MakePluginCommand::class,
                MakeTenantCommand::class,
                MakeNotificationCommand::class,
                MakeStepCommand::class,
                MakeSettingCommand::class,
                MakePanelCommand::class,
                MakeUserCommand::class,
                OptimizeCommand::class,
                ClearCacheCommand::class,
            ]);

            $this->publishes([
                __DIR__ . '/../config/universal-panel.php' => config_path('universal-panel.php'),
            ], 'universal-panel-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/universal-panel'),
            ], 'universal-panel-views');
        }
    }
}
