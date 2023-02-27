<?php

namespace Julio\Docs\Src;

use Illuminate\Support\ServiceProvider;
use Julio\Docs\Src\Console\{
    GeneratePatchNoteCommand,
    GenerateRouteCommand,
};

class EleganServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config';
        $resourcesPath = __DIR__ . '/../resources';

        $this->publishes([
            $configPath => config_path(),
            $resourcesPath . '/views/index.blade.php' => config('l5-swagger.defaults.paths.views') . '/index.blade.php',

            $resourcesPath . '/views/form.blade.php' => base_path('resources/views/elegan') . '/docs.blade.php',
            $resourcesPath . '/components' => base_path('resources/views/components'),

            $resourcesPath . '/publish' => public_path('elegan'),
        ]);

        $this->commands([
            GeneratePatchNoteCommand::class,
            GenerateRouteCommand::class,
        ]);
    }
}
