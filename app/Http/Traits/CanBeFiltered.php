<?php
namespace App\Http\Traits;

use App\Filtering\Filtrer;
use Illuminate\Database\Eloquent\Builder;

trait CanBeFiltered{
    public function scopeWithFilters(Builder $builder, $scopes = [])
    {
        return (new Filtrer(request()))->apply($builder, $scopes);
    }
}