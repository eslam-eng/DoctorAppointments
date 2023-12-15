<?php

namespace App\QueryFilters;

use App\Abstracts\QueryFilter;

class DoctorsFilter extends QueryFilter
{

    public function __construct($params = array())
    {
        parent::__construct($params);
    }

    public function status($term)
    {
        return $this->builder->where('status', $term);
    }

    public function branch($term)
    {
        return $this->builder->where('branch_id', $term);
    }

}
