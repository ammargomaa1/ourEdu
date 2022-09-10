<?php

namespace App\Console\Commands\FetchData;

use App\Jobs\FetchData\TransactionsJob;
use Illuminate\Console\Command;

class TransactionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:transactions';

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
        $a = new TransactionsJob;
        $a->handle();
    }
}
