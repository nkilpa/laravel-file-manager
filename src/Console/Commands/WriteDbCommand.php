<?php

namespace nikitakilpa\FileManager\Console\Commands;

use Illuminate\Console\Command;
use nikitakilpa\Core\Traits\MessageTrait;
use nikitakilpa\FileManager\Services\ProductsTableService;

class WriteDbCommand extends Command
{
    Use MessageTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:write-db {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Put data from file to database.';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $filename = $this->argument('filename');

        $service = new ProductsTableService();
        $service->PutCsvToDb($filename);
    }
}
