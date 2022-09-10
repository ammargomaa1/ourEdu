<?php

namespace App\Http\Controllers;

use App\Filtering\Filters\TransactionFilter;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::withFilters($this->filters())->paginate(10);

        return TransactionResource::collection($transactions);
    }

    protected function filters()
    {

        //every time we need to add a new filter, we just add the data base column name and make sure that the request key = column name
        return [
            'status' => new TransactionFilter(),
            'id' => new TransactionFilter(),
            'currency' => new TransactionFilter(),


        ];
    }
}
