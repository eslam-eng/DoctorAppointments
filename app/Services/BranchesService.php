<?php

namespace App\Services;

use App\Models\Branch;
use App\Models\Location;
use App\QueryFilters\LocationsFilter;
use Illuminate\Database\Eloquent\Builder;

class BranchesService extends BaseService
{

    public $model;

    public function __construct(Branch $model)
    {
        $this->model = $model;
    }

    public function getQuery(?array $filters = []): ?Builder
    {
        return parent::getQuery($filters)
            ->when(! empty($filters), function (Builder $builder) use ($filters) {
                return $builder->filter(new LocationsFilter($filters));
            });
    }


    public function datatable(array $filters = []): ?Builder
    {
        return $this->getQuery($filters);
    }

    public function paginate(array $filters = []): \Illuminate\Contracts\Pagination\Paginator
    {
        return $this->getQuery($filters)->simplePaginate();
    }


    public function getLocationAncestors($id)
    {
        return $this->model->defaultOrder()->ancestorsAndSelf($id);
    }

    public function getLocationDescendants($location_id)
    {
        return $this->model->defaultOrder()->descendantsOf($location_id) ;
    }

    public function create(array $data = [])
    {
        return $this->getQuery()->create($data);
    }

    public function update(Location $location , array $data = []): bool
    {
        return $location->update($data);
    }

    public function delete(Location $location): ?bool
    {
        return $location->delete();
    }

}
