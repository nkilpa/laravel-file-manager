<?php

namespace nikitakilpa\FileManager\Repository\Impls;

use Illuminate\Support\Collection;
use nikitakilpa\FileManager\Models\Product;
use nikitakilpa\FileManager\Repository\Interfaces\StorageRepositoryInterface;

class ProductStorageRepository implements StorageRepositoryInterface
{
    public function getAllModelsCsv(mixed $model): Collection
    {
        //TODO
    }
}