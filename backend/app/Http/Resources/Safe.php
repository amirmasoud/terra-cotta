<?php

namespace App\Http\Resources;

use App\Http\Resources\Tag as TagResource;
use App\Http\Resources\Group as GroupResource;
use App\Http\Resources\Category as CategoryResource;

use Illuminate\Http\Resources\Json\JsonResource;

class Key extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'groups' => GroupResource::collection($this->whenLoaded('groups')),
        ];
    }
}
