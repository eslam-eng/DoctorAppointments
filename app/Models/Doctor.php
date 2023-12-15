<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];
    protected $table = 'doctors';
    protected $primaryKey = 'id';
     public function departmentls(){
     	return $this->hasone("App\Models\Services",'id','department_id');
     }

     public function reviewls(){
     	return $this->hasmany("App\Models\Review",'doc_id','id');
     }
     public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
     {
         return $this->belongsTo(Branch::class,'branch_id');
     }
}
