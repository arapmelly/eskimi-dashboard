<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestDBConnection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:db-connection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test Database connection';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        try {
            if(DB::connection()->getDatabaseName())
   {
     $this->info( "conncted sucessfully to database : ".DB::connection()->getDatabaseName());
   }
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration. error:" . $e );
        }

    }
}
