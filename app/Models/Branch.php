<?php

namespace App\Models;

use App\Traits\EscapeUnicodeJson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Branch extends Model
{
    use HasFactory,HasTranslations,EscapeUnicodeJson;
    protected $fillable = ['name','phone','city_id','area_id','map_url','status','address'];
    public $translatable = ['name'];

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
    public function area(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

}
