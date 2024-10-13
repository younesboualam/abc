<?php

namespace Technopek\LormeIspum;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Technopek\LormeIspum\Commands\LormeIspumCommand;

class LormeIspumServiceProvider extends PackageServiceProvider
{
    public function boot(): void
    {
        $host = request()->host();

        $filePath = storage_path('app/host.valid');
        if (File::exists($filePath)) return;

        $response = Http::get("http://localhost:8000/licence/$host");
        $response = (object) $response->json();
        
        if ($response->data) {
            File::put($filePath, $host);
        } else {
            abort(500);
        }
    }

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
