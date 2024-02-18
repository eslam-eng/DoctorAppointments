<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Question extends Model
{
    use HasFactory,Filterable;

    protected $fillable = ['relatable_id','relatable_type','question'];

    public function relatable(): MorphTo
    {
        return $this->morphTo();
    }
    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class,'question_id');
    }
}
