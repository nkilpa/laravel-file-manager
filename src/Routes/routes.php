<?php

use Illuminate\Support\Facades\Route;
use nikitakilpa\FileManager\Controllers\CsvController;

Route::prefix('csv')->group(function () {
    Route::get('/hello', [CsvController::class, 'hello']);

    Route::get('/import', [CsvController::class, 'import']);
    Route::get('/export', [CsvController::class, 'export']);
});
