<?php

namespace nikitakilpa\FileManager\Services\Interfaces;

use nikitakilpa\FileManager\Dto\ExportDto;

interface ExportInterface
{
    public function setConfig(ExportDto $config);
    public function export(string $filepath, $dir_path, $export_path): bool;
}