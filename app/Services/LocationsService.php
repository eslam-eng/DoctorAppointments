<?php

namespace App\Services;

use App\Models\Location;
use App\QueryFilters\LocationsFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LocationsService extends BaseService
{


    public function __construct(public Location $model)
    {
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getQuery(?array $filters = [],?array $relations = [],): ?Builder
    {
        return parent::getQuery(filters: $filters,relations: $relations)
            ->when(!empty($filters), function (Builder $builder) use ($filters) {
                return $builder->filter(new LocationsFilter($filters));
            });
    }


    public function datatable(array $filters = []): ?Builder
    {
        $relations = ['parent'];
        return $this->getQuery(filters: $filters,relations: $relations);
    }

    public function getCountries(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->getQuery(['depth'=>0])->get();
    }

    public function getLocationAncestors($id)
    {
        return $this->model->defaultOrder()->ancestorsAndSelf($id);
    }

    public function getLocationDescendants($location_id)
    {
        return $this->model->defaultOrder()->descendantsOf($location_id);
    }

    public function store(array $locationData = []): mixed
    {
        return $this->getQuery()->create($locationData);
    }

    /**
     * @param int $id
     * @param array $locationData
     * @return false
     */
    public function update(Location|int $location, array $locationData): bool
    {
        if (is_int($location))
            $location = $this->findById($location);
        return $location->update($locationData);
    }

    public function delete(Location|int $location): bool
    {
        if (is_int($location))
            $location = $this->findById($location);
        return $location->delete();
    }

    public function getLocationById($id)
    {
        return Location::find($id);
    }

}
