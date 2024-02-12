<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BookAppointment extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'book_appointment';
    protected $primaryKey = 'id';

     public function doctorls(){
     	return $this->hasone("App\Models\Doctor",'id','doctor_id');
     }

      public function patientls(){
     	return $this->hasone("App\Models\Patient",'id','user_id');
     }

     public function getMediaUrlAttribute(): ?string
     {
         return (!empty($this->getMedia())) ? $this->getFirstMediaUrl() : null;
     }
}

