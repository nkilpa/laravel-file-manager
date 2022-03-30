<?php

namespace nikitakilpa\FileManager\Services;

use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use nikitakilpa\FileManager\Exports\ProductExport;
use nikitakilpa\FileManager\Imports\ProductImport;

class ProductsTableService
{
    public function PutCsvToDb(string $filepath, string $disk = 'local'): bool
    {
        if (Storage::disk($disk)->exists($filepath))
        {
            Excel::import(new ProductImport(), $filepath, $disk);
            return true;
        }
        return false;
    }

    public function GetCsvFromDb(string $filepath, string $disk = 'local'): bool
    {
        Excel::store(new ProductExport(), $filepath, $disk);
        return true;
    }
}