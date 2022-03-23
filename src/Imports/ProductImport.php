<?php

namespace nikitakilpa\FileManager\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use nikitakilpa\FileManager\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements WithHeadingRow, ToModel
{
    public function model(array $row)
    {
        return new Product([
            'number' => $row['Номер'],
            'title' => $row['Наименование'],
            'manufacturer' => $row['Производитель'],
            'brand' => $row['Бренд'],
            'type' => $row['Тип'],
            'category' => $row['Категория'],
            'description' => $row['Описание'],
            'count' => $row['Количество'],
            'price' => $row['Цена'],
            'addedBy' => $row['КемДобавлено'],
            'created_at' => $row['Создано'],
            'updated_at' => $row['Обновлено'],
        ]);
    }
}
