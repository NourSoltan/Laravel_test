<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class sum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:run:sum{array}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sum array';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $json= json_decode($this->argument('array'));
        $res = array_sum($json);
        $this->info($res);
    }
}
