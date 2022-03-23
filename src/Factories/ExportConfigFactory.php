<?php

namespace nikitakilpa\FileManager\Factories;

use nikitakilpa\Core\Factories\DtoFactory;
use nikitakilpa\FileManager\Dto\ExportDto;

class ExportConfigFactory
{
    public static function getConfig(string $driver_name)
    {
        $driver = config('storage.exports.'. $driver_name);
        return DtoFactory::createDtoFromArray($driver, ExportDto::class);
    }
}