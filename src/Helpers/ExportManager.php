<?php

namespace nikitakilpa\FileManager\Helpers;

use Illuminate\Support\Facades\App;
use nikitakilpa\FileManager\Components\Interfaces\ExporterInterface;
use nikitakilpa\FileManager\Factories\ExportConfigFactory;

class ExportManager
{
    public function storage($storage_name): mixed
    {
        $config = ExportConfigFactory::getConfig($storage_name);
        if ($config)
        {
            return app()->makeWith(ExporterInterface::class, [
                'exportService' => App::make($config->service_class),
                'config' => $config
            ]);
        }
        return false;
    }
}