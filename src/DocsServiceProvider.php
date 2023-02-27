<?php

namespace Julio\Docs\Src;

use Illuminate\Support\ServiceProvider;
use Julio\Docs\Console\{
    GeneratePatchNoteCommand,
    GenerateRouteCommand,
};

class DocsServiceProvider extends ServiceProvider
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

            $resourcesPath . '/views/docs.blade.php' => base_path('resources/views/api-docs') . '/docs.blade.php',
            $resourcesPath . '/components' => base_path('resources/views/components'),

            $resourcesPath . '/docs' => public_path('docs'),
        ]);

        $this->commands([
            GenerateRouteCommand::class,
            GeneratePatchNoteCommand::class,
        ]);
    }
}
