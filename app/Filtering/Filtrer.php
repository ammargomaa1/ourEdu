<?php
namespace App\Filtering;

use App\Filtering\Contracts\Filter;
use App\Filtering\Contracts\FilterRange;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class Filtrer{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder, array $scopes)
    {

        foreach ($this->limitScopes($scopes) as $key => $scope) {
            if ($scope instanceof Filter ) {
                $scope->apply($builder,$this->request->get($key));
            }elseif($scope instanceof FilterRange) {
                $scope->apply($builder, $this->request->get('start_'.$key),$this->request->get('end_'.$key));
            }
        }

        return $builder;
    }

    protected function limitScopes(array $scopes)
    {
        return Arr::only($scopes, array_keys($this->request->all()));
    }
}