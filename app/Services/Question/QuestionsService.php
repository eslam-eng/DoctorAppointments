<?php

namespace App\Services\Question;

use App\Models\Question;
use App\QueryFilters\QuestionsFilter;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class QuestionsService extends BaseService
{

    public $model;

    public function __construct(Question $model)
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
                return $builder->filter(new QuestionsFilter($filters));
            });
    }


    public function datatable(array $filters = []): ?Builder
    {
        return $this->getQuery($filters)->with('user');
    }


    public function paginate(array $filters = []): \Illuminate\Contracts\Pagination\Paginator
    {
        return $this->getQuery($filters)->with('user:id,first_name,last_name,profile_pic')->simplePaginate(perPage: 10);
    }


    public function store(array $data = [])
    {
        return $this->getQuery()->create($data);
    }

    public function update(Question $question, array $data = []): bool
    {
        return $question->update($data);
    }

    public function delete(Question $question): ?bool
    {
        return $question->delete();
    }

    public function details($question_id)
    {
        return $this->getQuery(['id' => $question_id])->with('replies.user')
            ->withCount('replies')
            ->first();
    }

}
