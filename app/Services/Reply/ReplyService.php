<?php

namespace App\Services\Reply;

use App\Models\Reply;
use App\QueryFilters\RepliesFilter;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ReplyService extends BaseService
{

    public $model;

    public function __construct(Reply $model)
    {
        $this->model = $model;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getQuery(?array $filters = [], ?array $relations = []): ?Builder
    {
        return parent::getQuery($filters)
            ->when(!empty($filters), function (Builder $builder) use ($filters) {
                return $builder->filter(new RepliesFilter($filters));
            });
    }


    public function datatable(array $filters = []): ?Builder
    {
        return $this->getQuery($filters)
            ->with('user');
    }


    public function paginate(array $filters = []): \Illuminate\Contracts\Pagination\Paginator
    {
        return $this->getQuery($filters)->with('user:id,first_name,last_name,profile_pic')->simplePaginate(perPage: 10);
    }


    public function store(array $data = [])
    {
        return $this->getQuery()->create($data);
    }

    public function update(Reply $reply, array $data = []): bool
    {
        return $reply->update($data);
    }

    public function delete(Reply $reply): ?bool
    {
        return $reply->delete();
    }


}
