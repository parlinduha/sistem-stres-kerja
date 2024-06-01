<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunPythonScript extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-python-script';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pythonScriptPath = base_path('python/main.py');
        exec("python $pythonScriptPath", $output, $returnCode);

        // Cek jika skrip dijalankan dengan sukses atau tidak
        if ($returnCode === 0) {
            $this->info("Python script executed successfully");
        } else {
            $this->error("Failed to execute Python script");
        }
    }
}
