<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    use HasFactory,Filterable;
    protected $fillable = ['relatable_id','relatable_type','reply','question_id'];

    public function relatable()
    {
        return $this->morphTo();
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class,'question_id');
    }
}
