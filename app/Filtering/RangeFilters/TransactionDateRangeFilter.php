<?php
namespace App\Filtering\RangeFilters;

use App\Filtering\Contracts\FilterRange;
use Illuminate\Database\Eloquent\Builder;


class TransactionDateRangeFilter implements FilterRange
{
    public function apply(Builder $builder, $stVal, $fiVal)
    {
        return $builder->whereHas('transactions', function ($builder) use ($stVal, $fiVal) {
            $builder->whereBetween('payment_date', [$stVal, $fiVal]);
        });
    }
}