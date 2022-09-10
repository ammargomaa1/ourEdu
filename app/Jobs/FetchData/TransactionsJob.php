<?php

namespace App\Jobs\FetchData;

use App\Models\Transaction;
use App\Models\Transactions;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use JsonMachine\Items;

class TransactionsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $transactions = Items::fromFile(storage_path('app/public/transactions.json'), ['pointer' => '/transactions']);

        foreach ($transactions as $transaction) {
            Transaction::create([
                'paid_amount' => $transaction->paidAmount,
                'currency' => $transaction->Currency,
                'user_email' => $transaction->parentEmail ,
                'status' => $transaction->statusCode ,
                'payment_date' => $transaction->paymentDate ,
                'parent_identification' => $transaction->parentIdentification
            ]);
        }
    }
}
