<?php

namespace nikitakilpa\FileManager\Services\Interfaces;

use nikitakilpa\FileManager\Dto\ImportDto;

interface ImportInterface
{
    public function setConfig(ImportDto $config);
    public function import(string $filepath, $dir_path, $import_path): bool;
}