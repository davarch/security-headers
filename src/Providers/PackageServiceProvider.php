<?php

declare(strict_types=1);

namespace Davarch\SecurityHeaders\Providers;

use Davarch\SecurityHeaders\Generators\Basic;
use Davarch\SecurityHeaders\Generators\Generator;
use Illuminate\Support\ServiceProvider;

final class PackageServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/security-headers.php' => config_path('security-headers.php'),
        ], 'config');

        $this->app->bind(Generator::class, Basic::class);
    }
}
