<?php

namespace nikitakilpa\FileManager\Console\Commands;

use Illuminate\Console\Command;
use nikitakilpa\FileManager\Helpers\ImportManager;

class DownloadFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:download {filename} {storage} {--D|dir_path=} {--P|import_path=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download csv file from another storage to local storage';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $filename = $this->argument('filename');
        $storage = $this->argument('storage');

        $dir_path = $this->option('dir_path');
        $import_path = $this->option('import_path');

        $manager = new ImportManager();
        $manager->storage($storage)->import($filename, $dir_path, $import_path);
    }
}
