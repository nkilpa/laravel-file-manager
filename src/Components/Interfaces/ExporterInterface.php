<?php

namespace nikitakilpa\FileManager\Components\Interfaces;

interface ExporterInterface
{
    public function export(string $filepath, $dir_path, $export_path);
}