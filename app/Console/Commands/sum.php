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
    protected $description = 'calculate the sum of any array given';

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
       // $json= json_decode($this->argument('array'));
       // $res = array_sum($json);
     $array  = $this->argument("array");
        $res = self::get_sum ($array);
        $this->info($res);
    }
    public function get_sum($array) :int 
    {
        $sum=0;
        try{
    
             if(!is_array($array)){
                $array_cal = json_decode($array, true);
            } else{
                $array_cal = $array;
            }
            foreach ($array_cal as $item) {
                 $sum = $sum + (is_array($item) ? self::get_sum($item): $item);
             }

        }catch(\Exception $th){}
     return $sum;

    }

}
