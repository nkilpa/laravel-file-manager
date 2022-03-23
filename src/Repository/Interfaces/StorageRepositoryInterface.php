<?php

namespace nikitakilpa\FileManager\Repository\Interfaces;

use Illuminate\Support\Collection;

interface StorageRepositoryInterface
{
    public function getAllModelsCsv(mixed $model): Collection;
}