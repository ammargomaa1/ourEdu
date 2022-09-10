<?php

namespace App\Http\Controllers;

use App\Filtering\Filters\TransactionCurrencyFilter;
use App\Filtering\Filters\TransactionFilter;
use App\Filtering\Filters\TransactionStatusFilter;
use App\Filtering\RangeFilters\TransactionAmountRangeFilter;
use App\Filtering\RangeFilters\TransactionDateRangeFilter;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('transactions')->withFilters($this->filters())->paginate(10);
        return UserResource::collection($users);
    }

    protected function filters()
    {

        return [
            'currency' => new TransactionCurrencyFilter(),
            'status' => new TransactionStatusFilter(),
            'amount' => new TransactionAmountRangeFilter(),
            'date' => new TransactionDateRangeFilter()
        ];
    }
}
