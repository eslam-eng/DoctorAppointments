<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';
    protected $primaryKey = 'id';
    public function questions()
    {
        return $this->morphMany(Question::class, 'relatable');
    }

}
?>
