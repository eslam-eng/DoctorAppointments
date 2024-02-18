<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionsResource extends JsonResource
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
            'question'=>$this->question,
            'user_id'=>$this->user_id,
            'user_name'=>$this->user->full_name,
            'profile_pic' => public_path().'/'.$this->user->profile_pic,
            'created_at'=>$this->created_at->diffForHumans(),
            'replies'=>RepliesResource::collection($this->whenLoaded('replies'))

        ];
    }
}
