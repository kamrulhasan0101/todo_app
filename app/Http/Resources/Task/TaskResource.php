<?php

namespace App\Http\Resources\Task;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
    return [
            'title'=> $this->title,
            'description'=>$this->description,
            'deadline_at'=>$this->deadline_at,
            'status'=>$this->status,
            'remarks'=>$this->remarks,
            'user_id'=>$this->user_id,
            'category_id'=>$this->category_id,
        ];
    }
}
