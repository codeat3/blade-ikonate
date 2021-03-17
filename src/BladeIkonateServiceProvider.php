<?php

declare(strict_types=1);

namespace Codeat3\BladeIkonate;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

final class BladeIkonateServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('ikonate', [
                'path' => __DIR__.'/../resources/svg',
                'prefix' => 'ik',
            ]);
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-ik'),
            ], 'blade-ik');
        }
    }
}
