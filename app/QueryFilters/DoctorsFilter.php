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

    public function price($term)
    {
        $price = explode('-', $term);
        return $this->builder->where(function ($query) use ($price) {
            $query->whereBetween('consultation_fees', $price)
                ->whereBetween('chat_fees', $price)
                ->whereBetween('call_fees', $price);
        });
    }

}
