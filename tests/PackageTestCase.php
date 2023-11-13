<?php

declare(strict_types=1);

namespace Tests;

use Davarch\SecurityHeaders\Generators\Basic;
use Davarch\SecurityHeaders\Providers\PackageServiceProvider;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class PackageTestCase extends TestCase
{
    /**
     * @param  Application  $app
     * @return array<int, class-string<ServiceProvider>>
     */
    protected function getPackageProviders($app): array
    {
        return [
            PackageServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        tap($app->make('config'), static function (Repository $config): void {
            $config->set('security-headers', [
                'enabled' => true,

                'generator' => Basic::class,

                'strict-transport-security' => [
                    'max-age' => 31536000,
                ],

                'certificate-transparency' => [
                    'max-age' => 30,
                    'report-uri' => '',
                ],
            ]);
        });
    }
}
