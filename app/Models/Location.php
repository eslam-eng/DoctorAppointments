<?php

namespace App\Models;

use App\Enums\ActivationStatus;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Translatable\HasTranslations;

class Location extends Model
{
    use HasFactory,NodeTrait,Filterable,HasTranslations;

    protected $fillable = [
        'title' ,'status', 'lft' ,'rgt','_lft','_lft','parent_id','currency_code'
    ];
    public $translatable = ['title'];

    public function scopeActive(Builder $query)
    {
        return $query->where('status', 1);
    }

}
