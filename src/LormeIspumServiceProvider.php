<?php

namespace Technopek\LormeIspum;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Technopek\LormeIspum\Commands\LormeIspumCommand;

class LormeIspumServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('lorme-ispum')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_lorme_ispum_table')
            ->hasCommand(LormeIspumCommand::class);
    }
}
