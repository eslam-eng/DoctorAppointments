<?php

namespace App\Services;

use App\Models\Branch;
use App\Models\Location;
use App\QueryFilters\BranchesFilter;
use App\QueryFilters\LocationsFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BranchesService extends BaseService
{

    public $model;

    public function __construct(Branch $model)
    {
        $this->model = $model;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getQuery(?array $filters = [],?array $relations = []): ?Builder
    {
        return parent::getQuery($filters)->with($relations)
            ->when(! empty($filters), function (Builder $builder) use ($filters) {
                return $builder->filter(new BranchesFilter($filters));
            });
    }


    public function datatable(array $filters = []): ?Builder
    {
        return $this->getQuery($filters)->with('city');
    }

    public function all($filters): array|\Illuminate\Database\Eloquent\Collection
    {
        return $this->getQuery($filters)->get();
    }

    public function paginate(array $filters = []): \Illuminate\Contracts\Pagination\Paginator
    {
        return $this->getQuery($filters)->simplePaginate(perPage: 10);
    }


    public function store(array $data = [])
    {
        return $this->getQuery()->create($data);
    }

    public function update(Branch $branch , array $data = []): bool
    {
        return $branch->update($data);
    }

    public function delete(Branch $branch): ?bool
    {
        return $branch->delete();
    }

}
