<?php

namespace App\Services;

use App\Models\Doctor;
use App\Models\Location;
use App\QueryFilters\DoctorsFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class DoctorsService extends BaseService
{
    public function __construct(public Doctor $model)
    {
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getQuery(?array $filters = [], ?array $relations = [],): ?Builder
    {
        return parent::getQuery($filters)->with($relations)
            ->when(!empty($filters), function (Builder $builder) use ($filters) {
                return $builder->filter(new DoctorsFilter($filters));
            });
    }
    public function datatable(array $filters = [],?array $relations = []): ?Builder
    {
        return $this->getQuery($filters,$relations);
    }

    public function paginate(array $filters = [],?array $relations = []): \Illuminate\Contracts\Pagination\Paginator
    {
        return $this->getQuery($filters,$relations)->simplePaginate();
    }



    public function create(array $data = [])
    {
        return $this->getQuery()->create($data);
    }

    public function update(Location $location, array $data = []): bool
    {
        return $location->update($data);
    }

    public function delete(Location $location): ?bool
    {
        return $location->delete();
    }

}
