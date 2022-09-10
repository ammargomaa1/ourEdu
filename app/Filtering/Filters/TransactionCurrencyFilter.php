<?php
namespace App\Filtering\Filters;

use App\Filtering\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;


class TransactionCurrencyFilter implements Filter
{
    public function apply(Builder $builder, $value)
    {
        return $builder->whereHas('transactions', function ($builder) use ($value) {
            $builder->where('currency', $value);
        });
    }
}