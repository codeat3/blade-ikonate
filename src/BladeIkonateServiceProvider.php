<?php

declare(strict_types=1);

namespace Codeat3\BladeIkonate;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeIkonateServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-ikonate', []);

            $factory->add('ikonate', array_merge(['path' => __DIR__ . '/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-ikonate.php', 'blade-ikonate');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/svg' => public_path('vendor/blade-ikonate'),
            ], 'blade-ik'); // TODO: update the alias to more readable `blade-ikonate` in the next major release

            $this->publishes([
                __DIR__ . '/../config/blade-ikonate.php' => $this->app->configPath('blade-ikonate.php'),
            ], 'blade-ikonate-config');
        }
    }
}
