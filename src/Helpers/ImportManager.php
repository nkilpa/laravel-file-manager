<?php

namespace nikitakilpa\FileManager\Helpers;

use Illuminate\Support\Facades\App;
use nikitakilpa\FileManager\Components\Interfaces\ImporterInterface;
use nikitakilpa\FileManager\Factories\ImportConfigFactory;

class ImportManager
{
    public function storage($storage_name): mixed
    {
        $config = ImportConfigFactory::getConfig($storage_name);
        if ($config)
        {
            return app()->makeWith(ImporterInterface::class, [
                'importService' => App::make($config->service_class),
                'config' => $config
            ]);
        }
        return false;
    }
}