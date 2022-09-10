<?php

namespace App\Console\Commands\FetchData;

use App\Jobs\FetchData\UsersJob;
use Illuminate\Console\Command;

class UsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $a = new UsersJob;
        $a->handle();
    }
}
