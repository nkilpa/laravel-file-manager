<?php

namespace nikitakilpa\FileManager\Components\Interfaces;

interface ImporterInterface
{
    public function import(string $filepath, $dir_path, $import_path);
}