<?php

namespace App\Services;

use App\Models\Location;
use App\QueryFilters\LocationsFilter;
use Illuminate\Database\Eloquent\Builder;

class LocationsService extends BaseService
{

    public $model;

    public function __construct(Location $model)
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

    public function getLocationAncestors($id)
    {
        return $this->model->defaultOrder()->ancestorsAndSelf($id);
    }

    public function getLocationDescendants($location_id)
    {
        return $this->model->defaultOrder()->descendantsOf($location_id) ;
    }

    public function store(array $locationData = []): mixed
    {
        $locationData['is_active'] = isset($locationData['is_active'])  ?  1 :  0;
        return $this->getQuery()->create($locationData);
    }

    /**
     * @param int $id
     * @param array $locationData
     * @return false
     */
    public function update(int $id,array $locationData): bool
    {
        $location = $this->findById($id);
        $locationData['status'] = isset($locationData['status'])  ?  1 :  0;
        return $location->update($locationData);
    }

    public function delete($id): bool
    {
        return  $this->getQuery(['id'=>$id])->delete();
    }

    public function getLocationById($id)
    {
        return Location::find($id);
    }

}
