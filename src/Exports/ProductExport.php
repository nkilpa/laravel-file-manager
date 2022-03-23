<?php

namespace nikitakilpa\FileManager\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use nikitakilpa\FileManager\Models\Product;

class ProductExport implements FromCollection
{
    public function collection()
    {
        return Product::all();
    }
}