<?php

namespace nikitakilpa\FileManager\Factories;

use nikitakilpa\Core\Factories\DtoFactory;
use nikitakilpa\FileManager\Dto\ImportDto;

class ImportConfigFactory
{
    public static function getConfig(string $driver_name)
    {
        $storage = config('storage.imports.'. $driver_name);
        return DtoFactory::createDtoFromArray($storage, ImportDto::class);
    }
}