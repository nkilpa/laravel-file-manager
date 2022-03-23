<?php

namespace nikitakilpa\FileManager\Components\Impls;

use nikitakilpa\FileManager\Components\Interfaces\ExporterInterface;
use nikitakilpa\FileManager\Dto\ExportDto;
use nikitakilpa\FileManager\Services\Interfaces\ExportInterface;

class ExporterComponent implements ExporterInterface
{
    private ExportInterface $exportService;
    private ExportDto $config;

    public function __construct(ExportInterface $exportService, ExportDto $config)
    {
        $this->exportService = $exportService;
        $this->config = $config;
    }

    public function export(string $filepath, $dir_path, $export_path): bool
    {
        $this->exportService->setConfig($this->config);
        return $this->exportService->export($filepath, $dir_path, $export_path);
    }
}