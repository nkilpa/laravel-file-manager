<?php

namespace nikitakilpa\FileManager\Providers;

use Illuminate\Support\ServiceProvider;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use nikitakilpa\FileManager\Components\Impls\ExporterComponent;
use nikitakilpa\FileManager\Components\Impls\ImporterComponent;
use nikitakilpa\FileManager\Components\Interfaces\ExporterInterface;
use nikitakilpa\FileManager\Components\Interfaces\ImporterInterface;
use nikitakilpa\FileManager\Console\Commands\DownloadFileCommand;
use nikitakilpa\FileManager\Console\Commands\WriteDbCommand;
use nikitakilpa\FileManager\Console\Commands\ReadDbCommand;
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
                WriteDbCommand::class,
                ReadDbCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/../Config/storage.php' => config_path('storage.php'),
        ]);

        $this->loadRoutesFrom(__DIR__ . '/../Routes/routes.php');
    }
}
