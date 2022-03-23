<?php

namespace nikitakilpa\FileManager\Console\Commands;

use Illuminate\Console\Command;
use nikitakilpa\Core\Traits\MessageTrait;
use nikitakilpa\FileManager\Services\ProductsTableService;

class PutCsvInDbCommand extends Command
{
    Use MessageTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:export {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exports csv file from local storage to database.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filename = $this->argument('filename');

        $service = new ProductsTableService();
        $service->importFromCsvToDb($filename);

        return 0;
    }
}
