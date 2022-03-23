<?php

namespace nikitakilpa\FileManager\Console\Commands;

use Illuminate\Console\Command;
use nikitakilpa\Core\Traits\MessageTrait;
use nikitakilpa\FileManager\Services\ProductsTableService;

class GetCsvFromDbCommand extends Command
{
    use MessageTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:import {name}';

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
        $name = $this->argument('name');

        $service = new ProductsTableService();
        $service->importFromDbToCsv($name);

        return 0;
    }
}
