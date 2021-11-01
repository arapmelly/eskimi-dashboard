<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class TestRedisConnection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:redis-connection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Redis connection';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        
        try{
            $redis = Redis::connection();
            $redis->ping();
            $this->info('successfully connected');
        } catch (\RedisException $e){
            $this->info($e->getMessage());
        }
    }
}
