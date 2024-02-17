<?php

namespace App\QueryFilters;

use App\Abstracts\QueryFilter;

class RepliesFilter extends QueryFilter
{

    public function __construct($params = array())
    {
        parent::__construct($params);
    }

    public function question_id($term)
    {
        return $this->builder->where('question_id',$term);
    }

    public function keyword($term)
    {
        return $this->builder->where('name','LIKE',"%$term%");
    }

    public function user_id($term)
    {
        return $this->builder->where('user_id',$term);
    }
}
