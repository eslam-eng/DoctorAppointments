<?php

namespace App\QueryFilters;

use App\Abstracts\QueryFilter;

class BranchesFilter extends QueryFilter
{

    public function __construct($params = array())
    {
        parent::__construct($params);
    }

    public function status($term)
    {
        return $this->builder->where('status',$term);
    }
}
