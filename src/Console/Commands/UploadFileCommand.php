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
    protected $signature = 'file:upload {filepath} {disk} {--D|dir_path=} {--E|export_path=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload csv file to remote server from local storage';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filepath = $this->argument('filepath');
        $disk = $this->argument('disk');

        $dir_path = $this->option('dir_path');
        $export_path = $this->option('export_path');

        $manager = new ExportManager();
        $manager->storage($disk)->export($filepath, $dir_path, $export_path);
    }
}
