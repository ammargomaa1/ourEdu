<?php

namespace App\Filtering\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface FilterRange
{
    public function apply(Builder $builder, $stVal,$fiVal);
}
