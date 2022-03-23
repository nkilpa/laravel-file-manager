<?php

namespace nikitakilpa\FileManager\Providers;

use Illuminate\Support\ServiceProvider;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use nikitakilpa\FileManager\Components\Impls\ExporterComponent;
use nikitakilpa\FileManager\Components\Impls\ImporterComponent;
use nikitakilpa\FileManager\Components\Interfaces\ExporterInterface;
use nikitakilpa\FileManager\Components\Interfaces\ImporterInterface;
use nikitakilpa\FileManager\Console\Commands\DownloadFileCommand;
use nikitakilpa\FileManager\Console\Commands\PutCsvInDbCommand;
use nikitakilpa\FileManager\Console\Commands\GetCsvFromDbCommand;
use nikitakilpa\FileManager\Console\Commands\UploadFileCommand;

class FileManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        HeadingRowFormatter::default('none');

        $this->app->bind(ImporterInterface::class, ImporterComponent::class);
        $this->app->bind(ExporterInterface::class, ExporterComponent::class);
    }

    public function boot()
    {
        if ($this->app->runningInConsole())
        {
            $this->commands([
                DownloadFileCommand::class,
                UploadFileCommand::class,
                PutCsvInDbCommand::class,
                GetCsvFromDbCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/../Config/excel.php' => config_path('excel.php'),
        ]);

        $this->loadRoutesFrom(__DIR__ . '/../Routes/routes.php');
    }
}
