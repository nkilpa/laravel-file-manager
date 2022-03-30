<?php

namespace nikitakilpa\FileManager\Console\Commands;

use Illuminate\Console\Command;
use nikitakilpa\Core\Traits\MessageTrait;
use nikitakilpa\FileManager\Services\ProductsTableService;

class ReadDbCommand extends Command
{
    use MessageTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:read-db {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from database to file.';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $filename = $this->argument('filename');

        $service = new ProductsTableService();
        $service->GetCsvFromDb($filename);
    }
}
