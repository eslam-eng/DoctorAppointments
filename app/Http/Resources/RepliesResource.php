<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RepliesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user_id'=>$this->relatable?->id,
            'user_name'=>$this->relatable->name,
            'profile_pic' => asset('upload/profile/'.$this->relatable?->profile_pic),
            'reply'=>$this->reply

        ];
    }
}
