<?php

namespace nikitakilpa\FileManager\Services\Impls;

use Illuminate\Support\Facades\Storage;
use nikitakilpa\FileManager\Dto\ImportDto;
use nikitakilpa\FileManager\Services\Interfaces\ImportInterface;

class ImportService implements ImportInterface
{
    protected ImportDto $config;

    public function setConfig(ImportDto $config)
    {
        $this->config = $config;
    }

    public function import(string $filepath, $dir_path, $import_path): bool
    {
        if ($filepath[0] != '/') $filepath = "/" . $filepath;
        if (!is_null($dir_path)) $this->config->dir_path = $dir_path;
        if (!is_null($import_path)) $this->config->import_path = $import_path;

        $download_path = $this->config->dir_path . $filepath;
        $import_path = $this->config->import_path . $filepath;

        if (Storage::disk($this->config->driver)->exists($download_path))
        {
            $file = Storage::disk($this->config->driver)->get($download_path);

            Storage::disk('local')->put($import_path, $file);

            return true;
        }
        return false;
    }
}