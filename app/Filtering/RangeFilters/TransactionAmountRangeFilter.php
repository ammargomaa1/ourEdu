<?php
namespace App\Filtering\RangeFilters;

use App\Filtering\Contracts\FilterRange;
use Illuminate\Database\Eloquent\Builder;

class TransactionAmountRangeFilter implements FilterRange
{
    public function apply(Builder $builder, $stVal, $fiVal)
    {
        return $builder->whereHas('transactions', function ($builder) use ($stVal, $fiVal) {
            $builder->whereBetween('paid_amount', [$stVal, $fiVal]);    
        });

    }
}