<?php

namespace nikitakilpa\FileManager\Services\Impls;

use Illuminate\Support\Facades\Storage;
use nikitakilpa\FileManager\Dto\ExportDto;
use nikitakilpa\FileManager\Services\Interfaces\ExportInterface;

class ExportService implements ExportInterface
{
    protected ExportDto $config;

    public function setConfig(ExportDto $config)
    {
        $this->config = $config;
    }

    public function export(string $filepath, $dir_path, $export_path): bool
    {
        if ($filepath[0] != '/') $filepath = "/" . $filepath;
        if (!is_null($dir_path)) $this->config->dir_path = $dir_path;
        if (!is_null($export_path)) $this->config->export_path = $export_path;

        $upload_path = $this->config->dir_path . $filepath;
        $export_path = $this->config->export_path . $filepath;

        if (Storage::disk('local')->exists($export_path))
        {
            $file = Storage::disk('local')->get($export_path);

            Storage::disk($this->config->driver)->put($upload_path, $file);

            return true;
        }
        return false;
    }
}