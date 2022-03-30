<?php

namespace nikitakilpa\FileManager\Console\Commands;

use Illuminate\Console\Command;
use nikitakilpa\FileManager\Helpers\ExportManager;

class UploadFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:upload {filename} {storage} {--D|dir_path=} {--P|export_path=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload csv file to remote server from local storage';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = $this->argument('filename');
        $storage = $this->argument('storage');

        $dir_path = $this->option('dir_path');
        $export_path = $this->option('export_path');

        $manager = new ExportManager();
        $manager->storage($storage)->export($filename, $dir_path, $export_path);
    }
}
