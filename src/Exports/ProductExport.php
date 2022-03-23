<?php

namespace nikitakilpa\FileManager\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use nikitakilpa\FileManager\Models\Product;

class ProductExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'Номер',
            'Наименование',
            'Производитель',
            'Бренд',
            'Тип',
            'Категория',
            'Описание',
            'Количество',
            'Цена',
            'КемДобавлено',
            'Создано',
            'Обновлено',
        ];
    }

    public function collection()
    {
        return Product::all();
    }
}