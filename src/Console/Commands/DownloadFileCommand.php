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
    protected $signature = 'file:download {filepath} {disk} {--D|dir_path=} {--I|import_path=}';

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
        $filepath = $this->argument('filepath');
        $disk = $this->argument('disk');

        $dir_path = $this->option('dir_path');
        $import_path = $this->option('import_path');

        $manager = new ImportManager();
        $manager->storage($disk)->import($filepath, $dir_path, $import_path);
    }
}
