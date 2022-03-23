<?php

namespace nikitakilpa\FileManager\Components\Impls;

use nikitakilpa\FileManager\Components\Interfaces\ImporterInterface;
use nikitakilpa\FileManager\Dto\ImportDto;
use nikitakilpa\FileManager\Services\Interfaces\ImportInterface;

class ImporterComponent implements ImporterInterface
{
    private ImportInterface $importService;
    private ImportDto $config;

    public function __construct(ImportInterface $importService, ImportDto $config)
    {
        $this->importService = $importService;
        $this->config = $config;
    }

    public function import(string $filepath, $dir_path, $import_path): bool
    {
        $this->importService->setConfig($this->config);
        return $this->importService->import($filepath, $dir_path, $import_path);
    }
}