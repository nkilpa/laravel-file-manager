<?php

namespace nikitakilpa\FileManager\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as BaseExel;
use nikitakilpa\Core\Controllers\BaseController;
use nikitakilpa\FileManager\Exports\ProductExport;
use nikitakilpa\FileManager\Imports\ProductImport;

class CsvController extends BaseController
{
    public function hello(): JsonResponse
    {
        return response()->json([
            'message' => 'hello, csv',
        ]);
    }

    /*public function export()
    {
        $result = Excel::download(new ProductExport(), 'products.csv');

        return response()->json([
            'status' => 'ok',
            'data' => $result
        ]);
    }*/

    public function import(): JsonResponse
    {

        $file = Storage::disk('sftp')->get('/home/n.kilpa/exports/products.csv');
        Storage::disk('local')->put('/files/products.csv', $file);

        return response()->json([
            'status' => 'ok',
            'data' => $file
        ]);
    }
}